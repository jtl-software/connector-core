<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */
namespace Jtl\Connector\Core\Application;

use Jtl\Connector\Core\Application\Error\ErrorHandler;
use Jtl\Connector\Core\Application\Error\IErrorHandler;
use Jtl\Connector\Core\Authentication\ITokenValidator;
use Jtl\Connector\Core\Checksum\IChecksumLoader;
use Jtl\Connector\Core\Compression\Zip;
use Jtl\Connector\Core\Exception\CompressionException;
use Jtl\Connector\Core\Exception\HttpException;
use Jtl\Connector\Core\IO\Temp;
use Jtl\Connector\Core\Model\Model;
use Jtl\Connector\Core\Serializer\Json;
use Jtl\Connector\Core\Exception\RpcException;
use Jtl\Connector\Core\Exception\SessionException;
use Jtl\Connector\Core\Exception\ApplicationException;
use Jtl\Connector\Core\Rpc\Packet;
use Jtl\Connector\Core\Rpc\RequestPacket;
use Jtl\Connector\Core\Rpc\ResponsePacket;
use Jtl\Connector\Core\Rpc\Error;
use Jtl\Connector\Core\Http\Request;
use Jtl\Connector\Core\Http\Response;
use Jtl\Connector\Core\Config\Config;
use Jtl\Connector\Core\Exception\JsonException;
use Jtl\Connector\Core\Exception\LinkerException;
use Jtl\Connector\Core\Model\BoolResult;
use Jtl\Connector\Core\Result\Action;
use Jtl\Connector\Core\Utilities\RpcMethod;
use Jtl\Connector\Core\Session\Session;
use Jtl\Connector\Core\Base\Connector;
use Jtl\Connector\Core\Logger\Logger;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Jtl\Connector\Core\Rpc\Method;
use Jtl\Connector\Core\Linker\IdentityLinker;
use Jtl\Connector\Core\Model\DataModel;
use Jtl\Connector\Core\Serializer\JMS\SerializerBuilder;
use Jtl\Connector\Core\Linker\ChecksumLinker;
use Jtl\Connector\Core\Session\SqliteSession;
use Jtl\Connector\Core\Utilities\Singleton;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Jtl\Connector\Core\IO\Path;
use Jtl\Connector\Core\Event\EventHandler;
use Symfony\Component\Finder\Finder;

/**
 * Application Class
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
class Application extends Singleton implements IApplication
{
    const PROTOCOL_VERSION = 7;
    
    /**
     * Connected EndpointConnectors
     *
     * @var IEndpointConnector
     */
    protected $connector = null;
    
    /**
     * @var Config;
     */
    protected $config;
    
    /**
     * Global Session
     *
     * @var \SessionHandlerInterface
     */
    protected $sessionHandler;
    
    /**
     * @var \Symfony\Component\EventDispatcher\EventDispatcher
     */
    protected $eventDispatcher;
    
    /**
     * @var \Jtl\Connector\Core\Application\Error\IErrorHandler
     */
    protected $errorHandler;
    
    protected function __construct()
    {
        require_once(dirname(__FILE__) . '/../bootstrap.php');
        
        // Error Handler
        $this->setErrorHandler(new ErrorHandler());
    }
    
    /**
     * (non-PHPdoc)
     * @see \Jtl\Connector\Core\Application\Application::run()
     */
    public function run(): void
    {
        AnnotationRegistry::registerLoader('class_exists');
        
        if ($this->connector === null) {
            throw new ApplicationException('No connector registed');
        }
        
        // Event Dispatcher
        $this->eventDispatcher = new EventDispatcher();
        
        $this->getErrorHandler()->setEventDispatcher($this->eventDispatcher);
        
        $jtlrpc = Request::handle($this->connector->getUseSuperGlobals());
        $requestpackets = RequestPacket::build($jtlrpc);
        
        $rpcmode = is_object($requestpackets) ? Packet::SINGLE_MODE : Packet::BATCH_MODE;
        
        $method = null;
        if ($rpcmode == Packet::SINGLE_MODE) {
            $method = $requestpackets->getMethod();
        }
        
        // Start Session
        $this->startSession($method);
        
        // Start Configuration
        $this->startConfiguration();
        
        //Mask connector token before logging
        $reqPacketsObj = $requestpackets->getPublic();
        if (isset($reqPacketsObj->method) && $reqPacketsObj->method === 'core.connector.auth' && isset($reqPacketsObj->params)) {
            $params = Json::decode($reqPacketsObj->params, true);
            if (isset($params['token'])) {
                $params['token'] = str_repeat('*', strlen($params['token']));
            }
            $reqPacketsObj->params = Json::encode($params);
        }
        
        // Log incoming request packet (debug only and configuration must be initialized)
        Logger::write(sprintf('RequestPacket: %s', Json::encode($reqPacketsObj)), Logger::DEBUG, 'rpc');
        if (isset($reqPacketsObj->params) && !empty($reqPacketsObj->params)) {
            Logger::write(sprintf('Params: %s', $reqPacketsObj->params), Logger::DEBUG, 'rpc');
        }
        
        // Register Event Dispatcher
        $this->startEventDispatcher();
        
        // Initialize Endpoint
        $this->connector->initialize();
        
        if ($this->connector->getPrimaryKeyMapper() === null) {
            throw new ApplicationException('No primary key mapper registered');
        }
        
        $tokenValidatorExists = false;
        if (is_callable([
                $this->connector,
                'getTokenValidator',
            ]) && $this->connector->getTokenValidator() instanceof ITokenValidator) {
            $tokenValidatorExists = true;
        }
        
        if (!$tokenValidatorExists) {
            throw new ApplicationException('Token validator is not registered');
        }
        
        if (is_subclass_of($this->connector,IChecksumLoader::class)) {
            ChecksumLinker::setChecksumLoader($this->connector->getChecksumLoader());
        }

        switch ($rpcmode) {
            case Packet::SINGLE_MODE:
                $this->runSingle($requestpackets, $rpcmode);
                break;
            case Packet::BATCH_MODE:
                $this->runBatch($requestpackets, $rpcmode);
                break;
        }
    }
    
    /**
     * @param RequestPacket $requestpacket
     * @param int $rpcmode
     * @param array $imagePaths
     * @return ResponsePacket
     * @throws ApplicationException
     * @throws RpcException
     * @throws LinkerException
     */
    protected function execute(RequestPacket $requestpacket, int $rpcmode, array $imagePaths = []): ResponsePacket
    {
        if (!RpcMethod::isMethod($requestpacket->getMethod())) {
            throw new RpcException('Invalid Request', -32600);
        }
        
        $identityLinker = IdentityLinker::getInstance();
        $identityLinker->setPrimaryKeyMapper($this->connector->getPrimaryKeyMapper());
        
        ////////////////////
        // Core Connector //
        ////////////////////
        $coreconnector = Connector::getInstance();
        $method = RpcMethod::splitMethod($requestpacket->getMethod());
        $coreconnector->setMethod($method);
        
        // Rpc Event
        $data = $requestpacket->getParams();
        EventHandler::dispatchRpc($data, $this->eventDispatcher, $method->getController(), $method->getAction(),
            EventHandler::BEFORE);
        
        if ($method->isCore() && $coreconnector->canHandle()) {
            $actionresult = $coreconnector->handle($requestpacket);
            if ($actionresult->isHandled()) {
                $responsepacket = $this->buildRpcResponse($requestpacket, $actionresult);
                
                if ($rpcmode == Packet::SINGLE_MODE) {
                    
                    // Event
                    $class = ($method->getController() === 'connector') ? 'Connector' : null;
                    $res = $actionresult->getResult();
                    EventHandler::dispatch($res, $this->eventDispatcher, $method->getAction(), EventHandler::AFTER,
                        $class, true);
                    
                    $this->triggerRpcAfterEvent($responsepacket->getPublic(), $requestpacket->getMethod());
                    Response::send($responsepacket);
                } else {
                    return $responsepacket;
                }
            }
        }
        
        ////////////////////////
        // Endpoint Connector //
        ////////////////////////
        $exists = false;
        
        $this->deserializeRequestParams($requestpacket, $this->connector->getModelNamespace());
        
        // Image push?
        // OLD single Image
        //$this->handleImagePush($requestpacket, $imagePath);
        $this->handleImagePush($requestpacket, $imagePaths);
        
        $this->connector->setMethod($method);
        if ($this->connector->canHandle()) {
            /** @var Action $actionresult */
            $actionresult = $this->connector->handle($requestpacket);
            
            if ($requestpacket->getMethod() === 'image.push' && count($imagePaths) > 0) {
                Request::deleteFileuploads($imagePaths);
            }
            
            if ($actionresult instanceof Action) {
                $exists = true;
                if ($actionresult->isHandled()) {
                    
                    if ($actionresult->getError() === null) {
                        
                        // Convert boolean to BoolResult
                        if (is_bool($actionresult->getResult())) {
                            $actionresult->setResult((new BoolResult())->setResult($actionresult->getResult()));
                        }
                        
                        // Identity mapping
                        $results = [];
                        $models = is_array($actionresult->getResult()) ? $actionresult->getResult() : [$actionresult->getResult()];
                        
                        foreach ($models as $model) {
                            if ($model instanceof DataModel) {
                                $identityLinker->linkModel($model, ($method->getAction() === Method::ACTION_DELETE));
                                
                                // @TODO: Specific identity delete
                                
                                // Checksum linking
                                $this->linkChecksum($model);
                                
                                // Event
                                $class = ($method->getController() === 'connector') ? 'Connector' : null;
                                EventHandler::dispatch($model, $this->eventDispatcher, $method->getAction(),
                                    EventHandler::AFTER, $class);
                                
                                if ($method->getAction() === Method::ACTION_PULL) {
                                    $results[] = $model->getPublic();
                                }
                            }
                        }
                        
                        if ($method->getAction() === Method::ACTION_PULL) {
                            $actionresult->setResult($results);
                        }
                    }
                    
                    // Building response packet
                    $responsepacket = $this->buildRpcResponse($requestpacket, $actionresult);
                    
                    if ($rpcmode == Packet::SINGLE_MODE) {
                        $this->triggerRpcAfterEvent($responsepacket->getPublic(), $requestpacket->getMethod());
                        Response::send($responsepacket);
                    } else {
                        return $responsepacket;
                    }
                }
            } else {
                throw new RpcException('Internal error', -32603);
            }
        } else {
            /*
             * OLD single Image
            if ($requestpacket->getMethod() === 'image.push') {
                Request::deleteFileupload($imagePath);
            }
            */
            if ($requestpacket->getMethod() === 'image.push' && count($imagePaths) > 0) {
                Request::deleteFileuploads($imagePaths);
            }
        }
        
        if ($exists) {
            throw new RpcException('Method could not be handled', -32000);
        } else {
            throw new RpcException(
                sprintf("Method '%s' not found", $requestpacket->getMethod()),
                -32601
            );
        }
    }
    
    /**
     * @param IEndpointConnector $endpointconnector
     */
    public function register(IEndpointConnector $endpointconnector): void
    {
        $this->connector = $endpointconnector;
    }

    /**
     * @param RequestPacket $requestpacket
     * @param int $rpcmode
     * @throws ApplicationException
     * @throws RpcException
     * @throws CompressionException
     * @throws HttpException
     */
    protected function runSingle(RequestPacket $requestpacket, int $rpcmode): void
    {
        $requestpacket->validate();

        $imagePaths = [];
        if ($requestpacket->getMethod() === 'image.push') {
            $zipFile = Request::handleFileupload();
            $tempDir = Temp::generateDirectory();
            
            if ($zipFile !== null && $tempDir !== null) {
                $archive = new Zip();
                if ($archive->extract($zipFile, $tempDir)) {
                    $finder = new Finder();
                    $finder->files()->ignoreDotFiles(true)->in($tempDir);
                    foreach ($finder as $file) {
                        $imagePaths[] = $file->getRealpath();
                    }
                } else {
                    @rmdir($tempDir);
                    @unlink($zipFile);
                    
                    throw new ApplicationException(sprintf('Zip File (%s) count not be extracted', $zipFile));
                }
                
                if ($zipFile !== null) {
                    @unlink($zipFile);
                }
            } else {
                throw new ApplicationException('Zip file or temp dir  is null');
            }
        }
        
        try {
            // OLD single Image
            //$this->execute($requestpacket, $config, $rpcmode, $imagePath);
            $this->execute($requestpacket, $rpcmode, $imagePaths);
        } catch (\Exception $exc) {
            /*
             * OLD single Image
            if ($requestpacket->getMethod() === 'image.push' && $imagePath !== null) {
                Request::deleteFileupload($imagePath);
            }
            */
            if ($requestpacket->getMethod() === 'image.push' && count($imagePaths) > 0) {
                Request::deleteFileuploads($imagePaths);
            }
            
            $error = new Error();
            $error->setCode($exc->getCode())
                ->setMessage($exc->getMessage());
            
            $responsepacket = new ResponsePacket();
            $responsepacket->setId($requestpacket->getId())
                ->setJtlrpc($requestpacket->getJtlrpc())
                ->setError($error);
            
            $this->triggerRpcAfterEvent($responsepacket->getPublic(), $requestpacket->getMethod());
            Response::send($responsepacket);
        }
    }

    /**
     * @param array $requestpackets
     * @param int $rpcmode
     * @throws ApplicationException
     * @throws LinkerException
     */
    protected function runBatch(array $requestpackets, int $rpcmode): void
    {
        $jtlrpcreponses = [];
        
        foreach ($requestpackets as $requestpacket) {
            try {
                $requestpacket->validate();
                $jtlrpcreponses[] = $this->execute($requestpacket, $rpcmode);
            } catch (RpcException $exc) {
                $error = new Error();
                $error->setCode($exc->getCode())
                    ->setMessage($exc->getMessage());
                
                $responsepacket = new ResponsePacket();
                $responsepacket->setId($requestpacket->getId())
                    ->setJtlrpc($requestpacket->getJtlrpc())
                    ->setError($error);
                
                $jtlrpcreponses[] = $responsepacket;
            }
        }
        
        Response::sendAll($jtlrpcreponses);
    }
    
    /**
     * @param RequestPacket $requestpacket
     * @param string $modelNamespace
     * @return void
     * @throws LinkerException
     */
    protected function deserializeRequestParams(RequestPacket &$requestpacket, string $modelNamespace): void
    {
        $method = RpcMethod::splitMethod($requestpacket->getMethod());
        $modelClass = RpcMethod::buildController($method->getController());
        
        $namespace = ($method->getAction() === Method::ACTION_PUSH || $method->getAction() === Method::ACTION_DELETE) ?
            sprintf('%s\%s', $modelNamespace, $modelClass) : 'Jtl\Connector\Core\Model\QueryFilter';
        
        if (class_exists("\\{$namespace}") && $requestpacket->getParams() !== null) {
            $serializer = SerializerBuilder::create();
            
            if ($method->getAction() === Method::ACTION_PUSH || $method->getAction() === Method::ACTION_DELETE) {
                // OLD single Image
                //$ns = ($method->getAction() === Method::ACTION_PUSH && $method->getController() === 'image') ? $namespace : "ArrayCollection<{$namespace}>";
                $ns = "ArrayCollection<{$namespace}>";
                $params = $serializer->deserialize($requestpacket->getParams(), $ns, 'json');
                
                $identityLinker = IdentityLinker::getInstance();
                if (is_array($params)) {
                    // Identity mapping
                    foreach ($params as &$param) {
                        $identityLinker->linkModel($param);
                        
                        // Checksum linking
                        $this->linkChecksum($param);
                        
                        // Event
                        EventHandler::dispatch($param, $this->eventDispatcher, $method->getAction(),
                            EventHandler::BEFORE);
                    }
                } else {
                    $identityLinker->linkModel($params);
                    
                    // Checksum linking
                    $this->linkChecksum($params);
                    
                    // Event
                    EventHandler::dispatch($params, $this->eventDispatcher, $method->getAction(), EventHandler::BEFORE);
                }
            } else {
                $params = $serializer->deserialize($requestpacket->getParams(), $namespace, 'json');
                
                // Event
                EventHandler::dispatch($params, $this->eventDispatcher, $method->getAction(), EventHandler::BEFORE,
                    $modelClass);
            }
            
            $requestpacket->setParams($params);
        }
    }
    
    /**
     * Build RPC Reponse Packet
     *
     * @param RequestPacket $requestpacket
     * @param Action $actionresult
     * @return ResponsePacket
     * @throws RpcException
     */
    protected function buildRpcResponse(RequestPacket $requestpacket, Action $actionresult): ResponsePacket
    {
        $responsepacket = new ResponsePacket();
        $responsepacket->setId($requestpacket->getId())
            ->setJtlrpc($requestpacket->getJtlrpc())
            ->setResult($actionresult->getResult())
            ->setError($actionresult->getError());
        
        $responsepacket->validate();
        
        return $responsepacket;
    }

    /**
     * Initialises the connector configuration instance.
     */
    protected function startConfiguration(): void
    {
        if (!isset($this->sessionHandler)) {
            throw new SessionException('Session not initialized', -32001);
        }
        
        // Config
        if (is_null($this->config)) {
            $config_file = Path::combine(CONNECTOR_DIR, 'config', 'config.json');
            if (!file_exists($config_file)) {
                $json = json_encode(['developer_logging' => false], JSON_PRETTY_PRINT);
                
                if (json_last_error() !== JSON_ERROR_NONE) {
                    throw JsonException::encoding(json_last_error_msg());
                }
                
                file_put_contents($config_file, $json);
            }
            
            $this->config = new Config($config_file);
        }
        
        if (!$this->config->has('developer_logging')) {
            $this->config->save('developer_logging', false);
        }
    }

    /**
     * @param string $method
     * @throws ApplicationException
     * @throws SessionException
     */
    protected function startSession(string $method): void
    {
        $sessionId = Request::getSession();
        $sessionName = 'JtlConnector';
        
        if ($sessionId === null && $method !== 'core.connector.auth') {
            throw new SessionException('No session');
        }
        
        if ($this->getSessionHandler() === null) {
            $this->setSessionHandler(new SqliteSession());
        }
        
        ini_set("session.gc_probability", 25);
    
        session_name($sessionName);
        if ($sessionId !== null) {
            if ($this->getSessionHandler()->check($sessionId)) {
                session_id($sessionId);
            } else {
                throw new SessionException("Session is invalid", -32000);
            }
        }
    
        session_set_save_handler($this->getSessionHandler());
    
        session_start();
    
        Logger::write(sprintf('Session started with id (%s)', session_id()), Logger::DEBUG, 'session');
    }
    
    protected function startEventDispatcher(): void
    {
        $this->connector->setEventDispatcher($this->eventDispatcher);
        
        $loader = new \Jtl\Connector\Core\Plugin\PluginLoader();
        $loader->load($this->eventDispatcher);
    }

    /**
     * @param RequestPacket $requestpacket
     * @param array $imagePaths
     * @throws ApplicationException
     */
    protected function handleImagePush(RequestPacket &$requestpacket, array $imagePaths = []): void
    {
        if ($requestpacket->getMethod() === 'image.push') {
            $images = $requestpacket->getParams();
            if (!is_array($images)) {
                throw new ApplicationException('Request params must be valid images');
            }
            
            if (count($imagePaths) > 0) {
                for ($i = 0; $i < count($images); $i++) {
                    foreach ($imagePaths as $imagePath) {
                        $infos = pathinfo($imagePath);
                        list ($hostId, $relationType) = explode('_', $infos['filename']);
                        if ((int)$hostId == $images[$i]->getId()->getHost()
                            && strtolower($relationType) === strtolower($images[$i]->getRelationType())
                        ) {
                            $images[$i]->setFilename($imagePath);
                        }
                    }
                }
                
                $requestpacket->setParams($images);
            } else {
                for ($i = 0; $i < count($images); $i++) {
                    if (strlen($images[$i]->getRemoteUrl()) > 0) {
                        $imageData = file_get_contents($images[$i]->getRemoteUrl());
                        if ($imageData === false) {
                            throw new ApplicationException('Could not get any data from url: ' . $images[$i]->getRemoteUrl());
                        }
                        
                        $path = parse_url($images[$i]->getRemoteUrl(), PHP_URL_PATH);
                        $fileName = pathinfo($path, PATHINFO_BASENAME);
                        $imagePath = Path::combine(Temp::getDirectory(), uniqid() . "_{$fileName}");
                        file_put_contents($imagePath, $imageData);
                        
                        $images[$i]->setFilename($imagePath);
                    } else {
                        throw new ApplicationException('Could not handle fileupload (no file was uploaded via HTTP POST?)');
                    }
                }
                
                $requestpacket->setParams($images);
            }
        }
    }
    
    /**
     * @param \stdClass $data
     * @param string $method
     */
    protected function triggerRpcAfterEvent(\stdClass $data, string $method): void
    {
        $method = RpcMethod::splitMethod($method);
        EventHandler::dispatchRpc($data, $this->eventDispatcher, $method->getController(), $method->getAction(),
            EventHandler::AFTER);
    }

    /**
     * @param Model $model
     */
    protected function linkChecksum(Model $model) : void
    {
        if (is_subclass_of($this->connector,IChecksumLoader::class)) {
            ChecksumLinker::link($model);
        }
    }
    
    /**
     * Connector getter
     *
     * @return IEndpointConnector
     */
    public function getConnector(): ?IEndpointConnector
    {
        return $this->connector;
    }
    
    /**
     * Session getter
     *
     * @return \SessionHandlerInterface
     */
    public function getSessionHandler(): ?\SessionHandlerInterface
    {
        return $this->sessionHandler;
    }
    
    /**
     * Session getter
     *
     * @param \SessionHandlerInterface $sessionHandler
     * @return Application
     */
    public function setSessionHandler(\SessionHandlerInterface $sessionHandler): Application
    {
        $this->sessionHandler = $sessionHandler;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getProtocolVersion(): int
    {
        return self::PROTOCOL_VERSION;
    }
    
    /**
     * @return Config
     */
    public function getConfig(): ?Config
    {
        return $this->config;
    }
    
    /**
     * @return IErrorHandler
     */
    public function getErrorHandler(): ?IErrorHandler
    {
        return $this->errorHandler;
    }
    
    /**
     * @param IErrorHandler $handler
     * @return $this
     */
    public function setErrorHandler(IErrorHandler $handler): Application
    {
        $this->errorHandler = $handler;
        
        return $this;
    }
}

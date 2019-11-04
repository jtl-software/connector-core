<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */

namespace Jtl\Connector\Core\Application;

use Jtl\Connector\Core\Application\Error\ErrorHandler;
use Jtl\Connector\Core\Application\Error\IErrorHandler;
use Jtl\Connector\Core\Connector\ChecksumInterface;
use Jtl\Connector\Core\Compression\Zip;
use Jtl\Connector\Core\Connector\ConnectorInterface;
use Jtl\Connector\Core\Connector\ModelInterface;
use Jtl\Connector\Core\Exception\CompressionException;
use Jtl\Connector\Core\Exception\HttpException;
use Jtl\Connector\Core\IO\Temp;
use Jtl\Connector\Core\Model\Model;
use Jtl\Connector\Core\Model\QueryFilter;
use Jtl\Connector\Core\Plugin\PluginLoader;
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
use Jtl\Connector\Core\Connector\CoreConnector;
use Jtl\Connector\Core\Logger\Logger;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Jtl\Connector\Core\Rpc\Method;
use Jtl\Connector\Core\Linker\IdentityLinker;
use Jtl\Connector\Core\Model\DataModel;
use Jtl\Connector\Core\Serializer\JMS\SerializerBuilder;
use Jtl\Connector\Core\Linker\ChecksumLinker;
use Jtl\Connector\Core\Session\SqliteSession;
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
class Application implements IApplication
{
    const PROTOCOL_VERSION = 7;
    const MIN_PHP_VERSION = '7.1';
    const ENV_VAR_DEBUG_LOGGING = 'DEBUG_LOGGING';
    /**
     * Connected EndpointConnectors
     *
     * @var ConnectorInterface
     */
    protected $endpointConnector = null;

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
     * @var EventDispatcher
     */
    protected $eventDispatcher;

    /**
     * @var IErrorHandler
     */
    protected $errorHandler;

    /**
     * Application constructor.
     * @param ConnectorInterface $endpointConnector
     */
    public function __construct(ConnectorInterface $endpointConnector)
    {
        $this->endpointConnector = $endpointConnector;
        $this->setErrorHandler(new ErrorHandler());
    }

    /**
     * (non-PHPdoc)
     * @see \Jtl\Connector\Core\Application\Application::run()
     */
    public function run(): void
    {
        AnnotationRegistry::registerLoader('class_exists');

        // Event Dispatcher
        $this->eventDispatcher = new EventDispatcher();

        $this->getErrorHandler()->setEventDispatcher($this->eventDispatcher);

        $jtlrpc = Request::handle();
        $requestPackets = RequestPacket::build($jtlrpc);

        $method = $requestPackets->getMethod();

        // Start Session
        $this->startSession($method);

        // Start Configuration
        $this->startConfiguration();

        //Mask connector token before logging
        $reqPacketsObj = $requestPackets->getPublic();
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
        $this->endpointConnector->initialize();

        if ($this->endpointConnector instanceof ChecksumInterface) {
            ChecksumLinker::setChecksumLoader($this->endpointConnector->getChecksumLoader());
        }

        $this->runSingle($requestPackets);
    }

    /**
     * @param RequestPacket $requestPacket
     * @param array $imagePaths
     * @return ResponsePacket
     * @throws ApplicationException
     * @throws RpcException
     * @throws LinkerException
     */
    protected function execute(RequestPacket $requestPacket, array $imagePaths = []): ResponsePacket
    {
        if (!RpcMethod::isMethod($requestPacket->getMethod())) {
            throw new RpcException('Invalid Request', -32600);
        }

        $identityLinker = IdentityLinker::getInstance();
        $identityLinker->setPrimaryKeyMapper($this->endpointConnector->getPrimaryKeyMapper());

        $method = RpcMethod::splitMethod($requestPacket->getMethod());

        // Rpc Event
        $data = $requestPacket->getParams();
        EventHandler::dispatchRpc(
            $data,
            $this->eventDispatcher,
            $method->getController(),
            $method->getAction(),
            EventHandler::BEFORE
        );

        if ($method->isCore()) {
            $connector = new CoreConnector($this->endpointConnector->getPrimaryKeyMapper(), $this->endpointConnector->getTokenValidator());
        }else{
            $connector = $this->getEndpointConnector();
        }

        $actionResult = $connector->handle($requestPacket, $this);

        if($method->isCore()===false){
            $modelNamespace = 'Jtl\Connector\Core\Model';
            if ($this->endpointConnector instanceof ModelInterface) {
                $modelNamespace = $this->endpointConnector->getModelNamespace();
            }

            $this->deserializeRequestParams($requestPacket, $modelNamespace);
            $this->handleImagePush($requestPacket, $imagePaths);

            Request::deleteFileuploads($imagePaths);

            if ($actionResult instanceof Action) {
                if ($actionResult->getError() === null) {

                    // Identity mapping
                    $results = [];
                    $models = is_array($actionResult->getResult()) ? $actionResult->getResult() : [$actionResult->getResult()];

                    foreach ($models as $model) {
                        if ($model instanceof DataModel) {
                            $identityLinker->linkModel($model, ($method->getAction() === Method::ACTION_DELETE));
                            $this->linkChecksum($model);

                            // Event
                            EventHandler::dispatch(
                                $model,
                                $this->eventDispatcher,
                                $method->getAction(),
                                EventHandler::AFTER,
                                ($method->getController() === 'connector') ? 'Connector' : null
                            );

                            if ($method->getAction() === Method::ACTION_PULL) {
                                $results[] = $model->getPublic();
                            }
                        }
                    }

                    if ($method->getAction() === Method::ACTION_PULL) {
                        $actionResult->setResult($results);
                    }
                }
            }
        }

        $responsePacket = $this->buildRpcResponse($requestPacket, $actionResult);

        EventHandler::dispatch(
            $actionResult->getResult(),
            $this->eventDispatcher,
            $method->getAction(),
            EventHandler::AFTER,
            ($method->getController() === 'connector') ? 'Connector' : null,
            $method->isCore()
        );

        $this->triggerRpcAfterEvent($responsePacket->getPublic(), $requestPacket->getMethod());

        Response::send($responsePacket);
    }

    /**
     * @param RequestPacket $requestPacket
     * @throws ApplicationException
     * @throws RpcException
     * @throws CompressionException
     * @throws HttpException
     */
    protected function runSingle(RequestPacket $requestPacket): void
    {
        $requestPacket->validate();

        $imagePaths = [];
        if ($requestPacket->getMethod() === 'image.push') {
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
            $this->execute($requestPacket, $imagePaths);
        } catch (\Exception $exc) {
            if ($requestPacket->getMethod() === 'image.push' && count($imagePaths) > 0) {
                Request::deleteFileuploads($imagePaths);
            }

            $error = new Error();
            $error->setCode($exc->getCode())
                ->setMessage($exc->getMessage());

            $responsePacket = new ResponsePacket();
            $responsePacket->setId($requestPacket->getId())
                ->setJtlrpc($requestPacket->getJtlrpc())
                ->setError($error);

            $this->triggerRpcAfterEvent($responsePacket->getPublic(), $requestPacket->getMethod());
            Response::send($responsePacket);
        }
    }

    /**
     * @param RequestPacket $requestPacket
     * @param string $modelNamespace
     * @return void
     * @throws LinkerException
     */
    protected function deserializeRequestParams(RequestPacket &$requestPacket, string $modelNamespace): void
    {
        $method = RpcMethod::splitMethod($requestPacket->getMethod());
        $modelClass = RpcMethod::buildController($method->getController());

        $namespace = ($method->getAction() === Method::ACTION_PUSH || $method->getAction() === Method::ACTION_DELETE) ?
            sprintf('%s\%s', $modelNamespace, $modelClass) : QueryFilter::class;

        if (class_exists($namespace) && $requestPacket->getParams() !== null) {
            $serializer = SerializerBuilder::create();

            if ($method->getAction() === Method::ACTION_PUSH || $method->getAction() === Method::ACTION_DELETE) {
                $type = sprintf("array<%s>", $namespace);
                $params = $serializer->deserialize($requestPacket->getParams(), $type, 'json');
                $identityLinker = IdentityLinker::getInstance();

                // Identity mapping
                foreach ($params as &$param) {
                    $identityLinker->linkModel($param);

                    // Checksum linking
                    $this->linkChecksum($param);

                    // Event
                    EventHandler::dispatch(
                        $param,
                        $this->eventDispatcher,
                        $method->getAction(),
                        EventHandler::BEFORE
                    );
                }
            } else {
                $params = $serializer->deserialize($requestPacket->getParams(), $namespace, 'json');

                // Event
                EventHandler::dispatch(
                    $params,
                    $this->eventDispatcher,
                    $method->getAction(),
                    EventHandler::BEFORE,
                    $modelClass
                );
            }

            $requestPacket->setParams($params);
        }
    }

    /**
     * Build RPC Reponse Packet
     *
     * @param RequestPacket $requestPacket
     * @param Action $result
     * @return ResponsePacket
     * @throws RpcException
     */
    protected function buildRpcResponse(RequestPacket $requestPacket, Action $result): ResponsePacket
    {
        $responsePacket = new ResponsePacket();
        $responsePacket->setId($requestPacket->getId())
            ->setJtlrpc($requestPacket->getJtlrpc())
            ->setResult($result->getResult())
            ->setError($result->getError());

        $responsePacket->validate();

        return $responsePacket;
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
            $configFile = Path::combine(CONNECTOR_DIR, 'config', 'config.json');
            if (!file_exists($configFile)) {
                $json = json_encode(['developer_logging' => false], JSON_PRETTY_PRINT);

                if (json_last_error() !== JSON_ERROR_NONE) {
                    throw JsonException::encoding(json_last_error_msg());
                }

                file_put_contents($configFile, $json);
            }

            $this->config = new Config($configFile);
        }

        if (!$this->config->has('developer_logging')) {
            $this->config->save('developer_logging', false);
        }

        $debugLogging = $this->config->get('developer_logging') ? 'true' : 'false';
        putenv(sprintf('%s=%s', self::ENV_VAR_DEBUG_LOGGING, $debugLogging));
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
        $this->endpointConnector->setEventDispatcher($this->eventDispatcher);

        $loader = new PluginLoader();
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
                        list($hostId, $relationType) = explode('_', $infos['filename']);
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
        EventHandler::dispatchRpc(
            $data,
            $this->eventDispatcher,
            $method->getController(),
            $method->getAction(),
            EventHandler::AFTER
        );
    }

    /**
     * @param Model $model
     */
    protected function linkChecksum(Model $model): void
    {
        if (ChecksumLinker::checksumLoaderExists()) {
            ChecksumLinker::link($model);
        }
    }

    /**
     * Connector getter
     *
     * @return ConnectorInterface
     */
    public function getEndpointConnector(): ?ConnectorInterface
    {
        return $this->endpointConnector;
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

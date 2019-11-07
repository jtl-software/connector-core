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
use Jtl\Connector\Core\Connector\HandleRequestInterface;
use Jtl\Connector\Core\Connector\ModelInterface;
use Jtl\Connector\Core\Event\Handle\ResponseAfterHandleEvent;
use Jtl\Connector\Core\Event\Handle\RequestBeforeHandleEvent;
use Jtl\Connector\Core\Exception\CompressionException;
use Jtl\Connector\Core\Exception\HttpException;
use Jtl\Connector\Core\IO\Temp;
use Jtl\Connector\Core\Model\Image;
use Jtl\Connector\Core\Model\Model;
use Jtl\Connector\Core\Model\QueryFilter;
use Jtl\Connector\Core\Plugin\PluginLoader;
use Jtl\Connector\Core\Serializer\Json;
use Jtl\Connector\Core\Exception\RpcException;
use Jtl\Connector\Core\Exception\SessionException;
use Jtl\Connector\Core\Exception\ApplicationException;
use Jtl\Connector\Core\Rpc\RequestPacket;
use Jtl\Connector\Core\Rpc\ResponsePacket;
use Jtl\Connector\Core\Rpc\Error;
use Jtl\Connector\Core\Http\Request as HttpRequest;
use Jtl\Connector\Core\Http\Response as HttpResponse;
use Jtl\Connector\Core\Config\Config;
use Jtl\Connector\Core\Exception\JsonException;
use Jtl\Connector\Core\Exception\LinkerException;
use Jtl\Connector\Core\Result\Action;
use Jtl\Connector\Core\Utilities\RpcMethod;
use Jtl\Connector\Core\Connector\CoreConnector;
use Jtl\Connector\Core\Logger\Logger;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Jtl\Connector\Core\Rpc\Method;
use Jtl\Connector\Core\Linker\IdentityLinker;
use Jtl\Connector\Core\Model\DataModel;
use Jtl\Connector\Core\Serializer\JMS\SerializerBuilder;
use Jtl\Connector\Core\Linker\ChecksumLinker;
use Jtl\Connector\Core\Session\SqliteSession;
use Symfony\Component\DependencyInjection\ContainerBuilder;
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
     * @var ContainerBuilder
     */
    protected $container;

    /**
     * @var string[]
     */
    protected $imagesToDelete = [];

    /**
     * Application constructor.
     * @param ConnectorInterface $endpointConnector
     */
    public function __construct(ConnectorInterface $endpointConnector)
    {
        $this->endpointConnector = $endpointConnector;
        $this->setErrorHandler(new ErrorHandler());

        $this->eventDispatcher = new EventDispatcher();
        $this->getErrorHandler()->setEventDispatcher($this->eventDispatcher);

        $this->container = new ContainerBuilder();
        $this->container->set('application', $this);
    }

    /**
     * (non-PHPdoc)
     * @see \Jtl\Connector\Core\Application\Application::run()
     */
    public function run(): void
    {
        AnnotationRegistry::registerLoader('class_exists');

        if (!defined('CONNECTOR_DIR')) {
            throw new \Exception('Constant CONNECTOR_DIR is not defined.');
        }

        try {
            $jtlrpc = HttpRequest::handle();
            $requestPacket = RequestPacket::build($jtlrpc);

            $method = $requestPacket->getMethod();

            // Start Session
            $this->startSession($method);

            // Start Configuration
            $this->startConfiguration();

            //Mask connector token before logging
            $reqPacketsObj = $requestPacket->getPublic();
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
            $this->endpointConnector->initialize($this);

            if ($this->endpointConnector instanceof ChecksumInterface) {
                ChecksumLinker::setChecksumLoader($this->endpointConnector->getChecksumLoader());
            }

            $requestPacket->validate();
            $responsePacket = $this->execute($requestPacket);
        } catch (\Throwable $ex) {
            $error = new Error();
            $error->setCode($ex->getCode())
                ->setMessage($ex->getMessage());

            $responsePacket = new ResponsePacket();
            $responsePacket->setId($requestPacket->getId())
                ->setJtlrpc($requestPacket->getJtlrpc())
                ->setError($error);

        } finally {
            if (count($this->imagesToDelete) > 0) {
                HttpRequest::deleteFileuploads($this->imagesToDelete);
                $this->imagesToDelete = [];
            }

            $this->triggerRpcAfterEvent($responsePacket->getPublic(), $requestPacket->getMethod());
            HttpResponse::send($responsePacket);
        }
    }

    /**
     * @param string $controller
     * @param object $instance
     */
    public function registerController(string $controller, object $instance): void
    {
        $this->container->set($controller, $instance);
    }

    /**
     * @param RequestPacket $requestPacket
     * @return ResponsePacket
     * @throws ApplicationException
     * @throws CompressionException
     * @throws HttpException
     * @throws LinkerException
     * @throws RpcException
     */
    protected function execute(RequestPacket $requestPacket): ResponsePacket
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
        } else {
            $connector = $this->getEndpointConnector();
        }

        $modelNamespace = 'Jtl\Connector\Core\Model';
        if ($connector instanceof ModelInterface) {
            $modelNamespace = $connector->getModelNamespace();
        }

        $request = Request::create(RpcMethod::buildController($method->getController()), $method->getAction(), []);
        if (!$method->isCore()) {
            $request = $this->createHandleRequest($requestPacket, $modelNamespace);
            if (strtolower($request->getController()) === 'image' && $request->getAction() === Method::ACTION_PUSH) {
                $this->handleImagePush(...$request->getParams());
            }
        }

        $this->eventDispatcher->dispatch(new RequestBeforeHandleEvent($request), RequestBeforeHandleEvent::getEventName());
        if ($connector instanceof HandleRequestInterface) {
            $response = $connector->handle($this, $request);
        } else {
            $response = $this->handleRequest($request);
        }
        $this->eventDispatcher->dispatch(new ResponseAfterHandleEvent($request->getController(), $request->getAction(), $response), ResponseAfterHandleEvent::getEventName());

        if ($method->isCore() === false) {
            // Identity mapping
            $results = [];
            $models = is_array($response->getResult()) ? $response->getResult() : [$response->getResult()];

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
                $response->setResult($results);
            }
        }

        $responsePacket = $this->buildRpcResponse($requestPacket, $response);

        EventHandler::dispatch(
            $response->getResult(),
            $this->eventDispatcher,
            $method->getAction(),
            EventHandler::AFTER,
            ($method->getController() === 'connector') ? 'Connector' : null,
            $method->isCore()
        );

        return $responsePacket;
    }

    /**
     * @param RequestPacket $requestPacket
     * @param string $modelNamespace
     * @return Request
     * @throws LinkerException
     */
    protected function createHandleRequest(RequestPacket $requestPacket, string $modelNamespace): Request
    {
        $method = RpcMethod::splitMethod($requestPacket->getMethod());

        $controller = RpcMethod::buildController($method->getController());
        $action = $method->getAction();
        $serializedParams = $requestPacket->getParams() ?? '';
        $params = [];

        $type = $className = QueryFilter::class;
        if (in_array($action, [Method::ACTION_PUSH, Method::ACTION_DELETE])) {
            $className = sprintf('%s\%s', $modelNamespace, $controller);
            $type = sprintf("array<%s>", $className);
        }

        if (class_exists($className)) {
            $serializer = SerializerBuilder::create();
            $params = $serializer->deserialize($serializedParams, $type, 'json');
            if (in_array($action, [Method::ACTION_PUSH, Method::ACTION_DELETE])) {
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
                        $action,
                        EventHandler::BEFORE
                    );
                }
            } else {
                $params = [$params];
                // Event
                EventHandler::dispatch(
                    $params,
                    $this->eventDispatcher,
                    $action,
                    EventHandler::BEFORE,
                    $controller
                );
            }
        }

        return Request::create($controller, $action, $params);
    }

    /**
     * @param string $controller
     * @param string $action
     * @param $params
     * @return Response
     * @throws ApplicationException
     */
    public function handleRequest(Request $request): Response
    {
        $controller = $request->getController();
        $action = $request->getAction();
        $params = $request->getParams();

        if (!$this->container->has($controller)) {
            $controllerClass = $this->endpointConnector->getControllerNamespace() . '\\' . $controller;
            if (!class_exists($controllerClass)) {
                throw new ApplicationException(sprintf('Controller class %s does not exist!', $controllerClass));
            }

            $this->container->register($controller, $controllerClass);
        }

        $controllerObject = $this->container->get($controller);

        $result = [];
        switch ($action) {
            case Method::ACTION_PUSH:
            case Method::ACTION_DELETE:
                foreach ($params as $model) {
                    $result[] = $controllerObject->$action($model);
                }
                break;

            default:
                $param = count($params) > 0 ? reset($params) : null;
                $result = $controllerObject->$action($param);
                break;
        }

        if (!$result instanceof Response) {
            $result = Response::create($result);
        }

        return $result;
    }

    /**
     * @param RequestPacket $requestPacket
     * @param Response $response
     * @return ResponsePacket
     * @throws RpcException
     */
    protected function buildRpcResponse(RequestPacket $requestPacket, Response $response): ResponsePacket
    {
        $responsePacket = new ResponsePacket();
        $responsePacket->setId($requestPacket->getId())
            ->setJtlrpc($requestPacket->getJtlrpc())
            ->setResult($response->getResult());
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
        $sessionId = HttpRequest::getSession();
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
        $loader = new PluginLoader();
        $loader->load($this->eventDispatcher);
    }

    /**
     * @param Image ...$images
     * @throws ApplicationException
     * @throws CompressionException
     * @throws HttpException
     */
    protected function handleImagePush(Image ...$images): void
    {
        $imagePaths = [];
        $zipFile = HttpRequest::handleFileupload();
        $tempDir = Temp::generateDirectory();
        if ($zipFile !== null && $tempDir !== null) {
            $archive = new Zip();
            if ($archive->extract($zipFile, $tempDir)) {
                $finder = new Finder();
                $finder->files()->ignoreDotFiles(true)->in($tempDir);
                foreach ($finder as $file) {
                    $imagePaths[] = $this->imagesToDelete[] = $file->getRealpath();
                }
            } else {
                @rmdir($tempDir);
                @unlink($zipFile);

                throw new ApplicationException(sprintf('Zip File (%s) could not be extracted', $zipFile));
            }

            if ($zipFile !== null) {
                @unlink($zipFile);
            }
        } else {
            throw new ApplicationException('Zip file or temp dir  is null');
        }

        foreach ($images as $image) {
            if (!empty($image->getRemoteUrl())) {
                $imageData = file_get_contents($image->getRemoteUrl());
                if ($imageData === false) {
                    throw new ApplicationException('Could not get any data from url: ' . $image->getRemoteUrl());
                }

                $path = parse_url($image->getRemoteUrl(), PHP_URL_PATH);
                $fileName = pathinfo($path, PATHINFO_BASENAME);
                $imagePath = sprintf('%s/%s_%s', Temp::getDirectory(), uniqid(), $fileName);
                file_put_contents($imagePath, $imageData);
                $image->setFilename($imagePath);
            } else {
                foreach ($imagePaths as $imagePath) {
                    $infos = pathinfo($imagePath);
                    list($hostId, $relationType) = explode('_', $infos['filename']);
                    if ((int)$hostId == $image->getId()->getHost()
                        && strtolower($relationType) === strtolower($image->getRelationType())
                    ) {
                        $image->setFilename($imagePath);
                        break;
                    }
                }
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

    /**
     * @return EventDispatcher
     */
    public function getEventDispatcher(): EventDispatcher
    {
        return $this->eventDispatcher;
    }
}

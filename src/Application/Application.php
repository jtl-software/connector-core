<?php
namespace Jtl\Connector\Core\Application;

use DI\Container;
use DI\ContainerBuilder;
use DI\DependencyException;
use DI\NotFoundException;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Jtl\Connector\Core\Config\EnvConfig;
use Jtl\Connector\Core\Definition\ConfigOption;
use Jtl\Connector\Core\Definition\Controller;
use Jtl\Connector\Core\Definition\ErrorCode;
use Jtl\Connector\Core\Error\ErrorHandler;
use Jtl\Connector\Core\Error\ErrorHandlerInterface;
use Jtl\Connector\Core\Connector\UseChecksumInterface;
use Jtl\Connector\Core\Compression\Zip;
use Jtl\Connector\Core\Connector\ConnectorInterface;
use Jtl\Connector\Core\Connector\HandleRequestInterface;
use Jtl\Connector\Core\Connector\ModelInterface;
use Jtl\Connector\Core\Controller\TransactionalInterface;
use Jtl\Connector\Core\Definition\Action;
use Jtl\Connector\Core\Event\Handle\ResponseAfterHandleEvent;
use Jtl\Connector\Core\Event\Handle\RequestBeforeHandleEvent;
use Jtl\Connector\Core\Exception\CompressionException;
use Jtl\Connector\Core\Exception\DefinitionException;
use Jtl\Connector\Core\Exception\HttpException;
use Jtl\Connector\Core\IO\Temp;
use Jtl\Connector\Core\Model\AbstractImage;
use Jtl\Connector\Core\Model\AbstractModel;
use Jtl\Connector\Core\Model\Ack;
use Jtl\Connector\Core\Model\Authentication;
use Jtl\Connector\Core\Model\QueryFilter;
use Jtl\Connector\Core\Plugin\PluginManager;
use Jtl\Connector\Core\Serializer\Json;
use Jtl\Connector\Core\Exception\RpcException;
use Jtl\Connector\Core\Exception\SessionException;
use Jtl\Connector\Core\Exception\ApplicationException;
use Jtl\Connector\Core\Rpc\RequestPacket;
use Jtl\Connector\Core\Rpc\ResponsePacket;
use Jtl\Connector\Core\Rpc\Error;
use Jtl\Connector\Core\Http\Request as HttpRequest;
use Jtl\Connector\Core\Http\Response as HttpResponse;
use Jtl\Connector\Core\Config\FileConfig;
use Jtl\Connector\Core\Exception\LinkerException;
use Jtl\Connector\Core\Subscriber\RequestBeforeHandleSubscriber;
use Jtl\Connector\Core\Definition\RpcMethod;
use Jtl\Connector\Core\Connector\CoreConnector;
use Jtl\Connector\Core\Logger\Logger;
use Jtl\Connector\Core\Rpc\Method;
use Jtl\Connector\Core\Linker\IdentityLinker;
use Jtl\Connector\Core\Model\AbstractDataModel;
use Jtl\Connector\Core\Serializer\SerializerBuilder;
use Jtl\Connector\Core\Linker\ChecksumLinker;
use Jtl\Connector\Core\Session\SqliteSession;
use Jtl\Connector\Core\IO\Path;
use Jtl\Connector\Core\Event\EventHandler;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\Finder\Finder;

/**
 * Application Class
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
class Application
{
    const PROTOCOL_VERSION = 7;
    const MIN_PHP_VERSION = '7.2';

    /**
     * Connected EndpointConnectors
     *
     * @var ConnectorInterface
     */
    protected $endpointConnector = null;

    /**
     * @var FileConfig;
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
     * @var IdentityLinker
     */
    protected $linker;

    /**
     * @var ErrorHandlerInterface
     */
    protected $errorHandler;

    /**
     * @var Container
     */
    protected $container;

    /**
     * @var string[]
     */
    protected $imagesToDelete = [];

    /**
     * Application constructor.
     * @param ConnectorInterface $endpointConnector
     * @throws \Exception
     */
    public function __construct(ConnectorInterface $endpointConnector)
    {
        $this->endpointConnector = $endpointConnector;
        $this->setErrorHandler(new ErrorHandler());

        $this->eventDispatcher = new EventDispatcher();
        $this->getErrorHandler()->setEventDispatcher($this->eventDispatcher);
        $this->eventDispatcher->addSubscriber(new RequestBeforeHandleSubscriber());

        $containerBuilder = new ContainerBuilder();
        $this->container = $containerBuilder->build();
        $this->container->set(Application::class, $this);
    }

    /**
     * (non-PHPdoc)
     * @see Jtl\Connector\Core\Application\Application::run()
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
            $requestPacket->validate();

            //Mask connector token before logging
            $reqPacketsObj = $requestPacket->getPublic();
            if (isset($reqPacketsObj->method) && $reqPacketsObj->method === RpcMethod::AUTH && isset($reqPacketsObj->params)) {
                $params = Json::decode($reqPacketsObj->params, true);
                if (isset($params['token'])) {
                    $params['token'] = str_repeat('*', strlen($params['token']));
                }
                $reqPacketsObj->params = Json::encode($params);
            }

            // Log incoming request packet (debug only and configuration must be initialized)
            Logger::write(sprintf('Request packet: %s', Json::encode($reqPacketsObj)), Logger::DEBUG, Logger::CHANNEL_RPC);
            if (isset($reqPacketsObj->params) && !empty($reqPacketsObj->params)) {
                Logger::write(sprintf('Params: %s', $reqPacketsObj->params), Logger::DEBUG, Logger::CHANNEL_RPC);
            }

            $method = Method::createFromRequestPacket($requestPacket);

            // Start Session
            $this->startSession($requestPacket->getMethod());

            // Start Configuration
            $this->startConfiguration();

            $this->linker = new IdentityLinker($this->endpointConnector->getPrimaryKeyMapper());

            /** Load connector plugins */
            PluginManager::loadPlugins($this->eventDispatcher);

            if ($this->endpointConnector instanceof UseChecksumInterface) {
                ChecksumLinker::setChecksumLoader($this->endpointConnector->getChecksumLoader());
            }

            // Initialize Endpoint
            $this->endpointConnector->initialize($this);

            $responsePacket = $this->execute($requestPacket, $method);
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

            $jsonResponse = $responsePacket->serialize();

            $this->triggerRpcAfterEvent($jsonResponse, $method);
            HttpResponse::send($jsonResponse);
        }
    }

    /**
     * @param string $controllerName
     * @param object $instance
     * @return Application
     * @throws DefinitionException
     * @throws \ReflectionException
     */
    public function registerController(string $controllerName, object $instance): Application
    {
        if (!Controller::isController($controllerName)) {
            throw DefinitionException::unknownController($controllerName);
        }

        $this->container->set($controllerName, $instance);
        return $this;
    }

    /**
     * @param RequestPacket $requestPacket
     * @param Method $method
     * @return ResponsePacket
     * @throws ApplicationException
     * @throws CompressionException
     * @throws DefinitionException
     * @throws DependencyException
     * @throws HttpException
     * @throws LinkerException
     * @throws NotFoundException
     * @throws RpcException
     * @throws \ReflectionException
     * @throws \Throwable
     */
    protected function execute(RequestPacket $requestPacket, Method $method): ResponsePacket
    {
        if (!RpcMethod::isMethod($requestPacket->getMethod())) {
            throw new RpcException('Invalid request', ErrorCode::INVALID_REQUEST);
        }

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

        $request = $this->createHandleRequest($requestPacket, $method, $modelNamespace);
        if (!$method->isCore()) {
            if ($request->getController() === Controller::IMAGE && $request->getAction() === Action::PUSH) {
                $this->handleImagePush(...$request->getParams());
            }
        }

        $this->eventDispatcher->dispatch(new RequestBeforeHandleEvent($request), RequestBeforeHandleEvent::getEventName());
        if ($connector instanceof HandleRequestInterface) {
            $response = $connector->handle($this, $request);
        } else {
            $response = $this->handleRequest($request, $connector);
        }
        $this->eventDispatcher->dispatch(new ResponseAfterHandleEvent($request->getController(), $request->getAction(), $response), ResponseAfterHandleEvent::getEventName());

        if ($method->isCore() === false) {
            // Identity mapping
            $models = is_array($response->getResult()) ? $response->getResult() : [$response->getResult()];
            foreach ($models as $model) {
                if ($model instanceof AbstractDataModel) {
                    $this->linker->linkModel($model, ($method->getAction() === Action::DELETE));
                    $this->linkChecksum($model);

                    // Event
                    EventHandler::dispatch(
                        $model,
                        $this->eventDispatcher,
                        $method->getAction(),
                        EventHandler::AFTER,
                        ($method->getController() === Controller::CONNECTOR) ? Controller::CONNECTOR : null
                    );
                }
            }
        }

        $responsePacket = $this->buildRpcResponse($requestPacket, $response);

        EventHandler::dispatch(
            $response->getResult(),
            $this->eventDispatcher,
            $method->getAction(),
            EventHandler::AFTER,
            ($method->getController() === Controller::CONNECTOR) ? Controller::CONNECTOR : null,
            $method->isCore()
        );

        return $responsePacket;
    }

    /**
     * @param RequestPacket $requestPacket
     * @param Method $mehod
     * @param string $modelNamespace
     * @return Request
     * @throws DefinitionException
     * @throws LinkerException
     * @throws \ReflectionException
     */
    protected function createHandleRequest(RequestPacket $requestPacket, Method $method, string $modelNamespace): Request
    {
        $controller = $method->getController();
        $action = $method->getAction();
        $params = [];
        $className = null;

        switch ($action) {
            case Action::AUTH:
                $type = $className = Authentication::class;
                break;
            case Action::ACK:
                $type = $className = Ack::class;
                break;
            case Action::PUSH:
            case Action::DELETE:
                $className = sprintf('%s\%s', $modelNamespace, $controller);
                if ($controller === Controller::IMAGE) {
                    $className = AbstractImage::class;
                }
                $type = sprintf("array<%s>", $className);
                break;
            default:
                $type = $className = QueryFilter::class;
        }

        if (class_exists($className)) {
            $serializer = SerializerBuilder::getInstance();
            $serializedParams = $requestPacket->getParams();
            if (is_string($serializedParams) && strlen($serializedParams) > 0) {
                $params = $serializer->deserialize($serializedParams, $type, 'json');
            }

            if (!is_array($params)) {
                $params = [$params];
            }

            // Identity mapping
            foreach ($params as $param) {
                if (in_array($action, [Action::PUSH, Action::DELETE])) {
                    $this->linker->linkModel($param);
                    // Checksum linking
                    $this->linkChecksum($param);
                }

                // Event
                EventHandler::dispatch(
                    $param,
                    $this->eventDispatcher,
                    $action,
                    EventHandler::BEFORE
                );
            }
        }

        return Request::create($controller, $action, $params);
    }

    /**
     * @param Request $request
     * @param ConnectorInterface $connector
     * @return Response
     * @throws ApplicationException
     * @throws DependencyException
     * @throws NotFoundException
     * @throws \Throwable
     */
    public function handleRequest(Request $request, ConnectorInterface $connector): Response
    {
        $controller = $request->getController();
        $action = $request->getAction();
        $params = $request->getParams();

        if (!$this->container->has($controller)) {
            $controllerClass = $connector->getControllerNamespace() . '\\' . $controller;
            if (!class_exists($controllerClass)) {
                throw new ApplicationException(sprintf('Controller class %s does not exist!', $controllerClass));
            }
            $this->container->set($controller, $this->container->get($controllerClass));
        }

        $controllerObject = $this->container->get($controller);

        $result = [];
        switch ($action) {
            case Action::PUSH:
            case Action::DELETE:
                try {
                    if ($controllerObject instanceof TransactionalInterface) {
                        $controllerObject->beginTransaction();
                    }

                    foreach ($params as $model) {
                        $result[] = $controllerObject->$action($model);
                    }

                    if ($controllerObject instanceof TransactionalInterface) {
                        $controllerObject->commit();
                    }
                } catch (\Throwable $ex) {
                    if ($controllerObject instanceof TransactionalInterface) {
                        $controllerObject->rollback();
                    }
                    throw $ex;
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
            throw new SessionException('Session not initialized', ErrorCode::UNINITIALIZED_SESSION);
        }

        $configFile = Path::combine(CONNECTOR_DIR, 'config', 'config.json');
        if (!file_exists($configFile)) {
            file_put_contents($configFile, Json::encode([ConfigOption::LOG_LEVEL => Logger::INFO], true));
        }
        $this->config = new FileConfig($configFile);
        $logLevel = $this->config->get(ConfigOption::LOG_LEVEL, Logger::INFO);
        EnvConfig::getInstance()->set(ConfigOption::LOG_LEVEL, $logLevel);
    }

    /**
     * @param string $rpcMethod
     * @throws ApplicationException
     * @throws SessionException
     */
    protected function startSession(string $rpcMethod): void
    {
        $sessionId = HttpRequest::getSession();
        $sessionName = 'JtlConnector';

        if ($sessionId === null && $rpcMethod !== RpcMethod::AUTH) {
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

        Logger::write(sprintf('Session started with id (%s)', session_id()), Logger::DEBUG, Logger::CHANNEL_SESSION);
    }

    /**
     * @param AbstractImage ...$images
     * @throws ApplicationException
     * @throws CompressionException
     * @throws HttpException
     */
    protected function handleImagePush(AbstractImage ...$images): void
    {
        $imagePaths = [];
        $zipFile = HttpRequest::handleFileupload();
        $tempDir = Temp::createDirectory();
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

                throw new ApplicationException(sprintf('Zip file (%s) could not be extracted', $zipFile));
            }

            if ($zipFile !== null) {
                @unlink($zipFile);
            }
        } else {
            throw new ApplicationException('Zip file or temp dir is null');
        }

        foreach ($images as $image) {
            if (!empty($image->getRemoteUrl())) {
                $imageData = file_get_contents($image->getRemoteUrl());
                if ($imageData === false) {
                    throw new ApplicationException(sprintf('Could not get any data from url: %s', $image->getRemoteUrl()));
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
     * @param $jsonString
     * @param string $rpcMethod
     * @throws \Exception
     */
    protected function triggerRpcAfterEvent(string $jsonString, Method $method): void
    {
        EventHandler::dispatchRpc(
            $jsonString,
            $this->eventDispatcher,
            $method->getController(),
            $method->getAction(),
            EventHandler::AFTER
        );
    }

    /**
     * @param AbstractModel $model
     */
    protected function linkChecksum(AbstractModel $model): void
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
     * @return FileConfig
     */
    public function getConfig(): ?FileConfig
    {
        return $this->config;
    }

    /**
     * @return ErrorHandlerInterface
     */
    public function getErrorHandler(): ?ErrorHandlerInterface
    {
        return $this->errorHandler;
    }

    /**
     * @param ErrorHandlerInterface $handler
     * @return $this
     */
    public function setErrorHandler(ErrorHandlerInterface $handler): Application
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

    /**
     * @return Container
     */
    public function getContainer(): Container
    {
        return $this->container;
    }

    /**
     * @return IdentityLinker
     */
    public function getLinker(): IdentityLinker
    {
        return $this->linker;
    }
}

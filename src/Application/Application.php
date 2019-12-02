<?php

namespace Jtl\Connector\Core\Application;

use DI\Container;
use DI\ContainerBuilder;
use DI\DependencyException;
use DI\NotFoundException;
use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\Serializer;
use Jtl\Connector\Core\Config\RuntimeConfig;
use Jtl\Connector\Core\Controller\StatisticInterface;
use Jtl\Connector\Core\Definition\ConfigOption;
use Jtl\Connector\Core\Definition\Controller;
use Jtl\Connector\Core\Definition\ErrorCode;
use Jtl\Connector\Core\Definition\Event;
use Jtl\Connector\Core\Error\ErrorHandler;
use Jtl\Connector\Core\Error\AbstractErrorHandler;
use Jtl\Connector\Core\Connector\UseChecksumInterface;
use Jtl\Connector\Core\Compression\Zip;
use Jtl\Connector\Core\Connector\ConnectorInterface;
use Jtl\Connector\Core\Connector\HandleRequestInterface;
use Jtl\Connector\Core\Connector\ModelInterface;
use Jtl\Connector\Core\Controller\TransactionalInterface;
use Jtl\Connector\Core\Definition\Action;
use Jtl\Connector\Core\Event\AbstractEvent;
use Jtl\Connector\Core\Event\EventInterface;
use Jtl\Connector\Core\Event\Handle\ResponseAfterHandleEvent;
use Jtl\Connector\Core\Event\Handle\RequestBeforeHandleEvent;
use Jtl\Connector\Core\Event\Rpc\RpcAfterEvent;
use Jtl\Connector\Core\Event\Rpc\RpcBeforeEvent;
use Jtl\Connector\Core\Exception\CompressionException;
use Jtl\Connector\Core\Exception\DefinitionException;
use Jtl\Connector\Core\Exception\HttpException;
use Jtl\Connector\Core\IO\Temp;
use Jtl\Connector\Core\Model\AbstractImage;
use Jtl\Connector\Core\Model\AbstractModel;
use Jtl\Connector\Core\Model\Ack;
use Jtl\Connector\Core\Model\Authentication;
use Jtl\Connector\Core\Model\IdentityInterface;
use Jtl\Connector\Core\Model\IdentificationInterface;
use Jtl\Connector\Core\Model\QueryFilter;
use Jtl\Connector\Core\Model\Statistic;
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

class Application
{
    const PROTOCOL_VERSION = 7;
    const MIN_PHP_VERSION = '7.2';

    /**
     * @var ConnectorInterface
     */
    protected $endpointConnector = null;

    /**
     * @var FileConfig;
     */
    protected $config;

    /**
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
     * @var AbstractErrorHandler
     */
    protected $errorHandler;

    /**
     * @var Container
     */
    protected $container;

    /**
     * @var Serializer
     */
    protected $serializer;

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
        $this->eventDispatcher = new EventDispatcher();
        $this->errorHandler = new ErrorHandler($this);
        $this->container = (new ContainerBuilder())->build();
        $this->container->set(Application::class, $this);
        $this->linker = new IdentityLinker($this->endpointConnector->getPrimaryKeyMapper());
        $this->serializer = SerializerBuilder::getInstance()->build();
    }

    /**
     * @throws \Exception
     */
    public function run(): void
    {
        if (!defined('CONNECTOR_DIR')) {
            throw new \Exception('Constant CONNECTOR_DIR is not defined.');
        }

        AnnotationRegistry::registerLoader('class_exists');
        $this->startConfiguration();
        $this->eventDispatcher->addSubscriber(new RequestBeforeHandleSubscriber());
        $this->errorHandler->register();

        try {
            $jtlrpc = HttpRequest::handle();
            $requestPacket = RequestPacket::createFromJtlrpc($jtlrpc, $this->serializer);
            $method = Method::createFromRequestPacket($requestPacket);

            if (!$requestPacket->isValid() || !RpcMethod::isMethod($requestPacket->getMethod())) {
                throw new RpcException("Invalid request", ErrorCode::INVALID_REQUEST);
            }

            $logJtlrpc = $jtlrpc;
            if ($requestPacket->getMethod() === RpcMethod::AUTH) {
                $pattern = '/\"token\":\s?\"(.*)\"/';
                $replacement = '"token": "******************"';
                $logJtlrpc = preg_replace($pattern, $replacement, $logJtlrpc);
            }

            // Log incoming request packet (debug only and configuration must be initialized)
            Logger::write(sprintf('Request packet: %s', $logJtlrpc), Logger::DEBUG, Logger::CHANNEL_RPC);
            if ($requestPacket->getMethod() !== RpcMethod::AUTH && !empty($requestPacket->getParams())) {
                Logger::write(sprintf('Params: %s', Json::encode($requestPacket->getParams())), Logger::DEBUG,
                    Logger::CHANNEL_RPC);
            }

            $this->startSession($requestPacket->getMethod());
            PluginManager::loadPlugins($this->eventDispatcher);
            if ($this->endpointConnector instanceof UseChecksumInterface) {
                ChecksumLinker::setChecksumLoader($this->endpointConnector->getChecksumLoader());
            }
            $this->endpointConnector->initialize($this);

            $event = new RpcBeforeEvent(Json::decode((string)$jtlrpc, true), $method->getController(),
                $method->getAction());
            $this->eventDispatcher->dispatch($event, $event->getEventName());

            $responsePacket = $this->execute($requestPacket, $method);
        } catch (\Throwable $ex) {
            Logger::writeException($ex);

            $error = (new Error())
                ->setCode($ex->getCode())
                ->setMessage($ex->getMessage())
                ->setData(Logger::createExceptionInfos($ex, true));

            $responsePacket = (new ResponsePacket())
                ->setId($requestPacket->getId())
                ->setError($error);

        } finally {
            if (count($this->imagesToDelete) > 0) {
                HttpRequest::deleteFileuploads($this->imagesToDelete);
                $this->imagesToDelete = [];
            }

            $arrayResponse = $responsePacket->toArray($this->serializer);

            $event = new RpcAfterEvent($arrayResponse, $method->getController(), $method->getAction());
            $this->eventDispatcher->dispatch($event, $event->getEventName());

            HttpResponse::send($arrayResponse);
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
        if ($method->isCore()) {
            $connector = new CoreConnector($this->endpointConnector->getPrimaryKeyMapper(),
                $this->endpointConnector->getTokenValidator());
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

        $event = new RequestBeforeHandleEvent($request);
        $this->eventDispatcher->dispatch($event, $event->getEventName());

        if ($connector instanceof HandleRequestInterface) {
            $response = $connector->handle($this, $request);
        } else {
            $response = $this->handleRequest($request, $connector);
        }

        $event = new ResponseAfterHandleEvent($request->getController(), $request->getAction(), $response);
        $this->eventDispatcher->dispatch($event, $event->getEventName());

        if ($method->isCore() === false) {
            // Identity mapping
            $models = is_array($response->getResult()) ? $response->getResult() : [$response->getResult()];
            foreach ($models as $model) {
                if ($model instanceof AbstractDataModel) {
                    $this->linker->linkModel($model, ($method->getAction() === Action::DELETE));
                    $this->linkChecksum($model);

                    $this->triggerEvent($model, $method, Event::AFTER);
                }
            }
        }

        $responsePacket = $this->buildRpcResponse($requestPacket, $response);

        $this->triggerEvent($response->getResult(), $method, Event::AFTER);

        return $responsePacket;
    }

    /**
     * @param RequestPacket $requestPacket
     * @param Method $method
     * @param string $modelNamespace
     * @return Request
     * @throws DefinitionException
     * @throws LinkerException
     * @throws \ReflectionException
     */
    protected function createHandleRequest(
        RequestPacket $requestPacket,
        Method $method,
        string $modelNamespace
    ): Request {
        $controller = $method->getController();
        $action = $method->getAction();

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

        /** @var Serializer $serializer */
        $serializer = SerializerBuilder::getInstance()->build();
        $params = $serializer->fromArray($requestPacket->getParams(), $type);

        if (!is_array($params)) {
            $params = [$params];
        }

        // Identity mapping
        foreach ($params as $param) {
            if (in_array($action, [Action::PUSH, Action::DELETE], true)) {
                $this->linker->linkModel($param);
                // Checksum linking
                $this->linkChecksum($param);
            }

            $this->triggerEvent($param, $method, Event::BEFORE);
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
     * @throws \ReflectionException
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
                    $model = null;
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

                    $this->extendExceptionMessageWithIdentifiers($ex, $model, $controller, $action);

                    throw $ex;
                }
                break;

            default:
                $param = count($params) > 0 ? reset($params) : null;
                $result = $controllerObject->$action($param);
                break;
        }

        if ($action === Action::STATISTIC && $controllerObject instanceof StatisticInterface) {
            $result = (new Statistic())
                ->setControllerName($controller)
                ->setAvailable($result);
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
            ->setResult($response->getResult());

        if (!$responsePacket->isValid()) {
            throw new RpcException("Parse error", ErrorCode::PARSE_ERROR);
        }

        return $responsePacket;
    }

    /**
     * Initialises the connector configuration instance.
     */
    protected function startConfiguration(): void
    {
        $configFile = Path::combine(CONNECTOR_DIR, 'config', 'config.json');
        if (!file_exists($configFile)) {
            file_put_contents($configFile, Json::encode(ConfigOption::getDefaultValues(), true));
        }
        $this->config = new FileConfig($configFile);
        $logLevel = $this->config->get(ConfigOption::LOG_LEVEL, Logger::INFO);
        RuntimeConfig::getInstance()->set(ConfigOption::LOG_LEVEL, $logLevel);
        $mainLanguage = $this->config->get(ConfigOption::MAIN_LANGUAGE,
            ConfigOption::getDefaultValue(ConfigOption::MAIN_LANGUAGE));
        RuntimeConfig::getInstance()->set(ConfigOption::MAIN_LANGUAGE, $mainLanguage);
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
            throw new SessionException('No session', ErrorCode::NO_SESSION);
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
                throw new SessionException("Session is invalid", ErrorCode::INVALID_SESSION);
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
                    throw new ApplicationException(sprintf('Could not get any data from url: %s',
                        $image->getRemoteUrl()));
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
     * @param $eventData
     * @param Method $method
     * @param string $moment
     */
    protected function triggerEvent($eventData, Method $method, string $moment): void
    {
        $eventClass = null;

        if ($eventData instanceof AbstractDataModel || $eventData instanceof QueryFilter) {
            $eventClass = "Model";
        } elseif ($method->getController() === Controller::CONNECTOR) {
            $eventClass = Controller::CONNECTOR;
        } elseif ($method->isCore()) {
            $eventClass = "Core";
        }

        if ($method->isCore() &&
            (($eventData instanceof AbstractDataModel) && ($eventData instanceof QueryFilter)) ||
            strlen(trim($method->getAction())) != 0 || strlen(trim($moment)) != 0) {


            $eventClassname = sprintf('Jtl\Connector\Core\Event\%s\%s%s%sEvent', $eventClass, $eventClass,
                ucfirst($moment),
                ucfirst($method->getAction()));

            if (class_exists($eventClassname) && in_array(EventInterface::class, class_implements($eventClassname))) {

                if ($eventData instanceof Response) {
                    $eventData = $eventData->getResult();
                }

                $event = new $eventClassname($eventData);
                $this->eventDispatcher->dispatch($event, $event->getEventName());
            }
        }
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
     * @param \Throwable $ex
     * @param object|null $model
     * @param string $controller
     * @param string $action
     * @throws \ReflectionException
     */
    protected function extendExceptionMessageWithIdentifiers(
        \Throwable $ex,
        ?object $model,
        string $controller,
        string $action
    ) {
        $messages = [
            sprintf('Controller = %s', $controller),
            sprintf('Action = %s', $action),
        ];

        if ($model instanceof IdentityInterface && $model->getId()->getHost() > 0) {
            $messages[] = sprintf('Wawi PK = %s', $model->getId()->getHost());
        }

        if ($model instanceof IdentificationInterface) {
            $messages += $model->getIdentificationStrings();
        }

        $messages[] = $ex->getMessage();
        $reflectionClass = new \ReflectionClass($ex);
        $reflectionProperty = $reflectionClass->getProperty('message');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($ex, implode(' | ', $messages));
        $reflectionProperty->setAccessible(false);
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
     * @return AbstractErrorHandler
     */
    public function getErrorHandler(): AbstractErrorHandler
    {
        return $this->errorHandler;
    }

    /**
     * @param AbstractErrorHandler $handler
     * @return $this
     */
    public function setErrorHandler(AbstractErrorHandler $handler): Application
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

    /**
     * @return Serializer
     */
    public function getSerializer(): Serializer
    {
        return $this->serializer;
    }
}

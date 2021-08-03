<?php

namespace Jtl\Connector\Core\Application;

use Composer\Autoload\ClassLoader;
use DI\Container;
use DI\ContainerBuilder;
use DI\DependencyException;
use DI\NotFoundException;
use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\Serializer;
use Jtl\Connector\Core\Authentication\TokenValidatorInterface;
use Jtl\Connector\Core\Checksum\ChecksumLoaderInterface;
use Jtl\Connector\Core\Controller\ConnectorController;
use Jtl\Connector\Core\Controller\StatisticInterface;
use Jtl\Connector\Core\Config\ConfigSchema;
use Jtl\Connector\Core\Definition\Controller;
use Jtl\Connector\Core\Definition\ErrorCode;
use Jtl\Connector\Core\Definition\Event;
use Jtl\Connector\Core\Definition\Model;
use Jtl\Connector\Core\Definition\RelationType;
use Jtl\Connector\Core\Error\ErrorHandler;
use Jtl\Connector\Core\Error\AbstractErrorHandler;
use Jtl\Connector\Core\Connector\UseChecksumInterface;
use Jtl\Connector\Core\Compression\Zip;
use Jtl\Connector\Core\Connector\ConnectorInterface;
use Jtl\Connector\Core\Connector\HandleRequestInterface;
use Jtl\Connector\Core\Connector\ModelInterface;
use Jtl\Connector\Core\Controller\TransactionalInterface;
use Jtl\Connector\Core\Definition\Action;
use Jtl\Connector\Core\Event\AckEvent;
use Jtl\Connector\Core\Event\BoolEvent;
use Jtl\Connector\Core\Event\ConnectorIdentificationEvent;
use Jtl\Connector\Core\Event\FeaturesEvent;
use Jtl\Connector\Core\Event\ResponseEvent;
use Jtl\Connector\Core\Event\RequestEvent;
use Jtl\Connector\Core\Event\ModelEvent;
use Jtl\Connector\Core\Event\QueryFilterEvent;
use Jtl\Connector\Core\Event\RpcEvent;
use Jtl\Connector\Core\Event\StatisticEvent;
use Jtl\Connector\Core\Exception\CompressionException;
use Jtl\Connector\Core\Exception\ConfigException;
use Jtl\Connector\Core\Exception\DefinitionException;
use Jtl\Connector\Core\Exception\FileNotFoundException;
use Jtl\Connector\Core\Exception\HttpException;
use Jtl\Connector\Core\Exception\LoggerException;
use Jtl\Connector\Core\Logger\LoggerService;
use Jtl\Connector\Core\Mapper\PrimaryKeyMapperInterface;
use Jtl\Connector\Core\Model\AbstractImage;
use Jtl\Connector\Core\Model\Ack;
use Jtl\Connector\Core\Model\Authentication;
use Jtl\Connector\Core\Model\Identities;
use Jtl\Connector\Core\Model\IdentityInterface;
use Jtl\Connector\Core\Model\Product;
use Jtl\Connector\Core\Model\QueryFilter;
use Jtl\Connector\Core\Model\Statistic;
use Jtl\Connector\Core\Plugin\PluginInterface;
use Jtl\Connector\Core\Exception\RpcException;
use Jtl\Connector\Core\Exception\SessionException;
use Jtl\Connector\Core\Exception\ApplicationException;
use Jtl\Connector\Core\Rpc\RequestPacket;
use Jtl\Connector\Core\Rpc\ResponsePacket;
use Jtl\Connector\Core\Rpc\Error;
use Jtl\Connector\Core\Http\JsonResponse as HttpResponse;
use Jtl\Connector\Core\Config\FileConfig;
use Jtl\Connector\Core\Subscriber\FeaturesSubscriber;
use Jtl\Connector\Core\Subscriber\RequestParamsTransformSubscriber;
use Jtl\Connector\Core\Definition\RpcMethod;
use Jtl\Connector\Core\Rpc\Method;
use Jtl\Connector\Core\Linker\IdentityLinker;
use Jtl\Connector\Core\Model\AbstractDataModel;
use Jtl\Connector\Core\Serializer\SerializerBuilder;
use Jtl\Connector\Core\Linker\ChecksumLinker;
use Jtl\Connector\Core\Session\SqliteSessionHandler;
use Jtl\Connector\Core\Session\SessionHandlerInterface;
use Monolog\ErrorHandler as MonologErrorHandler;
use Noodlehaus\ConfigInterface;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

class Application
{
    public const
        PROTOCOL_VERSION = 7,
        MIN_PHP_VERSION = '7.2';

    /**
     * @var ConfigInterface;
     */
    protected $config;

    /**
     * @var ConfigSchema
     */
    protected $configSchema;

    /**
     * @var ConnectorInterface
     */
    protected $connector;

    /**
     * @var string
     */
    protected $connectorDir;

    /**
     * @var Container
     */
    protected $container;

    /**
     * @var string[]
     */
    protected $deleteFromFileSystem = [];

    /**
     * @var AbstractErrorHandler
     */
    protected $errorHandler;

    /**
     * @var EventDispatcher
     */
    protected $eventDispatcher;

    /**
     * @var Filesystem
     */
    protected $fileSystem;

    /**
     * @var LoggerService
     */
    protected $loggerService;

    /**
     * @var HttpRequest
     */
    protected $request;

    /**
     * @var HttpResponse
     */
    protected $response;

    /**
     * @var SessionHandlerInterface
     */
    protected $sessionHandler;

    /**
     * @var Serializer
     */
    protected $serializer;

    /**
     * @var array<string, string>
     */
    protected static $mimeTypeToExtensionMappings = [
        'image/bmp' => 'bmp',
        'image/x-bmp' => 'bmp',
        'image/x-bitmap' => 'bmp',
        'image/x-xbitmap' => 'bmp',
        'image/x-win-bitmap' => 'bmp',
        'image/x-windows-bmp' => 'bmp',
        'image/ms-bmp' => 'bmp',
        'image/x-ms-bmp' => 'bmp',
        'application/bmp' => 'bmp',
        'application/x-bmp' => 'bmp',
        'application/x-win-bitmap' => 'bmp',
        'image/gif' => 'gif',
        'image/x-icon' => 'ico',
        'image/x-ico' => 'ico',
        'image/vnd.microsoft.icon' => 'ico',
        'image/jpeg' => 'jpg',
        'image/pjpeg' => 'jpg',
        'image/svg+xml' => 'svg',
        'image/png' => 'png',
        'image/x-png' => 'png',
        'image/tiff' => 'tif',
        'image/x-tiff' => 'tif',
    ];

    /**
     * Application constructor.
     * @param ConnectorInterface $connector
     * @param string $connectorDir
     * @param ConfigInterface|null $config
     * @param ConfigSchema|null $configSchema
     * @throws ApplicationException
     * @throws ConfigException
     * @throws LoggerException
     * @throws \ReflectionException
     */
    public function __construct(ConnectorInterface $connector, string $connectorDir, ConfigInterface $config = null, ConfigSchema $configSchema = null)
    {
        if (!is_dir($connectorDir)) {
            throw ApplicationException::connectorDirNotExists($connectorDir);
        }
        AnnotationRegistry::registerLoader('class_exists');

        if (is_null($config)) {
            $config = new FileConfig(sprintf('%s/config/config.json', $connectorDir));
        }

        if (is_null($configSchema)) {
            $configSchema = new ConfigSchema();
        }

        $this->prepareConfig($connectorDir, $config, $configSchema);

        $serializerCacheDir = null;
        if ($config->get(ConfigSchema::DEBUG, false) === false && $config->get(ConfigSchema::ENABLE_SERIALIZER_CACHE, true) === true) {
            $serializerCacheDir = $config->get(ConfigSchema::CACHE_DIR);
        }

        $this->connector = $connector;
        $this->connectorDir = $connectorDir;
        $this->config = $config;
        $this->configSchema = $configSchema;
        $this->container = (new ContainerBuilder())
            ->useAnnotations(true)
            ->useAutowiring(true)
            ->build();
        $this->container->set(Application::class, $this);
        $this->eventDispatcher = new EventDispatcher();
        $this->fileSystem = new Filesystem();
        $this->loggerService = (new LoggerService($this->config->get(ConfigSchema::LOG_DIR), $this->config->get(ConfigSchema::LOG_LEVEL)))
            ->setFormat($this->config->get(ConfigSchema::LOG_FORMAT));
        $this->container->set(LoggerService::class, $this->loggerService);
        $this->request = HttpRequest::createFromGlobals();
        $this->serializer = SerializerBuilder::create($serializerCacheDir)->build();
        $this->response = new HttpResponse($this->eventDispatcher, $this->serializer);
        $this->errorHandler = new ErrorHandler($this->response);
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
     * @throws ApplicationException
     * @throws DefinitionException
     * @throws \Throwable
     */
    public function run(): void
    {
        $jtlrpc = $this->request->get('jtlrpc', '');

        $this->container->set(LoggerInterface::class, $this->loggerService->get(LoggerService::CHANNEL_GLOBAL));
        $this->response->setLogger($this->loggerService->get(LoggerService::CHANNEL_RPC));
        $this->eventDispatcher->addSubscriber(new RequestParamsTransformSubscriber());
        $this->eventDispatcher->addSubscriber(new FeaturesSubscriber());
        $this->errorHandler->register();
        MonologErrorHandler::register($this->loggerService->get(LoggerService::CHANNEL_ERROR));
        $requestPacket = RequestPacket::createFromJtlrpc($jtlrpc, $this->serializer);
        $this->errorHandler->setRequestPacket($requestPacket);

        try {
            if (!$requestPacket->isValid()) {
                throw RpcException::invalidRequest();
            }

            $method = Method::createFromRequestPacket($requestPacket);
            if (!Controller::isController($method->getController())) {
                throw DefinitionException::unknownController($method->getController());
            }

            if (!Action::isAction($method->getAction())) {
                throw DefinitionException::unknownAction($method->getAction());
            }

            $this->startSession($requestPacket->getMethod());
            $this->connector->initialize($this->config, $this->container, $this->eventDispatcher);
            $this->prepareContainer($this, $this->container);
            $this->loadPlugins($this->config, $this->container, $this->eventDispatcher, $this->config->get(ConfigSchema::PLUGINS_DIR));
            $this->configSchema->validateConfig($this->config);

            $logJtlrpc = $jtlrpc;
            if ($requestPacket->getMethod() === RpcMethod::AUTH) {
                $pattern = '/\"token\":\s?\"(.*)\"/';
                $replacement = '"token": "******************"';
                $logJtlrpc = preg_replace($pattern, $replacement, $logJtlrpc);
            }
            // Log incoming request packet (debug only and configuration must be initialized)
            $this->loggerService->get(LoggerService::CHANNEL_RPC)->debug($logJtlrpc);

            $event = new RpcEvent($requestPacket->getParams(), $method->getController(), $method->getAction());
            $this->eventDispatcher->dispatch($event, Event::createRpcEventName(Event::BEFORE));
            $requestPacket->setParams($event->getData());

            $responsePacket = $this->execute($requestPacket, $method);
            session_write_close();
        } catch (\Throwable $ex) {
            $error = (new Error())
                ->setCode($ex->getCode())
                ->setMessage($ex->getMessage())
                ->setData(Error::createDataFromException($ex));

            $responsePacket = ResponsePacket::create($requestPacket->getId())
                ->setError($error);

            $this->loggerService->get(LoggerService::CHANNEL_ERROR)->debug($ex->getTraceAsString());

            throw $ex;
        } finally {
            $this->fileSystem->remove($this->deleteFromFileSystem);
            $this->response->prepareAndSend($requestPacket, $responsePacket);

            if (mt_rand(0, 99) === 0) {
                $this->getSessionHandler()->gc((int)ini_get('session.gc_maxlifetime'));
            }
        }
    }

    /**
     * Connector getter
     *
     * @return ConnectorInterface
     */
    public function getConnector(): ConnectorInterface
    {
        return $this->connector;
    }

    /**
     * @return ConfigInterface
     */
    public function getConfig(): ConfigInterface
    {
        return $this->config;
    }

    /**
     * @return Container
     */
    public function getContainer(): Container
    {
        return $this->container;
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
     * @return LoggerService
     */
    public function getLoggerService(): LoggerService
    {
        return $this->loggerService;
    }

    /**
     * @return int
     */
    public function getProtocolVersion(): int
    {
        return self::PROTOCOL_VERSION;
    }

    /**
     * @param HttpRequest $request
     * @return Application
     */
    public function setRequest(HttpRequest $request): self
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @return Serializer
     */
    public function getSerializer(): Serializer
    {
        return $this->serializer;
    }

    /**
     * @return SessionHandlerInterface
     * @throws SessionException
     */
    public function getSessionHandler(): SessionHandlerInterface
    {
        if (is_null($this->sessionHandler)) {
            $this->sessionHandler = new SqliteSessionHandler(sprintf('%s/var', $this->connectorDir));
            $this->sessionHandler->setLogger($this->loggerService->get(LoggerService::CHANNEL_SESSION));
        }
        return $this->sessionHandler;
    }

    /**
     * @param SessionHandlerInterface $sessionHandler
     * @return Application
     */
    public function setSessionHandler(SessionHandlerInterface $sessionHandler): Application
    {
        $this->sessionHandler = $sessionHandler;
        return $this;
    }

    /**
     * @param RequestPacket $requestPacket
     * @param Response $response
     * @return ResponsePacket
     * @throws RpcException
     */
    protected function buildRpcResponse(RequestPacket $requestPacket, Response $response): ResponsePacket
    {
        $responsePacket = ResponsePacket::create($requestPacket->getId())
            ->setResult($response->getResult());

        if (!$responsePacket->isValid()) {
            throw new RpcException("Parse error", ErrorCode::PARSE_ERROR);
        }

        return $responsePacket;
    }

    /**
     * @param RequestPacket $requestPacket
     * @param Method $method
     * @param string $modelNamespace
     * @return Request
     * @throws DefinitionException
     * @throws DependencyException
     * @throws NotFoundException
     * @throws \ReflectionException
     */
    protected function createHandleRequest(RequestPacket $requestPacket, Method $method, string $modelNamespace): Request
    {
        $controller = $method->getController();
        $action = $method->getAction();

        switch ($action) {
            case Action::AUTH:
                $type = Authentication::class;
                break;
            case Action::ACK:
                $type = Ack::class;
                break;
            case Action::CLEAR:
                $type = Identities::class;
                break;
            case Action::PUSH:
            case Action::DELETE:
                $className = sprintf('%s\%s', $modelNamespace, $controller);
                switch ($controller) {
                    case Controller::IMAGE:
                        $className = AbstractImage::class;
                        break;
                    case Controller::PRODUCT_PRICE:
                    case Controller::PRODUCT_STOCK_LEVEL:
                        $className = Product::class;
                        break;
                }
                $type = sprintf("array<%s>", $className);
                break;
            default:
                $type = QueryFilter::class;
        }

        $params = $this->serializer->fromArray($requestPacket->getParams(), $type);

        if (!is_array($params)) {
            $params = [$params];
        }

        $eventArgClass = $this->createModelEventClassName($controller);

        // Identity mapping
        foreach ($params as $param) {
            $eventArg = null;
            switch ($action) {
                case Action::ACK:
                    $eventArg = new AckEvent($param);
                    break;
                case Action::PUSH:
                case Action::DELETE:
                    $this->container->get(IdentityLinker::class)->linkModel($param);
                    $this->container->get(ChecksumLinker::class)->link($param);
                    $eventArg = new $eventArgClass($param);
                    break;
                case Action::PULL:
                case Action::STATISTIC:
                    $eventArg = new QueryFilterEvent($param);
                    break;
                case Action::CLEAR:
                    foreach ($param->getIdentities() as $relationType => $identities) {
                        foreach ($identities as $identity) {
                            $this->container->get(IdentityLinker::class)->linkIdentity($identity, RelationType::getModelName($relationType), 'id');
                        }
                    }
                    break;
            }

            if (!is_null($eventArg)) {
                $eventName = Action::isCoreAction($action)
                    ? Event::createCoreEventName($controller, $action, Event::BEFORE)
                    : Event::createEventName($controller, $action, Event::BEFORE);

                $this->eventDispatcher->dispatch($eventArg, $eventName);
            }
        }

        return Request::create($controller, $action, $params);
    }

    /**
     * @param string $controllerName
     * @return string
     */
    protected function createModelEventClassName(string $controllerName): string
    {
        if (in_array($controllerName, [Controller::PRODUCT_PRICE, Controller::PRODUCT_STOCK_LEVEL], true)) {
            $controllerName = Controller::PRODUCT;
        }

        $eventArgClass = sprintf('Jtl\\Connector\\Core\\Event\\%sEvent', $controllerName);
        if (!class_exists($eventArgClass)) {
            $eventArgClass = ModelEvent::class;
        }

        return $eventArgClass;
    }

    /**
     * @param RequestPacket $requestPacket
     * @param Method $method
     * @return ResponsePacket
     * @throws ApplicationException
     * @throws CompressionException
     * @throws DefinitionException
     * @throws HttpException
     * @throws RpcException
     * @throws \ReflectionException
     * @throws \Throwable
     */
    protected function execute(RequestPacket $requestPacket, Method $method): ResponsePacket
    {
        $modelNamespace = Model::MODEL_NAMESPACE;
        if ($this->connector instanceof ModelInterface) {
            $modelNamespace = $this->connector->getModelNamespace();
        }

        $request = $this->createHandleRequest($requestPacket, $method, $modelNamespace);
        if ($request->getController() === Controller::IMAGE && $request->getAction() === Action::PUSH) {
            $this->handleImagePush(...$request->getParams());
        }

        $this->eventDispatcher->dispatch(
            new RequestEvent($request),
            Event::createHandleEventName($request->getController(), $request->getAction(), Event::BEFORE)
        );

        if (!$method->isCore() && $this->connector instanceof HandleRequestInterface) {
            $response = $this->connector->handle($this, $request);
        } else {
            $response = $this->handleRequest($request);
        }

        $this->eventDispatcher->dispatch(
            new ResponseEvent($response),
            Event::createHandleEventName($request->getController(), $request->getAction(), Event::AFTER)
        );

        $eventName = null;
        if (Action::isCoreAction($request->getAction())) {
            $eventName = Event::createCoreEventName($request->getController(), $request->getAction(), Event::AFTER);
        } elseif (Action::isAction($request->getAction())) {
            $eventName = Event::createEventName($request->getController(), $request->getAction(), Event::AFTER);
        }

        // Identity mapping
        $resultData = is_array($response->getResult()) ? $response->getResult() : [$response->getResult()];
        foreach ($resultData as $result) {
            if ($this->connector instanceof HandleRequestInterface ||
                in_array($request->getAction(), [Action::PUSH, Action::DELETE], true) === false) {
                if ($result instanceof AbstractDataModel) {
                    $this->container->get(IdentityLinker::class)->linkModel($result, ($request->getAction() === Action::DELETE));
                    $this->container->get(ChecksumLinker::class)->link($result);
                }
            }

            $eventArg = null;
            switch ($request->getAction()) {
                case Action::PUSH:
                case Action::PULL:
                case Action::DELETE:
                    $eventArgClass = $this->createModelEventClassName($request->getController());
                    $eventArg = new $eventArgClass($result);
                    break;
                case Action::STATISTIC:
                    $eventArg = new StatisticEvent($result);
                    break;
                case Action::ACK:
                case Action::CLEAR:
                case Action::FINISH:
                case Action::INIT:
                    $eventArg = new BoolEvent($result);
                    break;
                case Action::IDENTIFY:
                    $eventArg = new ConnectorIdentificationEvent($result);
                    break;
                case Action::FEATURES:
                    $eventArg = new FeaturesEvent($result);
                    break;
            }

            if (!is_null($eventName) && !is_null($eventArg)) {
                $this->eventDispatcher->dispatch($eventArg, $eventName);
            }
        }

        return $this->buildRpcResponse($requestPacket, $response);
    }

    /**
     * @param \Throwable $ex
     * @param object|null $model
     * @param string $controller
     * @param string $action
     * @throws \ReflectionException
     */
    protected function extendExceptionMessageWithIdentifiers(\Throwable $ex, ?object $model, string $controller, string $action)
    {
        $messages = [
            sprintf('Controller = %s', $controller),
            sprintf('Action = %s', $action),
        ];

        if ($model instanceof IdentityInterface && $model->getId()->getHost() > 0) {
            $messages[] = sprintf('JTL-Wawi PK = %d', $model->getId()->getHost());
        }

        if ($model->hasIdentificationStrings()) {
            $messages = array_merge($messages, $model->getIdentificationStrings($this->config->get(ConfigSchema::MAIN_LANGUAGE, 'de')));
        }

        $messages[] = $ex->getMessage();
        $reflectionClass = new \ReflectionClass($ex);
        $reflectionProperty = $reflectionClass->getProperty('message');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($ex, implode(' | ', $messages));
        $reflectionProperty->setAccessible(false);
    }

    /**
     * @param AbstractImage ...$images
     * @throws ApplicationException
     * @throws CompressionException
     * @throws DefinitionException
     * @throws FileNotFoundException
     */
    protected function handleImagePush(AbstractImage ...$images): void
    {
        $imagePaths = [];
        $tempDir = $this->deleteFromFileSystem[] = sprintf('%s/%s', $this->config->get(ConfigSchema::CACHE_DIR), uniqid('images-'));
        $this->fileSystem->mkdir($tempDir);

        if ($this->request->files->has('file')) {
            /** @var UploadedFile $zipFile */
            $zipFile = $this->request->files->get('file');
            $archive = new Zip();
            if ($archive->extract($zipFile->getRealPath(), $tempDir)) {
                $finder = (new Finder())->files()->ignoreDotFiles(true)->in($tempDir);
                foreach ($finder as $file) {
                    $imagePaths[] = $file->getRealpath();
                }
            } else {
                throw ApplicationException::fileCouldNotGetExtracted();
            }
        }

        foreach ($images as $image) {
            if (!empty($image->getRemoteUrl())) {
                $imageData = file_get_contents($image->getRemoteUrl());
                if ($imageData === false) {
                    throw ApplicationException::remoteImageNotFound($image);
                }
                $path = parse_url($image->getRemoteUrl(), PHP_URL_PATH);
                $fileName = pathinfo($path, PATHINFO_BASENAME);
                $imagePath = sprintf('%s/%s_%s', $tempDir, uniqid(), $fileName);
                if (file_put_contents($imagePath, $imageData) === false) {
                    throw ApplicationException::fileCouldNotGetCreated($imagePath);
                }
                $image->setFilename($imagePath);
            } else {
                if (!$this->request->files->has('file')) {
                    throw ApplicationException::uploadedFileNotFound();
                }

                $imageFound = false;
                foreach ($imagePaths as $imagePath) {
                    $imageFound = false;
                    $fileInfo = pathinfo($imagePath);
                    list($hostId, $relationType) = explode('_', $fileInfo['filename']);
                    if ((int)$hostId == $image->getId()->getHost()
                        && strtolower($relationType) === strtolower($image->getRelationType())
                    ) {
                        $extension = self::determineExtensionByMimeType(mime_content_type($imagePath));
                        if ($extension !== null && $fileInfo['extension'] !== $extension) {
                            $newImagePath = sprintf('%s/%s.%s', $tempDir, $fileInfo['filename'], $extension);
                            rename($imagePath, $newImagePath);
                            $imagePath = $newImagePath;
                        }

                        $image->setFilename($imagePath);
                        $imageFound = true;
                        break;
                    }
                }

                if (!$imageFound) {
                    throw ApplicationException::imageNotFound($image);
                }
            }
        }
    }

    /**
     * @param Request $request
     * @return Response
     * @throws ApplicationException
     * @throws DependencyException
     * @throws NotFoundException
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function handleRequest(Request $request): Response
    {
        $controller = $request->getController();
        $action = $request->getAction();
        $params = $request->getParams();

        if (Action::isCoreAction($action)) {
            $this->container->set($controller, function (ContainerInterface $container) {
                $controller = new ConnectorController(
                    $this->config->get(ConfigSchema::FEATURES_PATH),
                    $container->get(ChecksumLinker::class),
                    $container->get(IdentityLinker::class),
                    $container->get(SessionHandlerInterface::class),
                    $container->get(TokenValidatorInterface::class)
                );
                $controller->setLogger($this->loggerService->get(LoggerService::CHANNEL_GLOBAL));
                return $controller;
            });
        } elseif (!$this->container->has($controller)) {
            $controllerClass = sprintf("%s\\%sController", $this->connector->getControllerNamespace(), $controller);
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
                    foreach ($params as $model) {
                        if ($controllerObject instanceof TransactionalInterface) {
                            $controllerObject->beginTransaction();
                        }

                        $dataModel = $controllerObject->$action($model);
                        if ($dataModel instanceof AbstractDataModel) {
                            $this->container->get(IdentityLinker::class)->linkModel($dataModel, ($request->getAction() === Action::DELETE));
                            $this->container->get(ChecksumLinker::class)->link($dataModel);
                        }
                        $result[] = $dataModel;

                        if ($controllerObject instanceof TransactionalInterface) {
                            $controllerObject->commit();
                        }
                    }
                } catch (\Throwable $ex) {
                    if ($controllerObject instanceof TransactionalInterface) {
                        $controllerObject->rollback();
                    }

                    $this->extendExceptionMessageWithIdentifiers($ex, $model, $controller, $action);

                    throw $ex;
                }
                break;
            case Action::IDENTIFY:
                $result = $controllerObject->$action($this->getConnector());
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
     * @param ConfigInterface $config
     * @param Container $container
     * @param EventDispatcher $eventDispatcher
     * @param string $pluginsDir
     */
    protected function loadPlugins(ConfigInterface $config, Container $container, EventDispatcher $eventDispatcher, string $pluginsDir): void
    {
        $loader = new ClassLoader();
        $loader->add('', $pluginsDir);
        $loader->register();

        if (is_dir($pluginsDir)) {
            $finder = (new Finder())->files()->name('/Bootstrap.php/')->in($pluginsDir);
            foreach ($finder as $file) {
                $class = sprintf('\\%s\\Bootstrap', str_replace(DIRECTORY_SEPARATOR, '\\', $file->getRelativePath()));
                if (class_exists($class)) {
                    $plugin = new $class();
                    if ($plugin instanceof PluginInterface) {
                        $plugin->registerListener($config, $container, $eventDispatcher);
                    }
                }
            }
        }
    }

    /**
     * @param string $connectorDir
     * @param ConfigInterface $config
     * @param ConfigSchema $configSchema
     * @throws ConfigException
     */
    protected function prepareConfig(string $connectorDir, ConfigInterface $config, ConfigSchema $configSchema): void
    {
        foreach (ConfigSchema::createDefaultParameters($connectorDir) as $parameter) {
            if ($configSchema->hasParameter($parameter->getKey())) {
                $parameter->setDefaultValue($configSchema->getParameter($parameter->getKey())->getDefaultValue());
            }
            $configSchema->setParameter($parameter);
        }

        $config->set(ConfigSchema::CONNECTOR_DIR, $connectorDir);
        foreach ($configSchema->getParameters() as $parameter) {
            $key = $parameter->getKey();
            if ($parameter->hasDefaultValue() && !$config->has($key)) {
                $config->set($key, $parameter->getDefaultValue());
            }
        }
    }

    /**
     * @param Application $application
     * @param Container $container
     * @throws ApplicationException
     */
    protected function prepareContainer(Application $application, Container $container): void
    {
        $connector = $application->getConnector();
        $container->set(ConfigInterface::class, $application->getConfig());
        $container->set(SessionHandlerInterface::class, $application->getSessionHandler());
        $container->set(TokenValidatorInterface::class, $connector->getTokenValidator());
        $container->set(PrimaryKeyMapperInterface::class, $connector->getPrimaryKeyMapper());

        if ($connector instanceof UseChecksumInterface) {
            $container->set(ChecksumLoaderInterface::class, $connector->getChecksumLoader());
        }

        $container->set(ChecksumLinker::class, function (ContainerInterface $container) {
            $loader = $container->has(ChecksumLoaderInterface::class) ? $container->get(ChecksumLoaderInterface::class) : null;
            $linker = new ChecksumLinker($loader);
            $linker->setLogger($this->loggerService->get(LoggerService::CHANNEL_CHECKSUM));
            return $linker;
        });

        $container->set(IdentityLinker::class, function (ContainerInterface $container) {
            $linker = new IdentityLinker($container->get(PrimaryKeyMapperInterface::class));
            $linker->setLogger($this->loggerService->get(LoggerService::CHANNEL_LINKER));
            return $linker;
        });
    }

    /**
     * @param string $rpcMethod
     * @throws ApplicationException
     * @throws HttpException
     * @throws SessionException
     */
    protected function startSession(string $rpcMethod): void
    {
        $sessionId = $this->request->get('jtlauth');
        $sessionName = 'JtlConnector';

        if ($sessionId === null && $rpcMethod !== RpcMethod::AUTH) {
            throw new SessionException('No session', ErrorCode::NO_SESSION);
        }

        $sessionHandler = $this->getSessionHandler();

        if ($sessionHandler instanceof LoggerAwareInterface) {
            $sessionHandler->setLogger($this->loggerService->get(LoggerService::CHANNEL_SESSION));
        }

        session_name($sessionName);
        if ($sessionId !== null) {
            if ($sessionHandler->validateId($sessionId)) {
                session_id($sessionId);
            } else {
                throw new SessionException("Session is invalid", ErrorCode::INVALID_SESSION);
            }
        }

        session_set_save_handler($sessionHandler, true);

        session_start();
        $this->loggerService->get(LoggerService::CHANNEL_SESSION)->debug('Session started with id ({sessionId})', ['sessionId' => session_id()]);
    }

    /**
     * @param string $mimeType
     * @return string
     */
    protected static function determineExtensionByMimeType(string $mimeType): ?string
    {
        return self::$mimeTypeToExtensionMappings[$mimeType] ?? null;
    }
}

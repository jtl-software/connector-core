<?php

namespace Jtl\Connector\Core\Application;

use DI\Container;
use DI\ContainerBuilder;
use DI\DependencyException;
use DI\NotFoundException;
use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\Serializer;
use Jtl\Connector\Core\Authentication\TokenValidatorInterface;
use Jtl\Connector\Core\Checksum\ChecksumLoaderInterface;
use Jtl\Connector\Core\Config\GlobalConfig;
use Jtl\Connector\Core\Controller\ConnectorController;
use Jtl\Connector\Core\Controller\StatisticInterface;
use Jtl\Connector\Core\Config\ConfigSchema;
use Jtl\Connector\Core\Definition\Controller;
use Jtl\Connector\Core\Definition\ErrorCode;
use Jtl\Connector\Core\Definition\Event;
use Jtl\Connector\Core\Definition\Model;
use Jtl\Connector\Core\Error\ErrorHandler;
use Jtl\Connector\Core\Error\AbstractErrorHandler;
use Jtl\Connector\Core\Connector\UseChecksumInterface;
use Jtl\Connector\Core\Compression\Zip;
use Jtl\Connector\Core\Connector\ConnectorInterface;
use Jtl\Connector\Core\Connector\HandleRequestInterface;
use Jtl\Connector\Core\Connector\ModelInterface;
use Jtl\Connector\Core\Controller\TransactionalInterface;
use Jtl\Connector\Core\Definition\Action;
use Jtl\Connector\Core\Event\BoolEvent;
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
use Jtl\Connector\Core\Exception\HttpException;
use Jtl\Connector\Core\Exception\LinkerException;
use Jtl\Connector\Core\IO\Temp;
use Jtl\Connector\Core\Mapper\PrimaryKeyMapperInterface;
use Jtl\Connector\Core\Model\AbstractImage;
use Jtl\Connector\Core\Model\Ack;
use Jtl\Connector\Core\Model\Authentication;
use Jtl\Connector\Core\Model\IdentityInterface;
use Jtl\Connector\Core\Model\IdentificationInterface;
use Jtl\Connector\Core\Model\QueryFilter;
use Jtl\Connector\Core\Model\Statistic;
use Jtl\Connector\Core\Plugin\PluginInterface;
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
use Jtl\Connector\Core\Subscriber\CoreFeaturesSubscriber;
use Jtl\Connector\Core\Subscriber\PrepareProductPricesSubscriber;
use Jtl\Connector\Core\Definition\RpcMethod;
use Jtl\Connector\Core\Logger\Logger;
use Jtl\Connector\Core\Rpc\Method;
use Jtl\Connector\Core\Linker\IdentityLinker;
use Jtl\Connector\Core\Model\AbstractDataModel;
use Jtl\Connector\Core\Serializer\SerializerBuilder;
use Jtl\Connector\Core\Linker\ChecksumLinker;
use Jtl\Connector\Core\Session\SqliteSessionHandler;
use Jtl\Connector\Core\Session\SessionHandlerInterface;
use Noodlehaus\ConfigInterface;
use Psr\Container\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\Finder\Finder;

class Application
{
    public const
        PROTOCOL_VERSION = 7,
        MIN_PHP_VERSION = '7.2';

    /**
     * @var string
     */
    protected $connectorDir;

    /**
     * @var ConnectorInterface
     */
    protected $connector = null;

    /**
     * @var ConfigInterface;
     */
    protected $config;

    /**
     * @var ConfigSchema
     */
    protected $configSchema;

    /**
     * @var SessionHandlerInterface
     */
    protected $sessionHandler;

    /**
     * @var EventDispatcher
     */
    protected $eventDispatcher;

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
     * @var Temp
     */
    protected $temp;

    /**
     * @var string[]
     */
    protected $imagesToDelete = [];

    /**
     * Application constructor.
     * @param ConnectorInterface $connector
     * @param string $connectorDir
     * @param ConfigInterface|null $config
     * @param ConfigSchema $configSchema |null
     * @throws ApplicationException|ConfigException
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

        $serializerCacheDir = $config->get(ConfigSchema::DEBUG, false) === true ? $config->get(ConfigSchema::CACHE_DIR) : null;

        $this->connector = $connector;
        $this->connectorDir = $connectorDir;
        $this->config = $config;
        $this->configSchema = $configSchema;
        $this->container = (new ContainerBuilder())->build();
        $this->container->set(Application::class, $this);
        $this->eventDispatcher = new EventDispatcher();
        $this->serializer = SerializerBuilder::create($serializerCacheDir)->build();
        $this->errorHandler = new ErrorHandler($this->eventDispatcher, $this->serializer);
        $this->temp = new Temp($this->connectorDir);
    }

    /**
     * @throws ApplicationException
     * @throws DefinitionException
     */
    public function run(): void
    {
        $this->eventDispatcher->addSubscriber(new PrepareProductPricesSubscriber());
        $this->eventDispatcher->addSubscriber(new CoreFeaturesSubscriber());
        $this->errorHandler->register();
        $method = Method::createFromRpcMethod('unknown.unknown');

        try {
            $jtlrpc = HttpRequest::getJtlrpc();
            $requestPacket = RequestPacket::createFromJtlrpc($jtlrpc, $this->serializer);
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
            $this->config->set(ConfigSchema::CONNECTOR_DIR, $this->connectorDir);
            $this->configSchema->validateConfig($this->config);
            $this->prepareContainer($this, $this->container);
            $this->loadPlugins($this->config->get(ConfigSchema::PLUGINS_DIR), $this->eventDispatcher);

            $logJtlrpc = $jtlrpc;
            if ($requestPacket->getMethod() === RpcMethod::AUTH) {
                $pattern = '/\"token\":\s?\"(.*)\"/';
                $replacement = '"token": "******************"';
                $logJtlrpc = preg_replace($pattern, $replacement, $logJtlrpc);
            }

            // Log incoming request packet (debug only and configuration must be initialized)
            Logger::write(sprintf('Request packet: %s', $logJtlrpc), Logger::DEBUG, Logger::CHANNEL_RPC);
            if ($requestPacket->getMethod() !== RpcMethod::AUTH && !empty($requestPacket->getParams())) {
                Logger::write(
                    sprintf('Params: %s', Json::encode($requestPacket->getParams())),
                    Logger::DEBUG,
                    Logger::CHANNEL_RPC
                );
            }

            $eventData = Json::decode((string)$jtlrpc, true);
            $event = new RpcEvent($eventData, $method->getController(), $method->getAction());
            $this->eventDispatcher->dispatch($event, Event::createRpcEventName(Event::BEFORE));

            $responsePacket = $this->execute($requestPacket, $method);
        } catch (\Throwable $ex) {
            $error = (new Error())
                ->setCode($ex->getCode())
                ->setMessage($ex->getMessage())
                ->setData(Logger::createExceptionInfos($ex, true));

            $responsePacket = (new ResponsePacket())
                ->setId($requestPacket->getId())
                ->setError($error);

            Logger::writeException($ex);
        } finally {
            if (count($this->imagesToDelete) > 0) {
                HttpRequest::deleteFileUploads($this->imagesToDelete);
                $this->imagesToDelete = [];
            }

            $arrayResponse = $responsePacket->toArray($this->serializer);

            $event = new RpcEvent($arrayResponse, $method->getController(), $method->getAction());
            $this->eventDispatcher->dispatch($event, Event::createRpcEventName(Event::AFTER));

            HttpResponse::send($arrayResponse);

            if (mt_rand(0, 99) === 0) {
                $this->getSessionHandler()->gc((int)ini_get('session.gc_maxlifetime'));
            }
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

        $eventArgClass = $this->createModelEventClassName($request->getController());

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
                    $eventArg = new $eventArgClass($result);
                    break;
                case Action::STATISTIC:
                    $eventArg = new StatisticEvent($result);
                    break;
                case Action::CLEAR:
                case Action::FINISH:
                    $eventArg = new BoolEvent($result);
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
     * @param RequestPacket $requestPacket
     * @param Method $method
     * @param string $modelNamespace
     * @return Request
     * @throws DefinitionException
     * @throws DependencyException
     * @throws NotFoundException
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

        $params = $this->serializer->fromArray($requestPacket->getParams(), $type);

        if (!is_array($params)) {
            $params = [$params];
        }

        $eventArgClass = $this->createModelEventClassName($controller);

        // Identity mapping
        foreach ($params as $param) {
            $eventArg = null;
            switch ($action) {
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
            }

            if (!is_null($eventArg)) {
                $this->eventDispatcher->dispatch($eventArg, Event::createEventName($controller, $action, Event::BEFORE));
            }
        }

        return Request::create($controller, $action, $params);
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
                return new ConnectorController(
                    $this->config->get(ConfigSchema::FEATURES_PATH),
                    $container->get(IdentityLinker::class),
                    $container->get(ChecksumLinker::class),
                    $container->get(SessionHandlerInterface::class),
                    $container->get(TokenValidatorInterface::class)
                );
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
     * @param string $pluginsDir
     * @param EventDispatcher $eventDispatcher
     */
    protected function loadPlugins(string $pluginsDir, EventDispatcher $eventDispatcher): void
    {
        if (is_dir($pluginsDir)) {
            $finder = (new Finder())->files()->name('/(b|B)ootstrap.php/')->in($pluginsDir);
            foreach ($finder as $file) {
                include($file->getPathName());

                $class = sprintf('\\%s\\Bootstrap', str_replace(DIRECTORY_SEPARATOR, '\\', $file->getRelativePath()));
                if (class_exists($class)) {
                    $plugin = new $class();
                    if ($plugin instanceof PluginInterface) {
                        $plugin->registerListener($eventDispatcher);
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

        $globalConfig = GlobalConfig::getInstance();
        foreach ($configSchema->getParameters() as $parameter) {
            $key = $parameter->getKey();
            if ($parameter->hasDefaultValue() && !$config->has($key)) {
                $config->set($key, $parameter->getDefaultValue());
            }

            if ($parameter->isGlobal() && $config->has($key)) {
                $globalConfig->set($key, $config->get($key));
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
    }

    /**
     * @param string $rpcMethod
     * @throws ApplicationException
     * @throws HttpException
     * @throws SessionException
     */
    protected function startSession(string $rpcMethod): void
    {
        $sessionId = HttpRequest::getSession();
        $sessionName = 'JtlConnector';

        if ($sessionId === null && $rpcMethod !== RpcMethod::AUTH) {
            throw new SessionException('No session', ErrorCode::NO_SESSION);
        }

        $sessionHandler = $this->getSessionHandler();

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
        $zipFile = HttpRequest::handleFileUpload($this->temp);
        $tempDir = $this->temp->createDirectory();
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
                    throw new ApplicationException(sprintf(
                        'Could not get any data from url: %s',
                        $image->getRemoteUrl()
                    ));
                }

                $path = parse_url($image->getRemoteUrl(), PHP_URL_PATH);
                $fileName = pathinfo($path, PATHINFO_BASENAME);
                $imagePath = sprintf('%s/%s_%s', $this->temp->getDirectory(), uniqid(), $fileName);
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
            $messages = array_merge($messages, $model->getIdentificationStrings());
        }

        $messages[] = $ex->getMessage();
        $reflectionClass = new \ReflectionClass($ex);
        $reflectionProperty = $reflectionClass->getProperty('message');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($ex, implode(' | ', $messages));
        $reflectionProperty->setAccessible(false);
    }

    /**
     * @param string $controllerName
     * @return string
     */
    protected function createModelEventClassName(string $controllerName): string
    {
        $eventArgClass = sprintf('Jtl\\Connector\\Core\\Event\\%sEvent', $controllerName);
        if (!class_exists($eventArgClass)) {
            $eventArgClass = ModelEvent::class;
        }
        return $eventArgClass;
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
     * @return SessionHandlerInterface
     * @throws ApplicationException
     */
    public function getSessionHandler(): SessionHandlerInterface
    {
        if (is_null($this->sessionHandler)) {
            $this->sessionHandler = new SqliteSessionHandler($this->connectorDir);
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
     * @return int
     */
    public function getProtocolVersion(): int
    {
        return self::PROTOCOL_VERSION;
    }

    /**
     * @return ConfigInterface
     */
    public function getConfig(): ConfigInterface
    {
        return $this->config;
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
     * @return Serializer
     */
    public function getSerializer(): Serializer
    {
        return $this->serializer;
    }
}

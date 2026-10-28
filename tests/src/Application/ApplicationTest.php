<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Test\Application;

use DI\Container;
use DI\Definition\Exception\InvalidDefinition;
use DI\DependencyException;
use DI\NotFoundException;
use Jawira\CaseConverter\CaseConverterException;
use JMS\Serializer\Exception\LogicException;
use JMS\Serializer\Exception\NotAcceptableException;
use JMS\Serializer\Exception\RuntimeException;
use JMS\Serializer\Exception\UnsupportedFormatException;
use JsonException;
use Jtl\Connector\Core\Application\Application;
use Jtl\Connector\Core\Application\Request;
use Jtl\Connector\Core\Application\Response;
use Jtl\Connector\Core\Authentication\TokenValidatorInterface;
use Jtl\Connector\Core\Config\ArrayConfig;
use Jtl\Connector\Core\Config\ConfigParameter;
use Jtl\Connector\Core\Config\ConfigSchema;
use Jtl\Connector\Core\Config\CoreConfigInterface;
use Jtl\Connector\Core\Connector\ConnectorInterface;
use Jtl\Connector\Core\Definition\Action;
use Jtl\Connector\Core\Definition\Controller;
use Jtl\Connector\Core\Definition\ErrorCode;
use Jtl\Connector\Core\Definition\Event;
use Jtl\Connector\Core\Definition\Model;
use Jtl\Connector\Core\Exception\ApplicationException;
use Jtl\Connector\Core\Exception\CompressionException;
use Jtl\Connector\Core\Exception\ConfigException;
use Jtl\Connector\Core\Exception\DatabaseException;
use Jtl\Connector\Core\Exception\DefinitionException;
use Jtl\Connector\Core\Exception\FileNotFoundException;
use Jtl\Connector\Core\Exception\FileTooLargeException;
use Jtl\Connector\Core\Exception\LoggerException;
use Jtl\Connector\Core\Exception\RpcException;
use Jtl\Connector\Core\Exception\SessionException;
use Jtl\Connector\Core\Logger\LoggerService;
use Jtl\Connector\Core\Mapper\PrimaryKeyMapperInterface;
use Jtl\Connector\Core\Model\AbstractImage;
use Jtl\Connector\Core\Model\Ack;
use Jtl\Connector\Core\Model\Category;
use Jtl\Connector\Core\Model\Generator\AbstractModelFactory;
use Jtl\Connector\Core\Model\Manufacturer;
use Jtl\Connector\Core\Model\Product;
use Jtl\Connector\Core\Model\ProductImage;
use Jtl\Connector\Core\Model\QueryFilter;
use Jtl\Connector\Core\Model\Statistic;
use Jtl\Connector\Core\Rpc\Error;
use Jtl\Connector\Core\Rpc\RequestPacket;
use Jtl\Connector\Core\Rpc\ResponsePacket;
use Jtl\Connector\Core\Serializer\SerializerBuilder;
use Jtl\Connector\Core\Session\SessionHandlerInterface;
use Jtl\Connector\Core\Session\SqliteSessionHandler;
use Jtl\Connector\Core\Subscriber\FeaturesSubscriber;
use Jtl\Connector\Core\Subscriber\RequestParamsTransformSubscriber;
use Jtl\Connector\Core\Test\Stub\Controller\TransactionalControllerStub;
use Jtl\Connector\Core\Test\TestCase;
use Jtl\Connector\Core\Utilities\Str;
use Monolog\Handler\TestHandler;
use Monolog\Level;
use MyPlugin\Bootstrap;
use Noodlehaus\Exception\EmptyDirectoryException;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\MockObject\CannotUseOnlyMethodsException;
use PHPUnit\Framework\MockObject\MockObject;
use ReflectionException;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\FileBag;
use Symfony\Component\HttpFoundation\Request as HttpRequest;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\RunInSeparateProcess;
use Throwable;
use TypeError;

/**
 * Class ApplicationTest
 *
 * @package Jtl\Connector\Core\Application
 */
class ApplicationTest extends TestCase
{
    /** @var string[] */
    private array    $temporaryArchivePaths = [];
    private ?\Closure $restoreHandlers      = null;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Application::run() registers the core and the Monolog error/exception handlers. Unwind to the
        // handlers on top of the stack now instead of rebuilding the stack, which would reset error masks.
        $errorHandler          = self::currentErrorHandler();
        $exceptionHandler      = self::currentExceptionHandler();
        $this->restoreHandlers = static function () use ($errorHandler, $exceptionHandler): void {
            while (($handler = self::currentErrorHandler()) !== null && $handler !== $errorHandler) {
                \restore_error_handler();
            }
            while (($handler = self::currentExceptionHandler()) !== null && $handler !== $exceptionHandler) {
                \restore_exception_handler();
            }
        };
    }

    /**
     * @return void
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    protected function tearDown(): void
    {
        unset($_GET['jtlauth']);

        if ($this->restoreHandlers !== null) {
            ($this->restoreHandlers)();
        }

        foreach ($this->temporaryArchivePaths as $archivePath) {
            if (\is_file($archivePath)) {
                \unlink($archivePath);
            }
        }

        parent::tearDown();
    }

    /**
     * PHP 8.3 has no get_error_handler(); push a probe and pop it again, which keeps the stack and its error masks.
     *
     * @return callable|null
     */
    private static function currentErrorHandler(): ?callable
    {
        $handler = \set_error_handler(static fn (): bool => false);
        \restore_error_handler();

        return $handler;
    }

    /**
     * @return callable|null
     */
    private static function currentExceptionHandler(): ?callable
    {
        $handler = \set_exception_handler(static fn (): null => null);
        \restore_exception_handler();

        return $handler;
    }

    /**
     * @return void
     * @throws ApplicationException
     * @throws ConfigException
     * @throws DependencyException
     * @throws EmptyDirectoryException
     * @throws \InvalidArgumentException
     * @throws \InvalidArgumentException
     * @throws InvalidDefinition
     * @throws \JMS\Serializer\Exception\InvalidArgumentException
     * @throws LoggerException
     * @throws LogicException
     * @throws \LogicException
     * @throws \Psr\Log\InvalidArgumentException
     * @throws TypeError
     * @throws \UnexpectedValueException
     */
    public function testHandleRequestControllerClassNotFoundException(): void
    {
        $application = $this->createInitializedApplication();
        $connector   = $this->createConnector();
        $request     = Request::create(Controller::PRODUCT, Action::PUSH, [new Product()]);
        $this->expectException(ApplicationException::class);
        $this->invokeMethodFromObject($application, 'handleRequest', $connector, $request);
    }

    /**
     * @param ConfigSchema|null        $configSchema
     * @param string|null              $connectorDir
     * @param CoreConfigInterface|null $config
     *
     * @return Application
     * @throws ApplicationException
     * @throws ConfigException
     * @throws DependencyException
     * @throws EmptyDirectoryException
     * @throws \InvalidArgumentException
     * @throws \InvalidArgumentException
     * @throws InvalidDefinition
     * @throws \JMS\Serializer\Exception\InvalidArgumentException
     * @throws LoggerException
     * @throws LogicException
     * @throws \LogicException
     * @throws \Psr\Log\InvalidArgumentException
     * @throws TypeError
     * @throws \UnexpectedValueException
     */
    protected function createInitializedApplication(
        ?ConfigSchema        $configSchema = null,
        ?string              $connectorDir = null,
        ?CoreConfigInterface $config = null
    ): Application {
        $sessionHandler = $this->createMock(SessionHandlerInterface::class);
        if (\is_null($configSchema)) {
            $configSchema = (new ConfigSchema())->setParameters(
                ...
                ConfigSchema::createDefaultParameters($this->connectorDir)
            );
        }

        if (\is_null($config)) {
            $config = new ArrayConfig($configSchema->getDefaultValues());
        }

        $app = $this->createApplication($configSchema, $connectorDir, $config);
        $app->setSessionHandler($sessionHandler);
        $app->getContainer()->set(
            PrimaryKeyMapperInterface::class,
            $this->createMock(PrimaryKeyMapperInterface::class)
        );
        $app->getContainer()->set(SessionHandlerInterface::class, $sessionHandler);
        $app->getContainer()->set(TokenValidatorInterface::class, $this->createMock(TokenValidatorInterface::class));

        return $app;
    }

    /**
     * @param ConfigSchema|null        $configSchema
     * @param string|null              $connectorDir
     * @param CoreConfigInterface|null $config
     *
     * @return Application
     * @throws ApplicationException
     * @throws ConfigException
     * @throws DependencyException
     * @throws EmptyDirectoryException
     * @throws \InvalidArgumentException
     * @throws InvalidDefinition
     * @throws \JMS\Serializer\Exception\InvalidArgumentException
     * @throws LoggerException
     * @throws LogicException
     * @throws \LogicException
     * @throws \Psr\Log\InvalidArgumentException
     * @throws TypeError
     * @throws \UnexpectedValueException
     */
    protected function createApplication(
        ?ConfigSchema        $configSchema = null,
        ?string              $connectorDir = null,
        ?CoreConfigInterface $config = null
    ): Application {
        if (\is_null($configSchema)) {
            $configSchema = new ConfigSchema();
        }

        if (\is_null($config)) {
            $config = new ArrayConfig([]);
        }

        if (\is_null($connectorDir)) {
            $connectorDir = $this->connectorDir;
        }

        return new Application($connectorDir, $config, $configSchema);
    }

    /**
     * Application whose session start always succeeds, i.e. a request of an authenticated caller.
     *
     * @return Application&MockObject
     * @throws Throwable
     */
    protected function createApplicationWithSession(): Application&MockObject
    {
        $app = $this->getMockBuilder(Application::class)
                    ->setConstructorArgs([$this->connectorDir, new ArrayConfig([]), new ConfigSchema()])
                    ->onlyMethods(['startSession'])
                    ->getMock();
        $app->expects($this->once())->method('startSession');

        return $app;
    }

    /**
     * @param string $controllerNamespace
     * @param bool   $tokenValidatorValidateValue
     *
     * @return ConnectorInterface&MockObject
     * @throws \InvalidArgumentException
     */
    public function createConnector(
        string $controllerNamespace = '',
        bool   $tokenValidatorValidateValue = true
    ): ConnectorInterface&MockObject {
        $tokenValidator = $this->createMock(TokenValidatorInterface::class);
        $tokenValidator->expects($this->any())->method('validate')->willReturn($tokenValidatorValidateValue);
        $pkMapper  = $this->createMock(PrimaryKeyMapperInterface::class);
        $connector = $this->createMock(ConnectorInterface::class);
        $connector->expects($this->any())->method('initialize');
        $connector->expects($this->any())->method('getControllerNamespace')->willReturn($controllerNamespace);
        $connector->expects($this->any())->method('getTokenValidator')->willReturn($tokenValidator);
        $connector->expects($this->any())->method('getPrimaryKeyMapper')->willReturn($pkMapper);

        return $connector;
    }

    /**
     * @param string $action
     * @param mixed  $parameter
     *
     * @return void
     * @throws ApplicationException
     * @throws ConfigException
     * @throws DependencyException
     * @throws EmptyDirectoryException
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws \InvalidArgumentException
     * @throws InvalidDefinition
     * @throws \JMS\Serializer\Exception\InvalidArgumentException
     * @throws LoggerException
     * @throws LogicException
     * @throws \LogicException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \Psr\Log\InvalidArgumentException
     * @throws TypeError
     * @throws \UnexpectedValueException
     */
    #[DataProvider('controllerActionsDataProvider')]
    public function testHandleRequestControllerAction(string $action, mixed $parameter): void
    {
        $mock        = $this->createMock(Product::class);
        $application = $this->createInitializedApplication();
        $connector   = $this->createConnector();
        $controller  = $this->createTransactionalController();
        $application->getContainer()->set(Controller::PRODUCT, $controller);
        $request  = Request::create(Controller::PRODUCT, $action, [$parameter]);
        $response = $this->invokeMethodFromObject($application, 'handleRequest', $connector, $request);
        $this->assertInstanceOf(Response::class, $response);
        $result = $response->getResult();

        switch ($action) {
            case Action::STATISTIC:
                $this->assertInstanceOf(Statistic::class, $result);
                $this->assertSame(150, $result->getAvailable());
                break;
            case Action::DELETE:
            case Action::PUSH:
                $this->assertIsArray($result);
                $this->assertArrayHasKey(0, $result);
                $this->assertInstanceOf(Product::class, $result[0]);
                break;
            case Action::PULL:
                $this->assertIsArray($result);
                $this->assertArrayHasKey(0, $result);
                $this->assertArrayHasKey(1, $result);
                $this->assertInstanceOf(Product::class, $result[0]);
                $this->assertInstanceOf(Product::class, $result[1]);
                break;
        }
    }

    /**
     * @param bool $commitThrowsException
     *
     * @return TransactionalControllerStub
     */
    public function createTransactionalController(bool $commitThrowsException = false): TransactionalControllerStub
    {
        return new TransactionalControllerStub($commitThrowsException);
    }

    /**
     * @return array<int, array{0: string, 1: QueryFilter|Product}>
     */
    public static function controllerActionsDataProvider(): array
    {
        $product = new Product();
        $product->setCreationDate(new \DateTimeImmutable());

        return [
            [
                Action::STATISTIC,
                new QueryFilter(),
            ],
            [
                Action::DELETE,
                $product,
            ],
            [
                Action::PULL,
                new QueryFilter(),
            ],
            [
                Action::PUSH,
                $product,
            ],
        ];
    }

    /**
     * @return void
     * @throws ApplicationException
     * @throws ConfigException
     * @throws DependencyException
     * @throws EmptyDirectoryException
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws \InvalidArgumentException
     * @throws InvalidDefinition
     * @throws \JMS\Serializer\Exception\InvalidArgumentException
     * @throws LoggerException
     * @throws LogicException
     * @throws \LogicException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \Psr\Log\InvalidArgumentException
     * @throws TypeError
     * @throws \UnexpectedValueException
     */
    public function testHandleRequestTransactionalMethodsCalls(): void
    {
        $application = $this->createInitializedApplication();
        $connector   = $this->createConnector();
        $controller  = $this->createMock(TransactionalControllerStub::class);
        $application->getContainer()->set(Controller::CATEGORY, $controller);
        $category = new Category();

        $controller->expects($this->once())->method('delete')->with($category)->willReturn([$category]);
        $controller->expects($this->once())->method('beginTransaction');
        $controller->expects($this->once())->method('commit');
        $controller->expects($this->never())->method('rollback');

        $request = Request::create(Controller::CATEGORY, Action::DELETE, [$category]);
        /** @var Response $response */
        $response = $this->invokeMethodFromObject($application, 'handleRequest', $connector, $request);
        $result   = $response->getResult();
        $this->assertIsArray($result);
        $this->assertCount(1, $result);
    }

    /**
     * @return void
     * @throws ApplicationException
     * @throws ConfigException
     * @throws DependencyException
     * @throws EmptyDirectoryException
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws \InvalidArgumentException
     * @throws InvalidDefinition
     * @throws \JMS\Serializer\Exception\InvalidArgumentException
     * @throws LoggerException
     * @throws LogicException
     * @throws \LogicException
     * @throws \Psr\Log\InvalidArgumentException
     * @throws TypeError
     * @throws \UnexpectedValueException
     */
    public function testHandleRequestTransactionalControllerFail(): void
    {
        $this->expectException(\RuntimeException::class);
        $category    = new Category();
        $application = $this->createInitializedApplication();
        $connector   = $this->createConnector();

        $controller = $this->createMock(TransactionalControllerStub::class);
        $controller->expects($this->once())->method('delete')
                   ->with($category)->willThrowException(new \RuntimeException());
        $controller->expects($this->once())->method('beginTransaction');
        $controller->expects($this->never())->method('commit');
        $controller->expects($this->once())->method('rollback');
        $application->getContainer()->set(Controller::CATEGORY, $controller);

        $request = Request::create(Controller::CATEGORY, Action::DELETE, [$category]);
        $this->invokeMethodFromObject($application, 'handleRequest', $connector, $request);
    }

    /**
     * @return void
     * @throws ApplicationException
     * @throws ConfigException
     * @throws DependencyException
     * @throws EmptyDirectoryException
     * @throws \InvalidArgumentException
     * @throws \InvalidArgumentException
     * @throws InvalidDefinition
     * @throws \JMS\Serializer\Exception\InvalidArgumentException
     * @throws LoggerException
     * @throws LogicException
     * @throws \LogicException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \Psr\Log\InvalidArgumentException
     * @throws TypeError
     * @throws \UnexpectedValueException
     */
    public function testHandleRequestControllerClassNeedToBeInitialized(): void
    {
        $application = $this->createInitializedApplication();
        $connector   = $this->createConnector();
        $ack         = new Ack();
        $request     = Request::create(Controller::CONNECTOR, Action::ACK, [$ack]);
        /** @var Response $response */
        $response = $this->invokeMethodFromObject($application, 'handleRequest', $connector, $request);

        $this->assertNotEmpty($response->getResult());
    }

    /**
     * @return void
     * @throws ApplicationException
     * @throws ConfigException
     * @throws DatabaseException
     * @throws DependencyException
     * @throws EmptyDirectoryException
     * @throws \InvalidArgumentException
     * @throws \InvalidArgumentException
     * @throws InvalidDefinition
     * @throws \JMS\Serializer\Exception\InvalidArgumentException
     * @throws LoggerException
     * @throws LogicException
     * @throws \LogicException
     * @throws NotFoundException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \Psr\Log\InvalidArgumentException
     * @throws SessionException
     * @throws TypeError
     * @throws \UnexpectedValueException
     */
    public function testPrepareContainer(): void
    {
        $config      = $this->createConfig(['foo' => 'you', 'bar' => 'jau']);
        $connector   = $this->createConnector(ConnectorInterface::class);
        $application = $this->createApplication(null, null, $config);
        $container   = $application->getContainer();

        $this->assertFalse($container->has(CoreConfigInterface::class));
        $this->assertFalse($container->has(TokenValidatorInterface::class));
        $this->assertFalse($container->has(PrimaryKeyMapperInterface::class));
        $this->assertFalse($container->has(SessionHandlerInterface::class));
        $this->invokeMethodFromObject($application, 'prepareContainer', $connector);
        $this->assertEquals($container->get(CoreConfigInterface::class), $config);
        $this->assertEquals($container->get(TokenValidatorInterface::class), $connector->getTokenValidator());
        $this->assertEquals($container->get(PrimaryKeyMapperInterface::class), $connector->getPrimaryKeyMapper());
        $this->assertEquals($container->get(SessionHandlerInterface::class), $application->getSessionHandler());
    }

    /**
     * @return void
     * @throws ConfigException
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testPrepareConfigSetDefaultParameters(): void
    {
        $defaultParameters = ConfigSchema::createDefaultParameters($this->connectorDir);
        $schema            = new ConfigSchema();
        $application       = $this->getMockBuilder(Application::class)->disableOriginalConstructor()->getMock();
        foreach ($defaultParameters as $parameter) {
            $this->assertFalse($schema->hasParameter($parameter->getKey()));
        }
        $this->invokeMethodFromObject(
            $application,
            'prepareConfig',
            $this->connectorDir,
            $this->createConfig(),
            $schema
        );
        foreach ($defaultParameters as $parameter) {
            $this->assertEquals($parameter, $schema->getParameter($parameter->getKey()));
        }
    }

    /**
     * @return void
     * @throws ConfigException
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testPrepareConfigurationSetDefaultValuesInConfig(): void
    {
        $schema = (new ConfigSchema())
            ->setParameter(ConfigParameter::create('foo', ConfigParameter::TYPE_INTEGER, true, false, 42))
            ->setParameter(ConfigParameter::create('bar', ConfigParameter::TYPE_BOOLEAN, false))
            ->setParameter(ConfigParameter::create('baz', ConfigParameter::TYPE_STRING, true, true, 'yes'));

        $config = $this->createConfig();

        $this->assertFalse($config->has('foo'));
        $this->assertFalse($config->has('bar'));
        $this->assertFalse($config->has('baz'));

        $application = $this->getMockBuilder(Application::class)->disableOriginalConstructor()->getMock();
        $this->invokeMethodFromObject($application, 'prepareConfig', '', $config, $schema);

        $this->assertEquals(42, $config->get('foo'));
        $this->assertFalse($config->has('bar'));
        $this->assertEquals('yes', $config->get('baz'));
    }

    /**
     * @return void
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testLoadPlugins(): void
    {
        $config          = $this->createMock(CoreConfigInterface::class);
        $container       = $this->createMock(Container::class);
        $eventDispatcher = $this->createMock(EventDispatcher::class);
        $app             = $this->getMockBuilder(Application::class)->disableOriginalConstructor()->getMock();
        $myPluginDirSrc  = \sprintf('%s/fixtures/MyPlugin', $this->connectorDir);
        $myPluginDirDst  = \sprintf('%s/plugins/MyPlugin', $this->connectorDir);
        \mkdir($myPluginDirDst, 0777, true);
        $data = \file_get_contents(\sprintf('%s/Bootstrap.php', $myPluginDirSrc));
        \file_put_contents(\sprintf('%s/Bootstrap.php', $myPluginDirDst), $data);
        $this->assertFalse(\class_exists(Bootstrap::class));
        $this->invokeMethodFromObject($app, 'loadPlugins', $config, $container, $eventDispatcher, $myPluginDirDst);
        $this->assertTrue(\class_exists(Bootstrap::class));
    }

    /**
     * @return void
     * @throws ApplicationException
     * @throws CannotUseOnlyMethodsException
     * @throws CaseConverterException
     * @throws CompressionException
     * @throws ConfigException
     * @throws DefinitionException
     * @throws DependencyException
     * @throws Exception
     * @throws FileNotFoundException
     * @throws \InvalidArgumentException
     * @throws \JMS\Serializer\Exception\InvalidArgumentException
     * @throws JsonException
     * @throws NotFoundException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws RpcException
     * @throws SessionException
     * @throws Throwable
     */
    public function testRun(): void
    {
        $serializer = SerializerBuilder::create()->build();
        $factory    = AbstractModelFactory::createFactory(Model::MANUFACTURER);
        $id         = $factory->getFaker()->uuid;
        /** @var Manufacturer $manufacturer */
        $manufacturer      = $factory->makeOne();
        $manufacturerArray = $serializer->toArray($manufacturer);
        $requestPacket     = (new RequestPacket())->setJtlrpc('2.0')
                                                  ->setMethod('manufacturer.push')
                                                  ->setParams([$manufacturerArray])
                                                  ->setId($id)
                                                  ->toArray();
        $responsePacket    = (new ResponsePacket())->setJtlrpc('2.0')->setId($id)->setResult([$manufacturer]);
        $_POST['jtlrpc']   = \json_encode($requestPacket, \JSON_THROW_ON_ERROR);

        $connector    = $this->createConnector('Jtl\Connector\Core\Test\Stub\Controller');
        $config       = $this->createConfig();
        $configSchema = $this->getMockBuilder(ConfigSchema::class)->onlyMethods(['validateConfig'])->getMock();
        $controller   = $this->createMock(TransactionalControllerStub::class);

        /** @var Application&MockObject $app */
        $app = $this->getMockBuilder(Application::class)
                    ->setConstructorArgs([$this->connectorDir, $config, $configSchema])
                    ->onlyMethods(['startSession', 'loadPlugins', 'prepareContainer'])
                    ->getMock();

        $app->setSessionHandler($this->createMock(SessionHandlerInterface::class));
        $app->getContainer()->set(SessionHandlerInterface::class, $this->createMock(SessionHandlerInterface::class));
        $app->getContainer()->set(TokenValidatorInterface::class, $this->createMock(TokenValidatorInterface::class));
        $app->getContainer()->set(
            PrimaryKeyMapperInterface::class,
            $this->createMock(PrimaryKeyMapperInterface::class)
        );
        $app->getContainer()->set(Controller::MANUFACTURER, $controller);

        $app->expects($this->once())->method('startSession');
        $app->expects($this->once())->method('loadPlugins');
        $app->expects($this->once())->method('prepareContainer');

        $connector
            ->expects($this->once())
            ->method('initialize')
            ->with($config, $app->getContainer(), $app->getEventDispatcher());

        $configSchema->expects($this->once())->method('validateConfig')->with($config);
        $controller->expects($this->once())->method('push')->willReturn([$manufacturer]);
        $this->expectOutputString(\json_encode($responsePacket->toArray($serializer), \JSON_THROW_ON_ERROR));

        $app->run($connector);

        $eventDispatcher   = $app->getEventDispatcher();
        $rpcEventListeners = $eventDispatcher->getListeners('rpc.before');
        $this->assertGreaterThan(0, \count($rpcEventListeners));

        $requestParamsTransformSubscriberFound = false;
        foreach ($rpcEventListeners as $listener) {
            $this->assertIsArray($listener);
            $this->assertArrayHasKey(0, $listener);
            if ($listener[0] instanceof RequestParamsTransformSubscriber) {
                $requestParamsTransformSubscriberFound = true;
                break;
            }
        }

        $coreFeaturesListeners =
            $eventDispatcher->getListeners(Event::createCoreEventName('Connector', 'features', 'after'));
        $this->assertGreaterThan(0, $coreFeaturesListeners);

        $coreFeaturesListenerFound = false;
        foreach ($coreFeaturesListeners as $listener) {
            $this->assertIsArray($listener);
            $this->assertArrayHasKey(0, $listener);
            if ($listener[0] instanceof FeaturesSubscriber) {
                $coreFeaturesListenerFound = true;
                break;
            }
        }

        $this->assertTrue($requestParamsTransformSubscriberFound, 'No RequestParamsTransformSubscriber is registered');
        $this->assertTrue($coreFeaturesListenerFound, 'No CoreFeaturesSubscriber is registered');
    }

    /**
     * @return void
     * @throws ApplicationException
     * @throws CompressionException
     * @throws ConfigException
     * @throws DefinitionException
     * @throws DependencyException
     * @throws FileNotFoundException
     * @throws \InvalidArgumentException
     * @throws \JMS\Serializer\Exception\InvalidArgumentException
     * @throws JsonException
     * @throws LoggerException
     * @throws NotFoundException
     * @throws \Psr\Log\InvalidArgumentException
     * @throws RpcException
     * @throws SessionException
     * @throws Throwable
     * @throws TypeError
     */
    public function testRunInvalidRpcMethod(): void
    {
        $this->expectException(RpcException::class);
        $this->expectExceptionCode(ErrorCode::INVALID_REQUEST);
        $serializer      = SerializerBuilder::create()->build();
        $factory         = AbstractModelFactory::createFactory(Model::MANUFACTURER);
        $id              = $factory->getFaker()->uuid;
        $requestPacket   = (new RequestPacket())->setJtlrpc('2.0')
                                                ->setMethod('yoo')
                                                ->setParams([])
                                                ->setId($id)
                                                ->toArray();
        $_POST['jtlrpc'] = \json_encode($requestPacket, \JSON_THROW_ON_ERROR);
        $ex              = RpcException::invalidRequest();
        $error           = (new Error())->setCode(ErrorCode::INVALID_REQUEST)
                                        ->setMessage('Invalid request')
                                        ->setData(Error::createDataFromException($ex));
        $responsePacket  = (new ResponsePacket())->setJtlrpc('2.0')->setId($id)->setError($error);
        $this->expectOutputString(\json_encode($responsePacket->toArray($serializer), \JSON_THROW_ON_ERROR));
        $this->createApplication()->run($this->createConnector());
    }

    /**
     * @return void
     * @throws ApplicationException
     * @throws CompressionException
     * @throws ConfigException
     * @throws DefinitionException
     * @throws DependencyException
     * @throws FileNotFoundException
     * @throws \InvalidArgumentException
     * @throws \JMS\Serializer\Exception\InvalidArgumentException
     * @throws JsonException
     * @throws LoggerException
     * @throws NotFoundException
     * @throws \Psr\Log\InvalidArgumentException
     * @throws RpcException
     * @throws SessionException
     * @throws Throwable
     * @throws TypeError
     */
    public function testRunUnknownController(): void
    {
        $this->expectException(DefinitionException::class);
        $this->expectExceptionCode(ErrorCode::UNKNOWN_CONTROLLER);
        $serializer      = SerializerBuilder::create()->build();
        $factory         = AbstractModelFactory::createFactory(Model::MANUFACTURER);
        $id              = $factory->getFaker()->uuid;
        $requestPacket   = (new RequestPacket())->setJtlrpc('2.0')
                                                ->setMethod('foo.bar')
                                                ->setParams([])
                                                ->setId($id)
                                                ->toArray();
        $_POST['jtlrpc'] = \json_encode($requestPacket, \JSON_THROW_ON_ERROR);
        $ex              = DefinitionException::unknownController('foo');
        $error           = (new Error())
            ->setCode(ErrorCode::UNKNOWN_CONTROLLER)
            ->setMessage('Unknown controller (Foo)')
            ->setData(Error::createDataFromException($ex));

        $responsePacket = (new ResponsePacket())
            ->setJtlrpc('2.0')
            ->setId($id)
            ->setError($error);

        $this->expectOutputString(\json_encode($responsePacket->toArray($serializer), \JSON_THROW_ON_ERROR));

        $this->createApplicationWithSession()
             ->run($this->createConnector());
    }

    /**
     * @return void
     * @throws ApplicationException
     * @throws CompressionException
     * @throws ConfigException
     * @throws DefinitionException
     * @throws DependencyException
     * @throws FileNotFoundException
     * @throws \InvalidArgumentException
     * @throws \JMS\Serializer\Exception\InvalidArgumentException
     * @throws JsonException
     * @throws LoggerException
     * @throws NotFoundException
     * @throws \Psr\Log\InvalidArgumentException
     * @throws RpcException
     * @throws SessionException
     * @throws Throwable
     * @throws TypeError
     */
    public function testRunUnknownAction(): void
    {
        $this->expectException(DefinitionException::class);
        $this->expectExceptionCode(ErrorCode::UNKNOWN_ACTION);
        $serializer      = SerializerBuilder::create()->build();
        $factory         = AbstractModelFactory::createFactory(Model::MANUFACTURER);
        $id              = $factory->getFaker()->uuid;
        $requestPacket   = (new RequestPacket())->setJtlrpc('2.0')
                                                ->setMethod('category.bar')
                                                ->setParams([])
                                                ->setId($id)
                                                ->toArray();
        $_POST['jtlrpc'] = \json_encode($requestPacket, \JSON_THROW_ON_ERROR);
        $ex              = DefinitionException::unknownAction('bar');
        $error           = (new Error())->setCode(ErrorCode::UNKNOWN_ACTION)
                                        ->setMessage('Unknown action (bar)')
                                        ->setData(Error::createDataFromException($ex));
        $responsePacket  = (new ResponsePacket())->setJtlrpc('2.0')->setId($id)->setError($error);
        $this->expectOutputString(\json_encode($responsePacket->toArray($serializer), \JSON_THROW_ON_ERROR));

        $this->createApplicationWithSession()
             ->run($this->createConnector());
    }

    /**
     * @return array<string, array{0: string, 1: string|null}>
     */
    public static function unauthenticatedRequestDataProvider(): array
    {
        return [
            'unknown action without jtlauth'        => ['connector.identification', null],
            'unknown action with empty jtlauth'     => ['connector.identification', ''],
            'unknown controller with empty jtlauth' => ['foo.bar', ''],
            'known method without jtlauth'          => ['manufacturer.pull', null],
            'known method with empty jtlauth'       => ['connector.identify', ''],
        ];
    }

    /**
     * @param string      $method
     * @param string|null $jtlauth
     *
     * @return void
     * @throws Throwable
     */
    #[DataProvider('unauthenticatedRequestDataProvider')]
    public function testRunRejectsUnauthenticatedRequestBeforeResolvingMethod(string $method, ?string $jtlauth): void
    {
        $this->expectException(SessionException::class);
        $this->expectExceptionCode(ErrorCode::NO_SESSION);
        $this->expectOutputRegex(\sprintf('/"error":\{"code":%d,"message":"No session"/', ErrorCode::NO_SESSION));

        $requestPacket   = (new RequestPacket())->setJtlrpc('2.0')
                                                ->setMethod($method)
                                                ->setParams([])
                                                ->setId('1')
                                                ->toArray();
        $_POST['jtlrpc'] = \json_encode($requestPacket, \JSON_THROW_ON_ERROR);
        if ($jtlauth !== null) {
            $_GET['jtlauth'] = $jtlauth;
        }

        $this->createApplication()
             ->run($this->createConnector());
    }

    /**
     * End-to-end through run(): a session that exists but is not authenticated (e.g. left by a failed auth) is
     * rejected for a non-auth method and is discarded, so it cannot be replayed (CO-3709). Covers the enforcement
     * and the closeSession() wiring in run()'s finally, not just the methods in isolation.
     *
     * @return void
     * @throws Throwable
     */
    #[RunInSeparateProcess]
    public function testRunRejectsAndDiscardsUnauthenticatedSessionReplay(): void
    {
        (new SqliteSessionHandler($this->connectorDir . '/var'))->write('leftover-id', '');
        $_GET['jtlauth'] = 'leftover-id';
        $_POST['jtlrpc'] = '{"jtlrpc":"2.0","id":"co3709","method":"manufacturer.pull","params":{}}';

        \ob_start();
        try {
            $this->createApplication()->run($this->createConnector());
        } catch (Throwable) {
            // run() rethrows; the response has already been written to the output buffer
        }
        $output = (string)\ob_get_clean();

        $this->assertStringContainsString('"code":' . ErrorCode::INVALID_SESSION, $output);
        $this->assertFalse(
            (new SqliteSessionHandler($this->connectorDir . '/var'))->validateId('leftover-id'),
            'the unauthenticated session must not survive the request'
        );
    }

    /**
     * End-to-end through run(): a replay of an authenticated session id is accepted for a non-auth method and the
     * session is kept (CO-3709). Only loadPlugins/prepareContainer are stubbed; startSession and closeSession run.
     *
     * @return void
     * @throws Throwable
     */
    #[RunInSeparateProcess]
    public function testRunAcceptsAndPersistsAuthenticatedSessionReplay(): void
    {
        \session_set_save_handler(new SqliteSessionHandler($this->connectorDir . '/var'), true);
        \ini_set('session.use_cookies', '0');
        \ini_set('session.cache_limiter', '');
        \session_id('good-id');
        \session_start();
        $_SESSION[Application::SESSION_AUTHENTICATED] = true;
        \session_write_close();

        $_GET['jtlauth'] = 'good-id';
        $_POST['jtlrpc'] = '{"jtlrpc":"2.0","id":"co3709","method":"manufacturer.pull","params":{}}';

        $configSchema = $this->getMockBuilder(ConfigSchema::class)->onlyMethods(['validateConfig'])->getMock();
        $app          = $this->getMockBuilder(Application::class)
                             ->setConstructorArgs([$this->connectorDir, new ArrayConfig([]), $configSchema])
                             ->onlyMethods(['loadPlugins', 'prepareContainer'])
                             ->getMock();

        \ob_start();
        try {
            $app->run($this->createConnector());
        } catch (Throwable) {
            // the pull fails (no manufacturer controller is wired), but startSession already accepted the session
        }
        $output = (string)\ob_get_clean();

        $this->assertStringNotContainsString('"code":' . ErrorCode::INVALID_SESSION, $output);
        $this->assertTrue(
            (new SqliteSessionHandler($this->connectorDir . '/var'))->validateId('good-id'),
            'the authenticated session must be kept'
        );
    }

    /**
     * run() must never log the submitted auth token, regardless of the JSON formatting of the request (CO-3709). The
     * old regex-based redaction missed e.g. a space before the colon.
     *
     * @return void
     * @throws Throwable
     */
    public function testRunDoesNotLogTheAuthToken(): void
    {
        $token = 'CO3709-canary-token';
        // hand-crafted raw packet: the whitespace around the colon defeated the previous "token":\s?"..." regex
        $_POST['jtlrpc'] = \sprintf(
            '{"jtlrpc":"2.0","id":"co3709","method":"core.connector.auth","params":{"token" : "%s"}}',
            $token
        );

        $configSchema = $this->getMockBuilder(ConfigSchema::class)->onlyMethods(['validateConfig'])->getMock();
        $app          = $this->getMockBuilder(Application::class)
                             ->setConstructorArgs([$this->connectorDir, new ArrayConfig([]), $configSchema])
                             ->onlyMethods(['startSession', 'loadPlugins', 'prepareContainer'])
                             ->getMock();

        $rpcLog = new TestHandler(Level::Debug);
        $app->getLoggerService()->get(LoggerService::CHANNEL_RPC)->pushHandler($rpcLog);

        // The token is logged (if at all) before the controller runs, so the request is not fully wired; swallow the
        // resulting output and exception, the assertion is only about what reached the RPC log.
        \ob_start();
        try {
            $app->run($this->createConnector());
        } catch (Throwable) {
            // intentionally ignored
        }
        \ob_end_clean();

        $this->assertNotEmpty($rpcLog->getRecords(), 'the auth request should have been logged at debug level');
        foreach ($rpcLog->getRecords() as $record) {
            $this->assertStringNotContainsString($token, $record->message);
            $this->assertStringNotContainsString($token, (string)\json_encode($record->context));
        }
    }

    /**
     * @return void
     * @throws ApplicationException
     * @throws CaseConverterException
     * @throws ConfigException
     * @throws DefinitionException
     * @throws DependencyException
     * @throws EmptyDirectoryException
     * @throws FileException
     * @throws \InvalidArgumentException
     * @throws \InvalidArgumentException
     * @throws InvalidDefinition
     * @throws \JMS\Serializer\Exception\InvalidArgumentException
     * @throws LoggerException
     * @throws LogicException
     * @throws \LogicException
     * @throws NotAcceptableException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \Psr\Log\InvalidArgumentException
     * @throws \Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException
     * @throws TypeError
     * @throws \UnexpectedValueException
     * @throws UnsupportedFormatException
     */
    public function testHandleImagePushWithFilesSentByWawi(): void
    {
        $serializer = SerializerBuilder::create()->build();
        $data       = \file_get_contents(\sprintf('%s/fixtures/images_push.json', \TEST_DIR));
        $this->assertNotFalse($data);
        $type = \sprintf('array<%s>', AbstractImage::class);
        /** @var ProductImage[] $images */
        $images           = $serializer->deserialize($data, $type, 'json');
        $uploadedFilePath = \sprintf('%s/fixtures/images_push.zip', \TEST_DIR);
        $file             = new UploadedFile(
            $uploadedFilePath,
            'images.zip',
            'application/octet-stream',
            \UPLOAD_ERR_OK,
            true
        );
        $filebag          = new FileBag(['file' => $file]);

        $request        = new HttpRequest();
        $request->files = $filebag;

        $app = $this->createApplication()
                    ->setHttpRequest($request);

        $this->invokeMethodFromObject($app, 'handleImagePush', ...$images);

        foreach ($images as $image) {
            $this->assertFileExists($image->getFilename());
            $expectedFilename =
                \sprintf('%d_%s.jpg', $image->getId()->getHost(), Str::toPascalCase($image->getRelationType()));
            $this->assertEquals(
                $expectedFilename,
                \substr($image->getFilename(), \strrpos($image->getFilename(), '/') + 1)
            );
        }
    }

    /**
     * @return void
     * @throws ApplicationException
     * @throws ConfigException
     * @throws DependencyException
     * @throws EmptyDirectoryException
     * @throws \InvalidArgumentException
     * @throws InvalidDefinition
     * @throws \JMS\Serializer\Exception\InvalidArgumentException
     * @throws LoggerException
     * @throws LogicException
     * @throws \LogicException
     * @throws NotAcceptableException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \Psr\Log\InvalidArgumentException
     * @throws TypeError
     * @throws \UnexpectedValueException
     * @throws UnsupportedFormatException
     */
    public function testHandleImagePushUploadedFileNotFound(): void
    {
        $this->expectException(ApplicationException::class);
        $this->expectExceptionCode(ErrorCode::REQUEST_ERROR);
        $serializer = SerializerBuilder::create()->build();
        $data       = \file_get_contents(\sprintf('%s/fixtures/images_push.json', \TEST_DIR));
        $this->assertNotFalse($data);
        $type = \sprintf('array<%s>', AbstractImage::class);
        /** @var ProductImage[] $images */
        $images = $serializer->deserialize($data, $type, 'json');
        $app    = $this->createApplication();
        $this->invokeMethodFromObject($app, 'handleImagePush', ...$images);
    }

    /**
     * @return void
     * @throws ApplicationException
     * @throws ConfigException
     * @throws DependencyException
     * @throws EmptyDirectoryException
     * @throws FileException
     * @throws \InvalidArgumentException
     * @throws \InvalidArgumentException
     * @throws InvalidDefinition
     * @throws \JMS\Serializer\Exception\InvalidArgumentException
     * @throws LoggerException
     * @throws LogicException
     * @throws \LogicException
     * @throws NotAcceptableException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \Psr\Log\InvalidArgumentException
     * @throws \Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException
     * @throws TypeError
     * @throws \UnexpectedValueException
     * @throws UnsupportedFormatException
     */
    public function testHandleImagePushFileExtractionFailed(): void
    {
        $this->expectException(ApplicationException::class);
        $this->expectExceptionCode(ErrorCode::SERVER_ERROR);
        $serializer = SerializerBuilder::create()->build();
        $data       = \file_get_contents(\sprintf('%s/fixtures/images_push.json', \TEST_DIR));
        $this->assertNotFalse($data);
        $type = \sprintf('array<%s>', AbstractImage::class);
        /** @var ProductImage[] $images */
        $images           = $serializer->deserialize($data, $type, 'json');
        $uploadedFilePath = \sprintf('%s/fixtures/images_push.json', \TEST_DIR);
        $file             = new UploadedFile(
            $uploadedFilePath,
            'images.zip',
            'application/octet-stream',
            \UPLOAD_ERR_OK,
            true
        );
        $filebag          = new FileBag(['file' => $file]);
        $request          = new HttpRequest();
        $request->files   = $filebag;
        $app              = $this->createApplication()->setHttpRequest($request);
        $this->invokeMethodFromObject($app, 'handleImagePush', ...$images);
    }

    /**
     * @param string $name
     * @param string $filename
     * @param string $expectedImageLabel
     *
     * @return void
     * @throws ApplicationException
     * @throws ConfigException
     * @throws DependencyException
     * @throws EmptyDirectoryException
     * @throws FileException
     * @throws \InvalidArgumentException
     * @throws InvalidDefinition
     * @throws \JMS\Serializer\Exception\InvalidArgumentException
     * @throws LoggerException
     * @throws LogicException
     * @throws \LogicException
     * @throws NotAcceptableException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \Psr\Log\InvalidArgumentException
     * @throws TypeError
     * @throws \UnexpectedValueException
     * @throws UnsupportedFormatException
     */
    #[DataProvider('tooLargeImageLabelDataProvider')]
    public function testHandleImagePushNamesTheWawiImageWhenAnImageIsTooLarge(
        string $name,
        string $filename,
        string $expectedImageLabel
    ): void {
        $images = $this->deserializeImagesPushFixture();
        // First fixture image: image ID 284, product (foreign key) ID 1
        $images[0]->setName($name)->setFilename($filename);

        $archivePath = $this->createArchiveWithOversizedEntry('284_Product.jpg');
        $app         = $this->createApplication()->setHttpRequest($this->createImagePushRequest($archivePath));

        $this->expectException(ApplicationException::class);
        $this->expectExceptionCode(ApplicationException::IMAGE_TOO_LARGE);
        $this->expectExceptionMessage(
            \sprintf(
                'Image "%s" of Product (JTL-Wawi ID = 1, image ID = 284) is too large (25 MB, max. 20 MB)',
                $expectedImageLabel
            )
        );

        $this->invokeMethodFromObject($app, 'handleImagePush', ...$images);
    }

    /**
     * @return array<string, array{string, string, string}>
     */
    public static function tooLargeImageLabelDataProvider(): array
    {
        return [
            'image name sent by Wawi'          => ['Sommerkleid rot', 'sommerkleid-rot.jpg', 'Sommerkleid rot'],
            'falls back to the Wawi file name' => ['', 'sommerkleid-rot.jpg', 'sommerkleid-rot.jpg'],
            'falls back to the archive entry'  => ['', '', '284_Product.jpg'],
        ];
    }

    /**
     * @return void
     * @throws ApplicationException
     * @throws ConfigException
     * @throws DependencyException
     * @throws EmptyDirectoryException
     * @throws FileException
     * @throws \InvalidArgumentException
     * @throws InvalidDefinition
     * @throws \JMS\Serializer\Exception\InvalidArgumentException
     * @throws LoggerException
     * @throws LogicException
     * @throws \LogicException
     * @throws NotAcceptableException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \Psr\Log\InvalidArgumentException
     * @throws TypeError
     * @throws \UnexpectedValueException
     * @throws UnsupportedFormatException
     */
    public function testHandleImagePushRethrowsTooLargeEntryWithoutMatchingImage(): void
    {
        $images      = $this->deserializeImagesPushFixture();
        $archivePath = $this->createArchiveWithOversizedEntry('999_Product.jpg');
        $app         = $this->createApplication()->setHttpRequest($this->createImagePushRequest($archivePath));

        $this->expectException(FileTooLargeException::class);
        $this->expectExceptionMessage('File "999_Product.jpg" is too large (25 MB, max. 20 MB)');

        $this->invokeMethodFromObject($app, 'handleImagePush', ...$images);
    }

    /**
     * @return ProductImage[]
     * @throws \JMS\Serializer\Exception\InvalidArgumentException
     * @throws LogicException
     * @throws NotAcceptableException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws UnsupportedFormatException
     */
    private function deserializeImagesPushFixture(): array
    {
        $data = \file_get_contents(\sprintf('%s/fixtures/images_push.json', \TEST_DIR));
        $this->assertNotFalse($data);
        /** @var ProductImage[] $images */
        $images = SerializerBuilder::create()->build()
                                   ->deserialize($data, \sprintf('array<%s>', AbstractImage::class), 'json');

        return $images;
    }

    /**
     * @param string $archivePath
     *
     * @return HttpRequest
     * @throws FileException
     */
    private function createImagePushRequest(string $archivePath): HttpRequest
    {
        $request        = new HttpRequest();
        $request->files = new FileBag([
            'file' => new UploadedFile($archivePath, 'images.zip', 'application/octet-stream', \UPLOAD_ERR_OK, true),
        ]);

        return $request;
    }

    /**
     * @param string $entryName
     *
     * @return string
     */
    private function createArchiveWithOversizedEntry(string $entryName): string
    {
        $archivePath = \sprintf('%s/%s.zip', \sys_get_temp_dir(), \uniqid('too-large-', true));

        $archive = new \ZipArchive();
        $archive->open($archivePath, \ZipArchive::CREATE);
        $archive->addFromString($entryName, \str_repeat('a', 25_000_000));
        $archive->close();

        $this->temporaryArchivePaths[] = $archivePath;

        return $archivePath;
    }
}

<?php

namespace Jtl\Connector\Core\Test\Application;

use DI\DependencyException;
use DI\NotFoundException;
use Jtl\Connector\Core\Application\Application;
use Jtl\Connector\Core\Application\Request;
use Jtl\Connector\Core\Authentication\TokenValidatorInterface;
use Jtl\Connector\Core\Config\ArrayConfig;
use Jtl\Connector\Core\Config\ConfigParameter;
use Jtl\Connector\Core\Config\ConfigSchema;
use Jtl\Connector\Core\Connector\ConnectorInterface;
use Jtl\Connector\Core\Definition\Action;
use Jtl\Connector\Core\Definition\Controller;
use Jtl\Connector\Core\Definition\ErrorCode;
use Jtl\Connector\Core\Definition\Event;
use Jtl\Connector\Core\Definition\Model;
use Jtl\Connector\Core\Exception\ApplicationException;
use Jtl\Connector\Core\Exception\ConfigException;
use Jtl\Connector\Core\Exception\DefinitionException;
use Jtl\Connector\Core\Exception\RpcException;
use Jtl\Connector\Core\Mapper\PrimaryKeyMapperInterface;
use Jtl\Connector\Core\Model\AbstractImage;
use Jtl\Connector\Core\Model\Ack;
use Jtl\Connector\Core\Model\Category;
use Jtl\Connector\Core\Model\Generator\AbstractModelFactory;
use Jtl\Connector\Core\Model\Manufacturer;
use Jtl\Connector\Core\Model\Product;
use Jtl\Connector\Core\Model\ProductImage;
use Jtl\Connector\Core\Model\QueryFilter;
use Jtl\Connector\Core\Rpc\Error;
use Jtl\Connector\Core\Rpc\RequestPacket;
use Jtl\Connector\Core\Rpc\ResponsePacket;
use Jtl\Connector\Core\Serializer\SerializerBuilder;
use Jtl\Connector\Core\Session\SessionHandlerInterface;
use Jtl\Connector\Core\Subscriber\FeaturesSubscriber;
use Jtl\Connector\Core\Subscriber\RequestParamsTransformSubscriber;
use Jtl\Connector\Core\Test\TestCase;
use Jtl\Connector\Core\Test\Stub\Controller\TransactionalControllerStub;
use Jtl\Connector\Core\Utilities\Str;
use MyPlugin\Bootstrap;
use Noodlehaus\ConfigInterface;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\FileBag;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

/**
 * Class ApplicationTest
 * @package Jtl\Connector\Core\Application
 */
class ApplicationTest extends TestCase
{
    /**
     * @throws ApplicationException
     * @throws ConfigException
     * @throws \ReflectionException
     */
    public function testHandleRequestControllerClassNotFoundException()
    {
        $connector = $this->createConnector('FooBar');
        $application = $this->createInitializedApplication(null, $connector);
        $request = Request::create(Controller::PRODUCT, Action::PUSH, [new Product()]);
        $this->expectException(ApplicationException::class);
        $this->invokeMethodFromObject($application, 'handleRequest', $request);
    }

    /**
     * @dataProvider controllerActionsDataProvider
     *
     * @param $action
     * @param $parameter
     * @throws ApplicationException
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function testHandleRequestControllerAction(string $action, $parameter)
    {
        $application = $this->createInitializedApplication();
        $controller = $this->createTransactionalController();
        $application->getContainer()->set(Controller::PRODUCT, $controller);
        $request = Request::create(Controller::PRODUCT, $action, [$parameter]);
        $result = $this->invokeMethodFromObject($application, 'handleRequest', $request);

        switch ($action) {
            case Action::STATISTIC:
                $this->assertSame(150, $result->getResult()->getAvailable());
                break;
            case Action::DELETE:
            case Action::PUSH:
                $this->assertInstanceOf(Product::class, $result->getResult()[0]);
                break;
            case Action::PULL:
                $this->assertSame([1, 2, 3], $result->getResult());
                break;
        }
    }

    /**
     * @return array
     */
    public function controllerActionsDataProvider()
    {
        return [
            [Action::STATISTIC, new QueryFilter()],
            [Action::DELETE, new Product()],
            [Action::PULL, new QueryFilter()],
            [Action::PUSH, new Product()],
        ];
    }

    /**
     * @throws ApplicationException
     * @throws DependencyException
     * @throws NotFoundException
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function testHandleRequestTransactionalMethodsCalls()
    {
        $application = $this->createInitializedApplication();
        $controller = $this->createMock(TransactionalControllerStub::class);
        $application->getContainer()->set(Controller::CATEGORY, $controller);
        $category = new Category();

        $controller->expects($this->once())->method('delete')->with($category)->willReturn($category);
        $controller->expects($this->once())->method('beginTransaction');
        $controller->expects($this->once())->method('commit');
        $controller->expects($this->never())->method('rollback');

        $request = Request::create(Controller::CATEGORY, Action::DELETE, [$category]);
        $result = $this->invokeMethodFromObject($application, 'handleRequest', $request);
        $this->assertCount(1, $result->getResult());
    }

    /**
     * @throws ApplicationException
     * @throws \Throwable
     */
    public function testHandleRequestTransactionalControllerFail()
    {
        $this->expectException(\RuntimeException::class);
        $category = new Category();
        $application = $this->createInitializedApplication();
        $controller = $this->createMock(TransactionalControllerStub::class);
        $controller->expects($this->once())->method('delete')->with($category)->willThrowException(new \RuntimeException());
        $controller->expects($this->once())->method('beginTransaction');
        $controller->expects($this->never())->method('commit');
        $controller->expects($this->once())->method('rollback');
        $application->getContainer()->set(Controller::CATEGORY, $controller);

        $request = Request::create(Controller::CATEGORY, Action::DELETE, [$category]);
        $this->invokeMethodFromObject($application, 'handleRequest', $request);
    }

    /**
     * @throws ApplicationException
     * @throws DependencyException
     * @throws NotFoundException
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function testHandleRequestControllerClassNeedToBeInitialized()
    {
        $application = $this->createInitializedApplication(null, $this->createConnector("Jtl\Connector\Core\Controller"));
        $ack = new Ack();
        $request = Request::create(Controller::CONNECTOR, Action::ACK, [$ack]);
        $response = $this->invokeMethodFromObject($application, 'handleRequest', $request);

        $this->assertTrue($response->getResult());
    }

    /**
     * @throws ApplicationException
     * @throws ConfigException
     * @throws DependencyException
     * @throws NotFoundException
     * @throws \ReflectionException
     */
    public function testPrepareContainer()
    {
        $config = $this->createConfig(['foo' => 'you', 'bar' => 'jau']);
        $connector = $this->createConnector(ConnectorInterface::class);
        $application = $this->createApplication(null, $connector, null, $config);
        $container = $application->getContainer();

        $this->assertFalse($container->has(ConfigInterface::class));
        $this->assertFalse($container->has(TokenValidatorInterface::class));
        $this->assertFalse($container->has(PrimaryKeyMapperInterface::class));
        $this->assertFalse($container->has(SessionHandlerInterface::class));
        $this->invokeMethodFromObject($application, 'prepareContainer', $application, $container);
        $this->assertEquals($container->get(ConfigInterface::class), $config);
        $this->assertEquals($container->get(TokenValidatorInterface::class), $connector->getTokenValidator());
        $this->assertEquals($container->get(PrimaryKeyMapperInterface::class), $connector->getPrimaryKeyMapper());
        $this->assertEquals($container->get(SessionHandlerInterface::class), $application->getSessionHandler());
    }

    /**
     * @throws ApplicationException
     * @throws ConfigException
     * @throws \ReflectionException
     */
    public function testPrepareConfigSetDefaultParameters()
    {
        $defaultParameters = ConfigSchema::createDefaultParameters($this->connectorDir);
        $schema = new ConfigSchema();
        $application = $this->getMockBuilder(Application::class)->disableOriginalConstructor()->getMock();
        foreach ($defaultParameters as $parameter) {
            $this->assertFalse($schema->hasParameter($parameter->getKey()));
        }
        $this->invokeMethodFromObject($application, 'prepareConfig', $this->connectorDir, $this->createConfig(), $schema);
        foreach ($defaultParameters as $parameter) {
            $this->assertEquals($parameter, $schema->getParameter($parameter->getKey()));
        }
    }

    /**
     * @throws ApplicationException
     * @throws ConfigException
     * @throws \ReflectionException
     */
    public function testPrepareConfigurationSetDefaultValuesInConfig()
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
     * @throws \ReflectionException
     */
    public function testLoadPlugins()
    {
        $config = $this->createMock(ConfigInterface::class);
        $container = $this->createMock(\DI\Container::class);
        $eventDispatcher = $this->createMock(EventDispatcher::class);
        $app = $this->getMockBuilder(Application::class)->disableOriginalConstructor()->getMock();
        $myPluginDirSrc = sprintf('%s/fixtures/MyPlugin', $this->connectorDir);
        $myPluginDirDst = sprintf('%s/plugins/MyPlugin', $this->connectorDir);
        mkdir($myPluginDirDst, 0777, true);
        $data = file_get_contents(sprintf('%s/Bootstrap.php', $myPluginDirSrc));
        file_put_contents(sprintf('%s/Bootstrap.php', $myPluginDirDst), $data);
        $this->assertFalse(class_exists(Bootstrap::class));
        $this->invokeMethodFromObject($app, 'loadPlugins', $config, $container, $eventDispatcher, $myPluginDirDst);
        $this->assertTrue(class_exists(Bootstrap::class));
    }

    /**
     * @throws ApplicationException
     * @throws DefinitionException
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function testRun()
    {
        $serializer = SerializerBuilder::create()->build();
        $factory = AbstractModelFactory::createFactory(Model::MANUFACTURER);
        $id = $factory->getFaker()->uuid;
        /** @var Manufacturer $manufacturer */
        $manufacturer = $factory->makeOne();
        $manufacturerArray = $serializer->toArray($manufacturer);
        $requestPacket = (new RequestPacket())->setJtlrpc("2.0")->setMethod('manufacturer.push')->setParams([$manufacturerArray])->setId($id)->toArray();
        $responsePacket = (new ResponsePacket())->setJtlrpc("2.0")->setId($id)->setResult([$manufacturer]);
        $_POST['jtlrpc'] = json_encode($requestPacket);

        $connector = $this->createConnector('Jtl\Connector\Core\Test\Stub\Controller');
        $config = $this->createConfig();
        $configSchema = $this->getMockBuilder(ConfigSchema::class)->onlyMethods(['validateConfig'])->getMock();
        $controller = $this->createMock(TransactionalControllerStub::class);

        /** @var Application|MockObject $app */
        $app = $this->getMockBuilder(Application::class)
            ->setConstructorArgs([$connector, $this->connectorDir, $config, $configSchema])
            ->onlyMethods(['startSession', 'loadPlugins', 'prepareContainer'])
            ->getMock();
        $app->setSessionHandler($this->createMock(SessionHandlerInterface::class));
        $app->getContainer()->set(SessionHandlerInterface::class, $this->createMock(SessionHandlerInterface::class));
        $app->getContainer()->set(TokenValidatorInterface::class, $this->createMock(TokenValidatorInterface::class));
        $app->getContainer()->set(PrimaryKeyMapperInterface::class, $this->createMock(PrimaryKeyMapperInterface::class));
        $app->getContainer()->set(Controller::MANUFACTURER, $controller);

        $app->expects($this->once())->method('startSession');
        $app->expects($this->once())->method('loadPlugins');
        $app->expects($this->once())->method('prepareContainer');
        $connector->expects($this->once())->method('initialize')->with($config, $app->getContainer(), $app->getEventDispatcher());
        $configSchema->expects($this->once())->method('validateConfig')->with($config);
        $controller->expects($this->once())->method('push')->willReturn($manufacturer);
        $this->expectOutputString(json_encode($responsePacket->toArray($serializer)));
        $app->run();

        $eventDispatcher = $app->getEventDispatcher();
        $rpcEventListeners = $eventDispatcher->getListeners('rpc.before');
        $this->assertGreaterThan(0, $rpcEventListeners);

        $requestParamsTransformSubscriberFound = false;
        foreach ($rpcEventListeners as $listener) {
            if ($listener[0] instanceof RequestParamsTransformSubscriber) {
                $requestParamsTransformSubscriberFound = true;
                break;
            }
        }

        $coreFeaturesListeners = $eventDispatcher->getListeners(Event::createCoreEventName('Connector', 'features', 'after'));
        $this->assertGreaterThan(0, $coreFeaturesListeners);

        $coreFeaturesListenerFound = false;
        foreach ($coreFeaturesListeners as $listener) {
            if ($listener[0] instanceof FeaturesSubscriber) {
                $coreFeaturesListenerFound = true;
                break;
            }
        }

        $this->assertTrue($requestParamsTransformSubscriberFound, 'No RequestParamsTransformSubscriber is registered');
        $this->assertTrue($coreFeaturesListenerFound, 'No CoreFeaturesSubscriber is registered');
    }

    /**
     * @throws ApplicationException
     * @throws DefinitionException
     * @throws \Throwable
     */
    public function testRunInvalidRpcMethod()
    {
        $this->expectException(RpcException::class);
        $this->expectExceptionCode(ErrorCode::INVALID_REQUEST);
        $serializer = SerializerBuilder::create()->build();
        $factory = AbstractModelFactory::createFactory(Model::MANUFACTURER);
        $id = $factory->getFaker()->uuid;
        $requestPacket = (new RequestPacket())->setJtlrpc("2.0")->setMethod('yoo')->setParams([])->setId($id)->toArray();
        $_POST['jtlrpc'] = json_encode($requestPacket);
        $ex = RpcException::invalidRequest();
        $error = (new Error())->setCode(ErrorCode::INVALID_REQUEST)->setMessage("Invalid request")->setData(Error::createDataFromException($ex));
        $responsePacket = (new ResponsePacket())->setJtlrpc("2.0")->setId($id)->setError($error);
        $this->expectOutputString(json_encode($responsePacket->toArray($serializer)));
        $this->createApplication()->run();
    }

    /**
     * @throws ApplicationException
     * @throws DefinitionException
     * @throws \Throwable
     */
    public function testRunUnknwonController()
    {
        $this->expectException(DefinitionException::class);
        $this->expectExceptionCode(ErrorCode::UNKNOWN_CONTROLLER);
        $serializer = SerializerBuilder::create()->build();
        $factory = AbstractModelFactory::createFactory(Model::MANUFACTURER);
        $id = $factory->getFaker()->uuid;
        $requestPacket = (new RequestPacket())->setJtlrpc("2.0")->setMethod('foo.bar')->setParams([])->setId($id)->toArray();
        $_POST['jtlrpc'] = json_encode($requestPacket);
        $ex = DefinitionException::unknownController('foo');
        $error = (new Error())
            ->setCode(ErrorCode::UNKNOWN_CONTROLLER)
            ->setMessage("Unknown controller (Foo)")
            ->setData(Error::createDataFromException($ex));

        $responsePacket = (new ResponsePacket())
            ->setJtlrpc("2.0")
            ->setId($id)
            ->setError($error);

        $this->expectOutputString(json_encode($responsePacket->toArray($serializer)));
        $this->createApplication()->run();
    }

    /**
     * @throws ApplicationException
     * @throws DefinitionException
     * @throws \Throwable
     */
    public function testRunUnknwonAction()
    {
        $this->expectException(DefinitionException::class);
        $this->expectExceptionCode(ErrorCode::UNKNOWN_ACTION);
        $serializer = SerializerBuilder::create()->build();
        $factory = AbstractModelFactory::createFactory(Model::MANUFACTURER);
        $id = $factory->getFaker()->uuid;
        $requestPacket = (new RequestPacket())->setJtlrpc("2.0")->setMethod('category.bar')->setParams([])->setId($id)->toArray();
        $_POST['jtlrpc'] = json_encode($requestPacket);
        $ex = DefinitionException::unknownAction('bar');
        $error = (new Error())->setCode(ErrorCode::UNKNOWN_ACTION)->setMessage("Unknown action (bar)")->setData(Error::createDataFromException($ex));
        $responsePacket = (new ResponsePacket())->setJtlrpc("2.0")->setId($id)->setError($error);
        $this->expectOutputString(json_encode($responsePacket->toArray($serializer)));
        $this->createApplication()->run();
    }

    public function testHandleImagePushWithFilesSentByWawi()
    {
        $serializer = SerializerBuilder::create()->build();
        $data = file_get_contents(sprintf('%s/fixtures/images_push.json', TEST_DIR));
        $type = sprintf('array<%s>', AbstractImage::class);
        /** @var ProductImage[] $images */
        $images = $serializer->deserialize($data, $type, 'json');
        $uploadedFilePath = sprintf('%s/fixtures/images_push.zip', TEST_DIR);
        $file = new UploadedFile($uploadedFilePath, 'images.zip', 'application/octet-stream', UPLOAD_ERR_OK, true);
        $filebag = new FileBag(['file' => $file]);
        $request = $this->getMockBuilder(HttpRequest::class)
            ->disableOriginalConstructor()
            ->getMock();

        $request->files = $filebag;

        $app = $this->createApplication()->setRequest($request);
        $this->invokeMethodFromObject($app, 'handleImagePush', ...$images);
        foreach ($images as $image) {
            $this->assertFileExists($image->getFilename());
            $expectedFilename = sprintf('%d_%s.jpg', $image->getId()->getHost(), Str::toPascalCase($image->getRelationType()));
            $this->assertEquals($expectedFilename, substr($image->getFilename(), strrpos($image->getFilename(), '/') + 1));
        }
    }

    public function testHandleImagePushUploadedFileNotFound()
    {
        $this->expectException(ApplicationException::class);
        $this->expectExceptionCode(ErrorCode::REQUEST_ERROR);
        $serializer = SerializerBuilder::create()->build();
        $data = file_get_contents(sprintf('%s/fixtures/images_push.json', TEST_DIR));
        $type = sprintf('array<%s>', AbstractImage::class);
        /** @var ProductImage[] $images */
        $images = $serializer->deserialize($data, $type, 'json');
        $app = $this->createApplication();
        $this->invokeMethodFromObject($app, 'handleImagePush', ...$images);
    }

    public function testHandleImagePushFileExtractionFailed()
    {
        $this->expectException(ApplicationException::class);
        $this->expectExceptionCode(ErrorCode::SERVER_ERROR);
        $serializer = SerializerBuilder::create()->build();
        $data = file_get_contents(sprintf('%s/fixtures/images_push.json', TEST_DIR));
        $type = sprintf('array<%s>', AbstractImage::class);
        /** @var ProductImage[] $images */
        $images = $serializer->deserialize($data, $type, 'json');
        $uploadedFilePath = sprintf('%s/fixtures/images_push.json', TEST_DIR);
        $file = new UploadedFile($uploadedFilePath, 'images.zip', 'application/octet-stream', UPLOAD_ERR_OK, true);
        $filebag = new FileBag(['file' => $file]);
        $request = $this->getMockBuilder(HttpRequest::class)
            ->disableOriginalConstructor()
            ->getMock();

        $request->files = $filebag;
        $app = $this->createApplication()->setRequest($request);
        $this->invokeMethodFromObject($app, 'handleImagePush', ...$images);
    }

    /**
     * @param ConnectorInterface|null $connector
     * @param ConfigInterface|null $config
     * @param ConfigSchema|null $configSchema
     * @param string|null $connectorDir
     * @return Application
     * @throws ApplicationException
     */
    protected function createApplication(
        ConfigSchema $configSchema = null,
        ConnectorInterface $connector = null,
        string $connectorDir = null,
        ConfigInterface $config = null
    ): Application {
        if (is_null($configSchema)) {
            $configSchema = new ConfigSchema();
        }

        if (is_null($connector)) {
            $connector = $this->createConnector();
        }

        if (is_null($config)) {
            $config = new ArrayConfig([]);
        }

        if (is_null($connectorDir)) {
            $connectorDir = $this->connectorDir;
        }

        return new Application($connector, $connectorDir, $config, $configSchema);
    }

    /**
     * @param ConnectorInterface|null $connector
     * @param ConfigInterface|null $config
     * @param ConfigSchema|null $configSchema
     * @param string|null $connectorDir
     * @return Application
     * @throws ApplicationException
     * @throws ConfigException
     */
    protected function createInitializedApplication(
        ConfigSchema $configSchema = null,
        ConnectorInterface $connector = null,
        string $connectorDir = null,
        ConfigInterface $config = null
    ) {
        $sessionHandler = $this->createMock(SessionHandlerInterface::class);
        if (is_null($configSchema)) {
            $configSchema = (new ConfigSchema())->setParameters(...ConfigSchema::createDefaultParameters($this->connectorDir));
        }

        if (is_null($config)) {
            $config = new ArrayConfig($configSchema->getDefaultValues());
        }

        $app = $this->createApplication($configSchema, $connector, $connectorDir, $config);
        $app->setSessionHandler($sessionHandler);
        $app->getContainer()->set(PrimaryKeyMapperInterface::class, $this->createMock(PrimaryKeyMapperInterface::class));
        $app->getContainer()->set(SessionHandlerInterface::class, $sessionHandler);
        $app->getContainer()->set(TokenValidatorInterface::class, $this->createMock(TokenValidatorInterface::class));
        return $app;
    }

    /**
     * @param string $controllerNamespace
     * @param bool $tokenValidatorValidateValue
     * @return ConnectorInterface|MockObject
     */
    public function createConnector($controllerNamespace = "", bool $tokenValidatorValidateValue = true)
    {
        $tokenValidator = $this->createMock(TokenValidatorInterface::class);
        $tokenValidator->expects($this->any())->method('validate')->willReturn($tokenValidatorValidateValue);
        $pkMapper = $this->createMock(PrimaryKeyMapperInterface::class);
        $connector = $this->createMock(ConnectorInterface::class);
        $connector->expects($this->any())->method('initialize');
        $connector->expects($this->any())->method('getControllerNamespace')->willReturn($controllerNamespace);
        $connector->expects($this->any())->method('getTokenValidator')->willReturn($tokenValidator);
        $connector->expects($this->any())->method('getPrimaryKeyMapper')->willReturn($pkMapper);

        return $connector;
    }

    /**
     * @param bool $commitThrowsException
     * @return TransactionalControllerStub
     */
    public function createTransactionalController($commitThrowsException = false): TransactionalControllerStub
    {
        return new TransactionalControllerStub($commitThrowsException);
    }
}

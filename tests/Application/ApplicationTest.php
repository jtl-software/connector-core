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
use Jtl\Connector\Core\Config\GlobalConfig;
use Jtl\Connector\Core\Connector\ConnectorInterface;
use Jtl\Connector\Core\Controller\PushInterface;
use Jtl\Connector\Core\Definition\Action;
use Jtl\Connector\Core\Definition\Controller;
use Jtl\Connector\Core\Exception\ApplicationException;
use Jtl\Connector\Core\Exception\ConfigException;
use Jtl\Connector\Core\Mapper\PrimaryKeyMapperInterface;
use Jtl\Connector\Core\Model\Ack;
use Jtl\Connector\Core\Model\Category;
use Jtl\Connector\Core\Model\Product;
use Jtl\Connector\Core\Model\QueryFilter;
use Jtl\Connector\Core\Test\TestCase;
use Jtl\Connector\Core\Test\Stub\Controller\TransactionalControllerStub;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Noodlehaus\ConfigInterface;

/**
 * Class ApplicationTest
 * @package Jtl\Connector\Core\Application
 */
class ApplicationTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /**
     * @param string $controllerNamespace
     * @return ConnectorInterface|\Mockery\LegacyMockInterface|\Mockery\MockInterface
     */
    public function createConnector($controllerNamespace = "")
    {
        $tokenValidator = \Mockery::mock(TokenValidatorInterface::class);
        $tokenValidator->shouldReceive('validate')->andReturnTrue();

        $primaryKeyMapper = \Mockery::mock(PrimaryKeyMapperInterface::class);

        $endpointConnector = \Mockery::mock(ConnectorInterface::class);
        $endpointConnector->shouldReceive('initialize');
        $endpointConnector->shouldReceive('getControllerNamespace')->andReturn($controllerNamespace);
        $endpointConnector->shouldReceive('getTokenValidator')->andReturn($tokenValidator);
        $endpointConnector->shouldReceive('getPrimaryKeyMapper')->andReturn($primaryKeyMapper);

        return $endpointConnector;
    }

    /**
     * @return PushInterface|\Mockery\LegacyMockInterface|\Mockery\MockInterface
     */
    public function createEndpointController()
    {
        $controller = \Mockery::mock(PushInterface::class);

        return $controller;
    }

    /**
     * @param bool $commitThrowsException
     * @return TransactionalControllerStub
     */
    public function createTransactionalController($commitThrowsException = false): TransactionalControllerStub
    {
        return new TransactionalControllerStub($commitThrowsException);
    }

    /**
     * @param ConnectorInterface|null $connector
     * @param ConfigInterface|null $config
     * @param ConfigSchema|null $configSchema
     * @return Application
     * @throws ApplicationException
     */
    protected function createApplication(ConnectorInterface $connector = null, ConfigInterface $config = null, ConfigSchema $configSchema = null): Application
    {
        if (is_null($connector)) {
            $connector = $this->createConnector();
        }

        if (is_null($config)) {
            $config = new ArrayConfig([]);
        }

        return new Application($connector, $config, $configSchema);
    }

    /**
     * @throws ApplicationException
     * @throws DependencyException
     * @throws NotFoundException
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function testHandleRequestControllerClassNotFoundException()
    {
        $application = $this->createApplication();

        $ack = new Ack();

        $request = Request::create(Controller::PRODUCT, Action::ACK, [$ack]);

        $this->expectException(ApplicationException::class);

        $application->handleRequest($request);
    }

    /**
     * @dataProvider controllerActionsDataProvider
     *
     * @param $action
     * @param $parameter
     * @throws ApplicationException
     * @throws DependencyException
     * @throws NotFoundException
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function testHandleRequestControllerAction(string $action, $parameter)
    {
        $application = $this->createApplication();
        $controller = $this->createTransactionalController();
        $application->getContainer()->set(Controller::PRODUCT, $controller);
        $request = Request::create(Controller::PRODUCT, $action, [$parameter]);
        $this->invokeMethodFromObject($application, 'prepareContainer');
        $result = $application->handleRequest($request);

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
        $application = $this->createApplication();
        $controller = $this->createTransactionalController();
        $spy = \Mockery::spy($controller);
        $application->getContainer()->set(Controller::CATEGORY, $spy);
        $category = new Category();
        $request = Request::create(Controller::CATEGORY, Action::DELETE, [$category]);
        $this->invokeMethodFromObject($application, 'prepareContainer');
        $result = $application->handleRequest($request);
        $this->assertCount(1, $result->getResult());
        $spy->shouldHaveReceived('delete')
            ->with($category)
            ->once();

        $spy->shouldHaveReceived('beginTransaction')
            ->once();

        $spy->shouldHaveReceived('commit')
            ->once();

        $spy->shouldNotReceive('rollback');
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
        $application = $this->createApplication($this->createConnector("Jtl\Connector\Core\Controller"));
        $application->setSessionHandler($this->createMock(\SessionHandlerInterface::class));
        $ack = new Ack();

        $request = Request::create(Controller::CONNECTOR, Action::ACK, [$ack]);
        $this->invokeMethodFromObject($application, 'prepareContainer');
        $response = $application->handleRequest($request);

        $this->assertTrue($response->getResult());
    }

    /**
     * @throws ApplicationException
     * @throws \Throwable
     */
    public function testHandleRequestTransactionalControllerFail()
    {
        $application = $this->createApplication();
        $controller = $this->createTransactionalController(true);
        $spy = \Mockery::spy($controller);
        $application->getContainer()->set(Controller::CATEGORY, $spy);
        $category = new Category();
        $request = Request::create(Controller::CATEGORY, Action::DELETE, [$category]);
        $this->invokeMethodFromObject($application, 'prepareContainer');
        try {
            $application->handleRequest($request);
        } catch (\Exception $e) {
        }

        $spy->shouldHaveReceived('beginTransaction')
            ->once();

        $spy->shouldHaveReceived('delete')
            ->with($category)
            ->once();

        $spy->shouldHaveReceived('commit')
            ->once();

        $spy->shouldHaveReceived('rollback')
            ->once();
    }

    /**
     * @throws ApplicationException
     * @throws DependencyException
     * @throws NotFoundException
     * @throws \ReflectionException
     */
    public function testPrepareContainer()
    {
        $schema = (new ConfigSchema())
            ->setParameter(new ConfigParameter('foo', ConfigParameter::TYPE_STRING))
            ->setParameter(new ConfigParameter('bar', ConfigParameter::TYPE_STRING));
        $application = $this->createApplication(null, $this->createConfig(['foo' => 'you', 'bar' => 'jau']), $schema);
        $container = $application->getContainer();
        $this->assertFalse($container->has('foo'));
        $this->assertFalse($container->has('bar'));
        $this->invokeMethodFromObject($application, 'prepareContainer');
        $this->assertEquals('you', $container->get('foo'));
        $this->assertEquals('jau', $container->get('bar'));
    }

    /**
     * @throws ApplicationException
     * @throws ConfigException
     * @throws \ReflectionException
     */
    public function testPrepareConfigurationSetDefaultParameters()
    {
        $defaultParameters = ConfigSchema::createDefaultParameters();
        $schema = new ConfigSchema();
        $application = $this->createApplication(null, null, $schema);
        foreach ($defaultParameters as $parameter) {
            $this->assertFalse($schema->hasParameter($parameter->getKey()));
        }
        $this->invokeMethodFromObject($application, 'prepareConfiguration');
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

        $application = $this->createApplication(null, $config, $schema);
        $this->invokeMethodFromObject($application, 'prepareConfiguration');

        $this->assertEquals(42, $config->get('foo'));
        $this->assertFalse($config->has('bar'));
        $this->assertEquals('yes', $config->get('baz'));
    }

    public function testPrepareConfigurationSetGlobalParametersInRuntimeConfig()
    {
        $schema = (new ConfigSchema())
            ->setParameter(ConfigParameter::create('foo', ConfigParameter::TYPE_INTEGER, true, false))
            ->setParameter(ConfigParameter::create('bar', ConfigParameter::TYPE_BOOLEAN, false, true))
            ->setParameter(ConfigParameter::create('baz', ConfigParameter::TYPE_STRING, true, true))
            ->setParameter(ConfigParameter::create('tri', ConfigParameter::TYPE_DOUBLE, false, true))
            ->setParameter(ConfigParameter::create('tra', ConfigParameter::TYPE_DOUBLE, true, false));

        $config = $this->createConfig(['foo' => 122, 'bar' => true, 'baz' => 'schnatz', 'tri' => 0.315, 'tra' => 0.99]);
        $application = $this->createApplication(null, $config, $schema);

        $globalConfig = GlobalConfig::getInstance();
        $this->assertFalse($globalConfig->has('foo'));
        $this->assertFalse($globalConfig->has('bar'));
        $this->assertFalse($globalConfig->has('baz'));
        $this->assertFalse($globalConfig->has('tri'));
        $this->assertFalse($globalConfig->has('tra'));

        $this->invokeMethodFromObject($application, 'prepareConfiguration');
        $this->assertFalse($globalConfig->has('foo'));
        $this->assertEquals(true, $globalConfig->get('bar'));
        $this->assertEquals('schnatz', $globalConfig->get('baz'));
        $this->assertEquals(0.315, $globalConfig->get('tri'));
        $this->assertFalse($globalConfig->has('tra'));
    }

    /**
     *
     */
    public function tearDown(): void
    {
        parent::tearDown();
        \Mockery::close();
    }
}

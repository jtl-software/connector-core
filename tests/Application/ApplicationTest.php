<?php

namespace Jtl\Connector\Core\Test\Application;

use Jtl\Connector\Core\Application\Application;
use Jtl\Connector\Core\Application\Request;
use Jtl\Connector\Core\Authentication\TokenValidatorInterface;
use Jtl\Connector\Core\Connector\ConnectorInterface;
use Jtl\Connector\Core\Controller\PushInterface;
use Jtl\Connector\Core\Definition\Action;
use Jtl\Connector\Core\Definition\Controller;
use Jtl\Connector\Core\Exception\ApplicationException;
use Jtl\Connector\Core\Mapper\PrimaryKeyMapperInterface;
use Jtl\Connector\Core\Model\Ack;
use Jtl\Connector\Core\Model\Category;
use Jtl\Connector\Core\Model\Product;
use Jtl\Connector\Core\Model\QueryFilter;
use Jtl\Connector\Core\Test\TestCase;
use Jtl\Connector\Core\Test\Stub\Controller\TransactionalControllerStub;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

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
     * @param ConnectorInterface $connector
     * @return Application
     * @throws \Exception
     */
    protected function createApplication(ConnectorInterface $connector): Application
    {
        return new Application($connector);
    }

    /**
     * @throws ApplicationException
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function testHandleRequestControllerClassNotFoundException()
    {
        $application = $this->createApplication($this->createConnector());

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
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function testHandleRequestControllerAction($action, $parameter)
    {
        $application = $this->createApplication($this->createConnector());

        $controller = $this->createTransactionalController();

        $application->getContainer()->set(Controller::PRODUCT, $controller);

        $request = Request::create(Controller::PRODUCT, $action, [$parameter]);

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
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function testHandleRequestTransactionalMethodsCalls()
    {
        $application = $this->createApplication($this->createConnector());

        $controller = $this->createTransactionalController();

        $spy = \Mockery::spy($controller);

        $application->getContainer()->set(Controller::CATEGORY, $spy);

        $category = new Category();

        $request = Request::create(Controller::CATEGORY, Action::DELETE, [$category]);

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
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function testHandleRequestControllerClassNeedToBeInitialized()
    {
        $application = $this->createApplication($this->createConnector(
            "Jtl\Connector\Core\Controller"
        ));

        $ack = new Ack();

        $request = Request::create(Controller::CONNECTOR, Action::ACK, [$ack]);

        $response = $application->handleRequest($request);

        $this->assertTrue($response->getResult());
    }

    /**
     * @throws ApplicationException
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function testHandleRequestTransactionalControllerFail()
    {
        $application = $this->createApplication($this->createConnector());

        $controller = $this->createTransactionalController(true);

        $spy = \Mockery::spy($controller);

        $application->getContainer()->set(Controller::CATEGORY, $spy);

        $category = new Category();

        $request = Request::create(Controller::CATEGORY, Action::DELETE, [$category]);

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
     *
     */
    public function tearDown(): void
    {
        parent::tearDown();
        \Mockery::close();
    }
}

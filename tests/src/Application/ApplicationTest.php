<?php

namespace Jtl\Connector\Test\Application;

use Jtl\Connector\Core\Application\Application;
use Jtl\Connector\Core\Application\Request;
use Jtl\Connector\Core\Authentication\TokenValidatorInterface;
use Jtl\Connector\Core\Connector\ConnectorInterface;
use Jtl\Connector\Core\Controller\DeleteInterface;
use Jtl\Connector\Core\Controller\PullInterface;
use Jtl\Connector\Core\Controller\PushInterface;
use Jtl\Connector\Core\Controller\StatisticInterface;
use Jtl\Connector\Core\Controller\TransactionalInterface;
use Jtl\Connector\Core\Definition\Action;
use Jtl\Connector\Core\Definition\Controller;
use Jtl\Connector\Core\Exception\ApplicationException;
use Jtl\Connector\Core\Mapper\PrimaryKeyMapperInterface;
use Jtl\Connector\Core\Model\AbstractDataModel;
use Jtl\Connector\Core\Model\Ack;
use Jtl\Connector\Core\Model\Category;
use Jtl\Connector\Core\Model\Product;
use Jtl\Connector\Core\Model\QueryFilter;
use Jtl\Connector\Test\TestCase;

/**
 * Class ApplicationTest
 * @package Jtl\Connector\Core\Application
 */
class ApplicationTest extends TestCase
{

    /**
     * @return ConnectorInterface|\Mockery\LegacyMockInterface|\Mockery\MockInterface
     */
    public function createConnector()
    {
        $tokenValidator = \Mockery::mock(TokenValidatorInterface::class);
        $tokenValidator->shouldReceive('validate')->andReturnTrue();

        $primaryKeyMapper = \Mockery::mock(PrimaryKeyMapperInterface::class);

        $endpointConnector = \Mockery::mock(ConnectorInterface::class);
        $endpointConnector->shouldReceive('initialize');
        $endpointConnector->shouldReceive('getControllerNamespace')->andReturn("");
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
     */
    public function createTransactionalController($commitThrowsException = false)
    {
        return new class($commitThrowsException) implements DeleteInterface, StatisticInterface, PullInterface, PushInterface, TransactionalInterface
        {
            public $beginTransactionCalled = 0;
            public $commitCalled = 0;
            public $rollbackCalled = 0;

            public function __construct($commitThrowsException)
            {
                $this->commitThrowsException = $commitThrowsException;
            }

            public function statistic(QueryFilter $queryFilter): int
            {
                return 150;
            }

            public function delete(AbstractDataModel $model): AbstractDataModel
            {
                return $model;
            }

            public function pull(QueryFilter $queryFilter): array
            {
                return [1, 2, 3];
            }

            public function push(AbstractDataModel $model): AbstractDataModel
            {
                return $model;
            }

            public function beginTransaction(): bool
            {
                $this->beginTransactionCalled++;
                return true;
            }

            public function commit(): bool
            {
                $this->commitCalled++;

                if ($this->commitThrowsException) {
                    throw new \Exception("Error in transaction");
                }

                return true;
            }

            public function rollback(): bool
            {
                $this->rollbackCalled++;
                return true;
            }
        };
    }

    /**
     * @param ConnectorInterface $connector
     * @return Application
     * @throws \Exception
     */
    protected function createApplication(ConnectorInterface $connector)
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

        $application->handleRequest($request, $application->getEndpointConnector());
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

        $result = $application->handleRequest($request, $application->getEndpointConnector());

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

        $application->getContainer()->set(Controller::CATEGORY, $controller);

        $category = new Category();

        $request = Request::create(Controller::CATEGORY, Action::DELETE, [$category]);

        $result = $application->handleRequest($request, $application->getEndpointConnector());

        $this->assertCount(1, $result->getResult());

        $this->assertSame(1, $controller->beginTransactionCalled);
        $this->assertSame(1, $controller->commitCalled);
        $this->assertSame(0, $controller->rollbackCalled);
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

        $application->getContainer()->set(Controller::CATEGORY, $controller);

        $category = new Category();

        $request = Request::create(Controller::CATEGORY, Action::DELETE, [$category]);

        $this->expectException(\Exception::class);

        try {
            $application->handleRequest($request, $application->getEndpointConnector());
        } finally {
            $this->assertSame(1, $controller->beginTransactionCalled);
            $this->assertSame(1, $controller->commitCalled);
            $this->assertSame(1, $controller->rollbackCalled);
        }
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

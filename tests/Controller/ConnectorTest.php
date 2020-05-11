<?php
namespace Jtl\Connector\Core\Test\Controller;

use Jtl\Connector\Core\Application\Application;
use Jtl\Connector\Core\Authentication\TokenValidatorInterface;
use Jtl\Connector\Core\Connector\ConnectorInterface;
use Jtl\Connector\Core\Controller\ConnectorController;
use Jtl\Connector\Core\Exception\ApplicationException;
use Jtl\Connector\Core\Exception\AuthenticationException;
use Jtl\Connector\Core\Exception\MissingRequirementException;
use Jtl\Connector\Core\Model\Ack;
use Jtl\Connector\Core\Model\Authentication;
use Jtl\Connector\Core\Model\Features;
use Jtl\Connector\Core\Model\Session;
use Jtl\Connector\Core\Test\TestCase;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

/**
 * Class ConnectorTest
 * @package Jtl\Connector\Core\Test\Controller
 */
class ConnectorTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /**
     * @return ConnectorController
     */
    protected function createConnectorController(): ConnectorController
    {
        $application = \Mockery::mock(Application::class);
        return new ConnectorController($application);
    }

    /**
     * @throws MissingRequirementException
     */
    public function testInit()
    {
        $this->assertTrue($this->createConnectorController()->init());
    }

    /**
     *
     */
    public function testFeatures()
    {
        $connector = \Mockery::mock(ConnectorController::class)->shouldAllowMockingProtectedMethods()->makePartial();

        $jsonFeatures = json_encode(["entities" => ["Category" => ["push" => true]]]);

        $connector->shouldReceive('readFeaturesData')->andReturn($jsonFeatures);

        $features = $connector->features();

        $this->assertInstanceOf(Features::class, $features);
        $this->assertCount(1, $features->getEntities());
        $this->assertCount(0, $features->getFlags());
    }

    /**
     *
     */
    public function testAckEmpty()
    {
        $connector = $this->createConnectorController();
        $this->assertTrue($connector->ack(new Ack()));
    }

    /**
     * @throws \Exception
     */
    public function testAckInvalidModelName()
    {
        $application = \Mockery::mock(Application::class);
        $application->shouldReceive('getLinker->save')->times(3)->andReturnTrue();

        $connector = new ConnectorController($application);

        $ack = new Ack();
        $ack->setIdentities([
            "Foo" => [
                $this->createIdentity()
            ],
            "Category" => [
                $this->createIdentity(),
                $this->createIdentity(),
                $this->createIdentity()
            ]
        ]);

        $this->assertTrue($connector->ack($ack));
    }

    /**
     * @throws AuthenticationException
     * @throws \Jtl\Connector\Core\Exception\ApplicationException
     */
    public function testAuthMissingToken()
    {
        $connector = $this->createConnectorController();

        $this->expectExceptionObject(AuthenticationException::tokenMissing());

        $auth = new Authentication();

        $connector->auth($auth);
    }

    /**
     * @throws AuthenticationException
     * @throws \Jtl\Connector\Core\Exception\ApplicationException
     */
    public function testAuthTokenIsInvalid()
    {
        $_SERVER['REMOTE_ADDR'] = '';

        $this->expectExceptionObject(AuthenticationException::failed());

        $application = \Mockery::mock(Application::class);
        $application->shouldReceive('getConnector->getTokenValidator')->andReturnUsing(function(){
            return new class implements TokenValidatorInterface {
                public function validate(string $token): bool
                {
                    return false;
                }
            };
        });

        $connector = new ConnectorController($application);

        $auth = new Authentication();
        $auth->setToken(md5(time()));

        $connector->auth($auth);
    }

    /**
     * @throws ApplicationException
     * @throws AuthenticationException
     */
    public function testAuthSessionHandlerIsNotSet()
    {
        $this->expectExceptionObject(ApplicationException::noSession());

        $application = \Mockery::mock(Application::class);
        $application->shouldReceive('getConnector->getTokenValidator')->andReturnUsing(function(){
            return new class implements TokenValidatorInterface {
                public function validate(string $token): bool
                {
                    return true;
                }
            };
        });

        $application->shouldReceive('getSessionHandler')->andReturnNull();

        $connector = new ConnectorController($application);

        $auth = new Authentication();
        $auth->setToken(md5(time()));

        $connector->auth($auth);
    }

    /**
     * @throws ApplicationException
     * @throws AuthenticationException
     */
    public function testAuthCorrect()
    {
        $application = \Mockery::mock(Application::class);
        $application->shouldReceive('getConnector->getTokenValidator')->andReturnUsing(function(){
            return new class implements TokenValidatorInterface {
                public function validate(string $token): bool
                {
                    return true;
                }
            };
        });

        $application->shouldReceive('getSessionHandler')->andReturnUsing(function(){
            return \Mockery::mock(\SessionHandlerInterface::class);
        });

        $connector = new ConnectorController($application);

        $auth = new Authentication();
        $auth->setToken(md5(time()));

        $session = $connector->auth($auth);

        $this->assertInstanceOf(Session::class,$session);
        $this->assertNotEmpty($session->getLifetime());
    }

    /**
     *
     */
    public function testIdentify()
    {
        $endpointVersion = "1.0";
        $platformName = "ConnectorPlatform";
        $platformVersion = "0.1";

        $endpointConnector = \Mockery::mock(ConnectorInterface::class);
        $endpointConnector->shouldReceive('getEndpointVersion')->andReturn($endpointVersion);
        $endpointConnector->shouldReceive('getPlatformVersion')->andReturn($platformVersion);
        $endpointConnector->shouldReceive('getPlatformName')->andReturn($platformName);

        $controller = $this->createConnectorController();
        $connectorIdentification = $controller->identify($endpointConnector);

        $this->assertSame($endpointVersion, $connectorIdentification->getEndpointVersion());
        $this->assertSame($platformName, $connectorIdentification->getPlatformName());
        $this->assertSame($platformVersion, $connectorIdentification->getPlatformVersion());
        $this->assertSame(Application::PROTOCOL_VERSION, $connectorIdentification->getProtocolVersion());
    }

    /**
     *
     */
    public function testClearSuccess()
    {
        $application = \Mockery::mock(Application::class);
        $application->shouldReceive('getLinker->clear')->andReturnTrue();

        $linker = new ConnectorController($application);

        $response = $linker->clear(['foo']);
        $this->assertTrue($response);
    }

    /**
     *
     */
    public function testClearFailure()
    {
        $application = \Mockery::mock(Application::class);
        $application->shouldReceive('getLinker->clear')->andReturnFalse();

        $linker = new ConnectorController($application);

        $response = $linker->clear(true);
        $this->assertFalse($response);
    }

    /**
     *
     */
    protected function tearDown(): void
    {
        parent::tearDown();
        \Mockery::close();
    }
}

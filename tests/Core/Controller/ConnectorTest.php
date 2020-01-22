<?php
namespace Jtl\Connector\Test\Core\Controller;

use Jtl\Connector\Core\Application\Application;
use Jtl\Connector\Core\Authentication\TokenValidatorInterface;
use Jtl\Connector\Core\Controller\Connector;
use Jtl\Connector\Core\Exception\ApplicationException;
use Jtl\Connector\Core\Exception\AuthenticationException;
use Jtl\Connector\Core\Model\Ack;
use Jtl\Connector\Core\Model\Authentication;
use Jtl\Connector\Core\Model\Features;
use Jtl\Connector\Core\Model\Session;
use Jtl\Connector\Test\Core\TestCase;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

/**
 * Class ConnectorTest
 * @package Jtl\Connector\Test\Controller
 */
class ConnectorTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /**
     * @return Connector
     */
    protected function createConnectorController(): Connector
    {
        $application = \Mockery::mock(Application::class);
        return new Connector($application);
    }

    /**
     * @throws \Jtl\Connector\Core\Exception\MissingRequirementException
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
        $connector = \Mockery::mock(Connector::class)->shouldAllowMockingProtectedMethods()->makePartial();

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

        $connector = new Connector($application);

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
        $application->shouldReceive('getEndpointConnector->getTokenValidator')->andReturnUsing(function(){
            return new class implements TokenValidatorInterface {
                public function validate(string $token): bool
                {
                    return false;
                }
            };
        });

        $connector = new Connector($application);

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
        $application->shouldReceive('getEndpointConnector->getTokenValidator')->andReturnUsing(function(){
            return new class implements TokenValidatorInterface {
                public function validate(string $token): bool
                {
                    return true;
                }
            };
        });

        $application->shouldReceive('getSessionHandler')->andReturnNull();

        $connector = new Connector($application);

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
        $application->shouldReceive('getEndpointConnector->getTokenValidator')->andReturnUsing(function(){
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

        $connector = new Connector($application);

        $auth = new Authentication();
        $auth->setToken(md5(time()));

        $session = $connector->auth($auth);

        $this->assertInstanceOf(Session::class,$session);
        $this->assertNotEmpty($session->getLifetime());
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
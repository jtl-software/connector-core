<?php
namespace Jtl\Connector\Core\Test\Controller;

use Jtl\Connector\Core\Application\Application;
use Jtl\Connector\Core\Authentication\TokenValidatorInterface;
use Jtl\Connector\Core\Connector\ConnectorInterface;
use Jtl\Connector\Core\Controller\ConnectorController;
use Jtl\Connector\Core\Exception\ApplicationException;
use Jtl\Connector\Core\Exception\AuthenticationException;
use Jtl\Connector\Core\Linker\IdentityLinker;
use Jtl\Connector\Core\Model\Ack;
use Jtl\Connector\Core\Model\Authentication;
use Jtl\Connector\Core\Model\Features;
use Jtl\Connector\Core\Model\Session;
use Jtl\Connector\Core\Test\TestCase;

/**
 * Class ConnectorTest
 * @package Jtl\Connector\Core\Test\Controller
 */
class ConnectorTest extends TestCase
{
    /**
     * @param IdentityLinker|null $linker
     * @param \SessionHandlerInterface|null $sessionHandler
     * @param TokenValidatorInterface|null $tokenValidator
     * @return ConnectorController
     */
    protected function createConnectorController(
        IdentityLinker $linker = null,
        \SessionHandlerInterface $sessionHandler = null,
        TokenValidatorInterface $tokenValidator = null
    ): ConnectorController {
        if (is_null($linker)) {
            $linker = $this->createMock(IdentityLinker::class);
        }

        if (is_null($sessionHandler)) {
            $sessionHandler = $this->createMock(\SessionHandlerInterface::class);
        }

        if (is_null($tokenValidator)) {
            $tokenValidator = $this->createMock(TokenValidatorInterface::class);
        }
        return new ConnectorController($linker, $sessionHandler, $tokenValidator);
    }

    /**
     *
     */
    public function testFeatures()
    {
        $controller = $this->getMockBuilder(ConnectorController::class)
            ->onlyMethods(['readFeaturesData'])
            ->disableOriginalConstructor()
            ->getMock();


        $jsonFeatures = json_encode(["entities" => ["Category" => ["push" => true]]]);
        $controller->expects($this->once())->method('readFeaturesData')->willReturn($jsonFeatures);

        $features = $controller->features();

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
        $linker = $this->createMock(IdentityLinker::class);
        $linker->expects($this->exactly(3))->method('save')->willReturn(true);
        $connector = $this->createConnectorController($linker);
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
        $tokenValidator = $this->createMock(TokenValidatorInterface::class);
        $tokenValidator->expects($this->once())->method('validate')->willReturn(false);
        $controller = $this->createConnectorController(null, null, $tokenValidator);

        $auth = new Authentication();
        $auth->setToken(md5(time()));

        $controller->auth($auth);
    }

    /**
     * @throws ApplicationException
     * @throws AuthenticationException
     */
    public function testAuthCorrect()
    {
        $tokenValidator = $this->createMock(TokenValidatorInterface::class);
        $tokenValidator->expects($this->once())->method('validate')->willReturn(true);


        $connector = $this->createConnectorController(null, null, $tokenValidator);

        $auth = new Authentication();
        $auth->setToken(md5(time()));

        $session = $connector->auth($auth);

        $this->assertInstanceOf(Session::class, $session);
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

        $connector = $this->createMock(ConnectorInterface::class);
        $connector->expects($this->once())->method('getEndpointVersion')->willReturn($endpointVersion);
        $connector->expects($this->once())->method('getPlatformVersion')->willReturn($platformVersion);
        $connector->expects($this->once())->method('getPlatformName')->willReturn($platformName);

        $controller = $this->createConnectorController();
        $connectorIdentification = $controller->identify($connector);

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
        $linker = $this->createMock(IdentityLinker::class);
        $linker->expects($this->once())->method('clear')->willReturn(true);
        $controller = $this->createConnectorController($linker);

        $response = $controller->clear(['foo']);
        $this->assertTrue($response);
    }

    /**
     *
     */
    public function testClearFailure()
    {
        $linker = $this->createMock(IdentityLinker::class);
        $linker->expects($this->once())->method('clear')->willReturn(false);
        $controller = $this->createConnectorController($linker);

        $response = $controller->clear(true);
        $this->assertFalse($response);
    }
}

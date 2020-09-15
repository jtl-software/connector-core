<?php
namespace Jtl\Connector\Core\Test\Controller;

use Jtl\Connector\Core\Application\Application;
use Jtl\Connector\Core\Authentication\TokenValidatorInterface;
use Jtl\Connector\Core\Connector\ConnectorInterface;
use Jtl\Connector\Core\Controller\ConnectorController;
use Jtl\Connector\Core\Exception\ApplicationException;
use Jtl\Connector\Core\Exception\AuthenticationException;
use Jtl\Connector\Core\Exception\DefinitionException;
use Jtl\Connector\Core\Linker\ChecksumLinker;
use Jtl\Connector\Core\Linker\IdentityLinker;
use Jtl\Connector\Core\Model\Ack;
use Jtl\Connector\Core\Model\Authentication;
use Jtl\Connector\Core\Model\Features;
use Jtl\Connector\Core\Model\Identities;
use Jtl\Connector\Core\Model\Identity;
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
     * @param ChecksumLinker|null $checksumLinker
     * @param \SessionHandlerInterface|null $sessionHandler
     * @param TokenValidatorInterface|null $tokenValidator
     * @param string $featuresPath
     * @return ConnectorController
     */
    protected function createConnectorController(
        IdentityLinker $linker = null,
        ChecksumLinker $checksumLinker = null,
        \SessionHandlerInterface $sessionHandler = null,
        TokenValidatorInterface $tokenValidator = null,
        string $featuresPath = ''
    ): ConnectorController {
        if (is_null($linker)) {
            $linker = $this->createMock(IdentityLinker::class);
        }

        if (is_null($checksumLinker)) {
            $checksumLinker = $this->createMock(ChecksumLinker::class);
        }

        if (is_null($sessionHandler)) {
            $sessionHandler = $this->createMock(\SessionHandlerInterface::class);
        }

        if (is_null($tokenValidator)) {
            $tokenValidator = $this->createMock(TokenValidatorInterface::class);
        }
        return new ConnectorController($featuresPath, $checksumLinker, $linker, $sessionHandler, $tokenValidator);
    }

    /**
     *
     */
    public function testFeatures()
    {
        $controller = $this->getMockBuilder(ConnectorController::class)
            ->onlyMethods(['fetchFeaturesData'])
            ->disableOriginalConstructor()
            ->getMock();


        $jsonFeatures = ["entities" => ["Category" => ["push" => true]]];
        $controller->expects($this->once())->method('fetchFeaturesData')->willReturn($jsonFeatures);

        /** @var Features $features */
        $features = $controller->features();

        $this->assertInstanceOf(Features::class, $features);
        $this->assertCount(1, $features->getEntities());
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
     * @throws DefinitionException
     * @throws \ReflectionException
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
     * @throws ApplicationException
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
     * @throws ApplicationException
     */
    public function testAuthTokenIsInvalid()
    {
        $_SERVER['REMOTE_ADDR'] = '';

        $this->expectExceptionObject(AuthenticationException::failed());
        $tokenValidator = $this->createMock(TokenValidatorInterface::class);
        $tokenValidator->expects($this->once())->method('validate')->willReturn(false);
        $controller = $this->createConnectorController(null, null, null, $tokenValidator);

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


        $connector = $this->createConnectorController(null, null, null, $tokenValidator);

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

        $response = $controller->clear(null);
        $this->assertTrue($response);
    }
}

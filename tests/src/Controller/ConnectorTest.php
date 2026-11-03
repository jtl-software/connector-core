<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Test\Controller;

use InvalidArgumentException;
use Jawira\CaseConverter\CaseConverterException;
use Jtl\Connector\Core\Application\Application;
use Jtl\Connector\Core\Authentication\TokenValidatorInterface;
use Jtl\Connector\Core\Connector\ConnectorInterface;
use Jtl\Connector\Core\Controller\ConnectorController;
use Jtl\Connector\Core\Exception\AuthenticationException;
use Jtl\Connector\Core\Exception\DefinitionException;
use Jtl\Connector\Core\Exception\JsonException;
use Jtl\Connector\Core\Linker\ChecksumLinker;
use Jtl\Connector\Core\Linker\IdentityLinker;
use Jtl\Connector\Core\Model\Ack;
use Jtl\Connector\Core\Model\Authentication;
use Jtl\Connector\Core\Model\Features;
use Jtl\Connector\Core\Model\Session;
use Jtl\Connector\Core\Test\TestCase;
use PHPUnit\Framework\Attributes\RunInSeparateProcess;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\MockObject\CannotUseOnlyMethodsException;
use Psr\Log\LoggerInterface;
use SessionHandlerInterface;

class ConnectorTest extends TestCase
{
    /**
     * @return void
     * @throws CannotUseOnlyMethodsException
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws \JsonException
     * @throws JsonException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testFeatures(): void
    {
        $controller = $this->getMockBuilder(ConnectorController::class)
                           ->onlyMethods(['fetchFeaturesData'])
                           ->disableOriginalConstructor()
                           ->getMock();


        $jsonFeatures = ['entities' => ['Category' => ['push' => true]]];
        $controller->expects($this->once())->method('fetchFeaturesData')->willReturn($jsonFeatures);

        $features = $controller->features();

        $this->assertInstanceOf(Features::class, $features);
        $this->assertCount(1, $features->getEntities());
    }

    /**
     * @return void
     * @throws CaseConverterException
     * @throws DefinitionException
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testAckEmpty(): void
    {
        $connector = $this->createConnectorController();
        $this->assertTrue($connector->ack(new Ack()));
    }

    /**
     * @param IdentityLinker|null          $linker
     * @param ChecksumLinker|null          $checksumLinker
     * @param SessionHandlerInterface|null $sessionHandler
     * @param TokenValidatorInterface|null $tokenValidator
     * @param string                       $featuresPath
     *
     * @return ConnectorController
     */
    protected function createConnectorController(
        ?IdentityLinker           $linker = null,
        ?ChecksumLinker           $checksumLinker = null,
        ?\SessionHandlerInterface $sessionHandler = null,
        ?TokenValidatorInterface  $tokenValidator = null,
        string                   $featuresPath = ''
    ): ConnectorController {
        if (\is_null($linker)) {
            $linker = $this->createMock(IdentityLinker::class);
        }

        if (\is_null($checksumLinker)) {
            $checksumLinker = $this->createMock(ChecksumLinker::class);
        }

        if (\is_null($sessionHandler)) {
            $sessionHandler = $this->createMock(\SessionHandlerInterface::class);
        }

        if (\is_null($tokenValidator)) {
            $tokenValidator = $this->createMock(TokenValidatorInterface::class);
        }

        return new ConnectorController(
            $featuresPath,
            $checksumLinker,
            $linker,
            $sessionHandler,
            $tokenValidator
        );
    }

    /**
     * @return void
     * @throws CaseConverterException
     * @throws DefinitionException
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testAckInvalidModelName(): void
    {
        $linker = $this->createMock(IdentityLinker::class);
        $linker->expects($this->exactly(3))->method('save')->willReturn(true);
        $connector = $this->createConnectorController($linker);
        $ack       = new Ack();
        $ack->setIdentities(
            [
                'Foo'      => [$this->createIdentity()],
                'Category' => [$this->createIdentity(), $this->createIdentity(), $this->createIdentity()],
            ]
        );

        $this->assertTrue($connector->ack($ack));
    }

    /**
     * @return void
     * @throws AuthenticationException
     * @throws \Psr\Log\InvalidArgumentException
     */
    public function testAuthMissingToken(): void
    {
        $connector = $this->createConnectorController();

        $this->expectExceptionObject(AuthenticationException::tokenMissing());

        $auth = new Authentication();

        $connector->auth($auth);
    }

    /**
     * @return void
     * @throws AuthenticationException
     * @throws \Psr\Log\InvalidArgumentException
     */
    public function testAuthTokenIsInvalid(): void
    {
        $_SERVER['REMOTE_ADDR'] = '';
        $this->expectExceptionObject(AuthenticationException::failed());
        $tokenValidator = $this->createMock(TokenValidatorInterface::class);

        $tokenValidator
            ->expects($this->once())
            ->method('validate');

        $controller = $this->createConnectorController(null, null, null, $tokenValidator);

        $auth = (new Authentication())
            ->setToken(\md5((string)\time()));

        $controller->auth($auth);
    }

    /**
     * @return void
     * @throws AuthenticationException
     * @throws Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \Psr\Log\InvalidArgumentException
     */
    public function testAuthCorrect(): void
    {
        $tokenValidator = $this->createMock(TokenValidatorInterface::class);

        $tokenValidator
            ->expects($this->once())
            ->method('validate')
            ->willReturn(true);

        $connector = $this->createConnectorController(null, null, null, $tokenValidator);

        $auth = new Authentication();
        $auth->setToken(\md5((string)\time()));

        $session = $connector->auth($auth);

        $this->assertInstanceOf(Session::class, $session);
        $this->assertNotEmpty($session->getLifetime());
    }

    /**
     * The submitted token must never be written to the log (CO-3709).
     *
     * @return void
     * @throws AuthenticationException
     * @throws \Psr\Log\InvalidArgumentException
     */
    public function testAuthDoesNotLogSubmittedToken(): void
    {
        $_SERVER['REMOTE_ADDR'] = '203.0.113.7';
        $token                  = 'super-secret-token';

        $tokenValidator = $this->createMock(TokenValidatorInterface::class);
        $tokenValidator->method('validate')->willReturn(false);

        $logger = $this->createMock(LoggerInterface::class);
        $logger->expects($this->once())
               ->method('warning')
               ->with(
                   $this->logicalNot($this->stringContains('token')),
                   $this->callback(static fn(array $context): bool
                       => !\array_key_exists('token', $context) && !\in_array($token, $context, true))
               );

        $connector = $this->createConnectorController(null, null, null, $tokenValidator);
        $connector->setLogger($logger);

        $this->expectExceptionObject(AuthenticationException::failed());
        $connector->auth((new Authentication())->setToken($token));
    }

    /**
     * On success the session is marked authenticated and gets a fresh id, which is the one returned to JTL-Wawi.
     *
     * @return void
     * @throws AuthenticationException
     * @throws Exception
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \Psr\Log\InvalidArgumentException
     */
    #[RunInSeparateProcess]
    public function testAuthMarksAndRegeneratesSessionOnSuccess(): void
    {
        \ini_set('session.use_cookies', '0');
        \ini_set('session.cache_limiter', '');
        \session_id('pre-auth');
        \session_start();

        $tokenValidator = $this->createMock(TokenValidatorInterface::class);
        $tokenValidator->method('validate')->willReturn(true);
        $connector = $this->createConnectorController(null, null, null, $tokenValidator);

        $session = $connector->auth((new Authentication())->setToken(\md5((string)\time())));

        $this->assertNotSame('pre-auth', $session->getSessionId());
        $this->assertSame(\session_id(), $session->getSessionId());
        $this->assertTrue($_SESSION[Application::SESSION_AUTHENTICATED] ?? null);
        if (\session_status() === \PHP_SESSION_ACTIVE) {
            \session_abort();
        }
    }

    /**
     * @return void
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testIdentify(): void
    {
        $endpointVersion = '1.0';
        $platformName    = 'ConnectorPlatform';
        $platformVersion = '0.1';

        $connector = $this->createMock(ConnectorInterface::class);
        $connector->expects($this->once())->method('getEndpointVersion')->willReturn($endpointVersion);
        $connector->expects($this->once())->method('getPlatformVersion')->willReturn($platformVersion);
        $connector->expects($this->once())->method('getPlatformName')->willReturn($platformName);

        $controller              = $this->createConnectorController();
        $connectorIdentification = $controller->identify($connector);

        $this->assertSame($endpointVersion, $connectorIdentification->getEndpointVersion());
        $this->assertSame($platformName, $connectorIdentification->getPlatformName());
        $this->assertSame($platformVersion, $connectorIdentification->getPlatformVersion());
        $this->assertSame(Application::PROTOCOL_VERSION, $connectorIdentification->getProtocolVersion());
    }

    /**
     * @return void
     * @throws DefinitionException
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testClearSuccess(): void
    {
        $linker = $this->createMock(IdentityLinker::class);
        $linker->expects($this->once())->method('clear')->willReturn(true);
        $controller = $this->createConnectorController($linker);

        $response = $controller->clear(null);
        $this->assertTrue($response);
    }
}

<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Test\Application;

use Jtl\Connector\Core\Application\Application;
use Jtl\Connector\Core\Config\ArrayConfig;
use Jtl\Connector\Core\Config\ConfigSchema;
use Jtl\Connector\Core\Definition\ErrorCode;
use Jtl\Connector\Core\Definition\RpcMethod;
use Jtl\Connector\Core\Exception\SessionException;
use Jtl\Connector\Core\Logger\LoggerService;
use Jtl\Connector\Core\Session\SqliteSessionHandler;
use Jtl\Connector\Core\Test\TestCase;
use Monolog\Handler\TestHandler;
use Monolog\Level;
use PHPUnit\Framework\Attributes\RunInSeparateProcess;

/**
 * Regression tests for CO-3709: only a session that passed core.connector.auth may be replayed as jtlauth.
 */
class SessionAuthenticationTest extends TestCase
{
    /**
     * @return Application
     * @throws \Throwable
     */
    private function createApplication(): Application
    {
        return new Application($this->connectorDir, new ArrayConfig([]), new ConfigSchema());
    }

    /**
     * Writes a session row that carries the authenticated marker, the way a successful auth would.
     *
     * @param string $sessionId
     *
     * @return void
     * @throws \Throwable
     */
    private function seedAuthenticatedSession(string $sessionId): void
    {
        \session_set_save_handler(new SqliteSessionHandler($this->connectorDir . '/var'), true);
        \ini_set('session.use_cookies', '0');
        \ini_set('session.cache_limiter', '');
        \session_id($sessionId);
        \session_start();
        $_SESSION[Application::SESSION_AUTHENTICATED] = true;
        \session_write_close();
    }

    /**
     * Writes a session row without the authenticated marker, the way a failed auth would leave one behind.
     *
     * @param string $sessionId
     *
     * @return void
     * @throws \Throwable
     */
    private function seedUnauthenticatedSession(string $sessionId): void
    {
        (new SqliteSessionHandler($this->connectorDir . '/var'))->write($sessionId, '');
    }

    /**
     * @param Application $application
     * @param string      $rpcMethod
     *
     * @return void
     * @throws \ReflectionException
     */
    private function invokeStartSession(Application $application, string $rpcMethod): void
    {
        (new \ReflectionMethod($application, 'startSession'))->invoke($application, $rpcMethod);
    }

    /**
     * @return void
     * @throws \Throwable
     */
    #[RunInSeparateProcess]
    public function testStartSessionAcceptsAuthenticatedSession(): void
    {
        $this->seedAuthenticatedSession('auth-session');
        $_GET['jtlauth'] = 'auth-session';

        $this->invokeStartSession($this->createApplication(), 'manufacturer.pull');

        $this->assertSame(\PHP_SESSION_ACTIVE, \session_status());
        // the session id is the bearer credential, so cookies must stay disabled (jtlauth is the transport)
        $this->assertSame('0', \ini_get('session.use_cookies'));
        \session_abort();
    }

    /**
     * The plaintext session id is the bearer credential replayed as jtlauth, so it must never be written to the log.
     *
     * @return void
     * @throws \Throwable
     */
    #[RunInSeparateProcess]
    public function testStartSessionDoesNotLogThePlaintextSessionId(): void
    {
        $this->seedAuthenticatedSession('secret-session-id');
        $_GET['jtlauth'] = 'secret-session-id';

        $application = $this->createApplication();
        $sessionLog  = new TestHandler(Level::Debug);
        $application->getLoggerService()->get(LoggerService::CHANNEL_SESSION)->pushHandler($sessionLog);

        $this->invokeStartSession($application, 'manufacturer.pull');
        \session_abort();

        $this->assertNotEmpty($sessionLog->getRecords());
        $loggedHash = \hash('sha256', 'secret-session-id');
        $hashLogged = false;
        foreach ($sessionLog->getRecords() as $record) {
            $haystack = $record->message . ' ' . (string)\json_encode($record->context);
            $this->assertStringNotContainsString('secret-session-id', $haystack);
            if (\str_contains($haystack, $loggedHash)) {
                $hashLogged = true;
            }
        }
        $this->assertTrue($hashLogged, 'the session id should be logged only as a hash');
    }

    /**
     * The core of CO-3709: a session that exists but never passed authentication (e.g. created by a failed
     * core.connector.auth) must not be usable on any other method.
     *
     * @return void
     * @throws \Throwable
     */
    #[RunInSeparateProcess]
    public function testStartSessionRejectsExistingButUnauthenticatedSession(): void
    {
        $this->seedUnauthenticatedSession('no-marker');
        $_GET['jtlauth'] = 'no-marker';

        $this->expectException(SessionException::class);
        $this->expectExceptionCode(ErrorCode::INVALID_SESSION);

        try {
            $this->invokeStartSession($this->createApplication(), 'manufacturer.pull');
        } finally {
            if (\session_status() === \PHP_SESSION_ACTIVE) {
                \session_abort();
            }
        }
    }

    /**
     * The first core.connector.auth has no session yet, so it must be allowed through without the marker.
     *
     * @return void
     * @throws \Throwable
     */
    #[RunInSeparateProcess]
    public function testStartSessionAllowsAuthMethodWithoutExistingSession(): void
    {
        unset($_GET['jtlauth']);

        $this->invokeStartSession($this->createApplication(), RpcMethod::AUTH);

        $this->assertSame(\PHP_SESSION_ACTIVE, \session_status());
        $this->assertArrayNotHasKey(Application::SESSION_AUTHENTICATED, $_SESSION);
        \session_abort();
    }

    /**
     * @return void
     */
    #[RunInSeparateProcess]
    public function testMarkSessionAuthenticatedRegeneratesIdAndSetsMarker(): void
    {
        \ini_set('session.use_cookies', '0');
        \ini_set('session.cache_limiter', '');
        \session_id('before-auth');
        \session_start();

        Application::markSessionAuthenticated();

        $this->assertNotSame('before-auth', \session_id());
        $this->assertTrue($_SESSION[Application::SESSION_AUTHENTICATED] ?? null);
        if (\session_status() === \PHP_SESSION_ACTIVE) {
            \session_abort();
        }
    }

    /**
     * @return void
     */
    public function testMarkSessionAuthenticatedIsNoopWithoutActiveSession(): void
    {
        $_SESSION = [];

        Application::markSessionAuthenticated();

        $this->assertArrayNotHasKey(Application::SESSION_AUTHENTICATED, $_SESSION);
    }

    /**
     * @param Application $application
     *
     * @return void
     * @throws \ReflectionException
     */
    private function invokeCloseSession(Application $application): void
    {
        (new \ReflectionMethod($application, 'closeSession'))->invoke($application);
    }

    /**
     * @return void
     * @throws \Throwable
     */
    #[RunInSeparateProcess]
    public function testCloseSessionPersistsAuthenticatedSession(): void
    {
        \session_set_save_handler(new SqliteSessionHandler($this->connectorDir . '/var'), true);
        \ini_set('session.use_cookies', '0');
        \ini_set('session.cache_limiter', '');
        \session_id('persist-me');
        \session_start();
        $_SESSION[Application::SESSION_AUTHENTICATED] = true;

        $this->invokeCloseSession($this->createApplication());

        $this->assertSame(\PHP_SESSION_NONE, \session_status());
        $this->assertTrue((new SqliteSessionHandler($this->connectorDir . '/var'))->validateId('persist-me'));
    }

    /**
     * @return void
     * @throws \Throwable
     */
    #[RunInSeparateProcess]
    public function testCloseSessionDiscardsUnauthenticatedSession(): void
    {
        \session_set_save_handler(new SqliteSessionHandler($this->connectorDir . '/var'), true);
        \ini_set('session.use_cookies', '0');
        \ini_set('session.cache_limiter', '');
        \session_id('discard-me');
        \session_start();

        $this->invokeCloseSession($this->createApplication());

        $this->assertSame(\PHP_SESSION_NONE, \session_status());
        $this->assertFalse((new SqliteSessionHandler($this->connectorDir . '/var'))->validateId('discard-me'));
    }
}

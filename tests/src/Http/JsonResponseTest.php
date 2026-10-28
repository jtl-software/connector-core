<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Test\Http;

use Jtl\Connector\Core\Definition\Event;
use Jtl\Connector\Core\Event\RpcEvent;
use Jtl\Connector\Core\Http\JsonResponse;
use Jtl\Connector\Core\Model\Session;
use Jtl\Connector\Core\Rpc\Error;
use Jtl\Connector\Core\Rpc\RequestPacket;
use Jtl\Connector\Core\Rpc\ResponsePacket;
use Jtl\Connector\Core\Serializer\SerializerBuilder;
use Jtl\Connector\Core\Test\TestCase;
use Monolog\Handler\TestHandler;
use Monolog\Level;
use Monolog\Logger;
use PHPUnit\Framework\Attributes\DataProvider;
use Symfony\Component\EventDispatcher\EventDispatcher;

class JsonResponseTest extends TestCase
{
    private const string SESSION_ID = 'super-secret-session-id';

    /**
     * @param TestHandler $logHandler
     *
     * @return JsonResponse
     * @throws \Exception
     */
    private function createResponse(TestHandler $logHandler): JsonResponse
    {
        $response = new JsonResponse(new EventDispatcher(), SerializerBuilder::create()->build());
        $logger   = new Logger('test');
        $logger->pushHandler($logHandler);
        $response->setLogger($logger);

        return $response;
    }

    /**
     * @param TestHandler $logHandler
     *
     * @return string
     * @throws \Throwable
     */
    private function loggedMessages(TestHandler $logHandler): string
    {
        return \implode("\n", \array_map(static fn($record): string => $record->message, $logHandler->getRecords()));
    }

    /**
     * The auth response sent to JTL-Wawi contains the real session id, but the debug log must only contain a
     * redacted copy, because the id is the bearer credential replayed as jtlauth (CO-3709).
     *
     * @return void
     * @throws \Throwable
     */
    public function testAuthResponseSendsTheSessionIdButLogsItRedacted(): void
    {
        $sessionId  = 'super-secret-session-id';
        $logHandler = new TestHandler(Level::Debug);
        $response   = $this->createResponse($logHandler);

        $requestPacket  = (new RequestPacket())->setJtlrpc('2.0')->setId('1')->setMethod('core.connector.auth');
        $responsePacket = (new ResponsePacket())->setJtlrpc('2.0')->setId('1')
            ->setResult((new Session())->setSessionId($sessionId)->setLifetime(1440));

        \ob_start();
        $response->prepareAndSend($requestPacket, $responsePacket);
        $sent = (string)\ob_get_clean();

        $this->assertStringContainsString($sessionId, $sent);
        $logged = $this->loggedMessages($logHandler);
        $this->assertStringNotContainsString($sessionId, $logged);
        $this->assertStringContainsString('"result":"***"', $logged);
    }

    /**
     * A non-auth response carries no session credential and is logged exactly as it is sent.
     *
     * @return void
     * @throws \Throwable
     */
    public function testNonAuthResponseIsLoggedAsSent(): void
    {
        $logHandler = new TestHandler(Level::Debug);
        $response   = $this->createResponse($logHandler);

        $requestPacket  = (new RequestPacket())->setJtlrpc('2.0')->setId('1')->setMethod('core.connector.features');
        $responsePacket = (new ResponsePacket())->setJtlrpc('2.0')->setId('1')->setResult(['entities' => []]);

        \ob_start();
        $response->prepareAndSend($requestPacket, $responsePacket);
        $sent = (string)\ob_get_clean();

        $this->assertSame($sent, $this->loggedMessages($logHandler));
    }

    /**
     * A listener can reshape the auth result so the session id ends up at any depth or under any key. Fail closed: the
     * whole result is redacted from the logged copy, so none of these reshapes leak the id - the auth action never
     * falls back to logging the real body.
     *
     * @return array<string, array{0: mixed}>
     */
    public static function reshapedAuthResultProvider(): array
    {
        return [
            'non-array result' => ['sessionId=' . self::SESSION_ID],
            'nested array'     => [['payload' => ['sessionId' => self::SESSION_ID, 'lifetime' => 1]]],
            'renamed key'      => [['token' => self::SESSION_ID]],
        ];
    }

    /**
     * @param mixed $reshapedResult
     *
     * @return void
     * @throws \Throwable
     */
    #[DataProvider('reshapedAuthResultProvider')]
    public function testReshapedAuthResultIsNotLoggedInPlaintext(mixed $reshapedResult): void
    {
        $logHandler = new TestHandler(Level::Debug);
        $dispatcher = new EventDispatcher();
        // a plugin listener reshapes the auth result into a structure that still carries the id
        $dispatcher->addListener(
            Event::createRpcEventName(Event::AFTER),
            static function (RpcEvent $event) use ($reshapedResult): void {
                $event->setData($reshapedResult);
            }
        );
        $response = new JsonResponse($dispatcher, SerializerBuilder::create()->build());
        $logger   = new Logger('test');
        $logger->pushHandler($logHandler);
        $response->setLogger($logger);

        $requestPacket  = (new RequestPacket())->setJtlrpc('2.0')->setId('1')->setMethod('core.connector.auth');
        $responsePacket = (new ResponsePacket())->setJtlrpc('2.0')->setId('1')
            ->setResult((new Session())->setSessionId(self::SESSION_ID)->setLifetime(1440));

        \ob_start();
        $response->prepareAndSend($requestPacket, $responsePacket);
        \ob_get_clean();

        $logged = $this->loggedMessages($logHandler);
        $this->assertStringNotContainsString(self::SESSION_ID, $logged);
        $this->assertStringContainsString('"result":"***"', $logged);
    }

    /**
     * A failed auth returns only an error and no session id, so its response is logged as sent (not redacted to a
     * blank result): nothing is suppressed that would hide why the authentication failed.
     *
     * @return void
     * @throws \Throwable
     */
    public function testFailedAuthResponseIsLoggedAsSent(): void
    {
        $logHandler = new TestHandler(Level::Debug);
        $response   = $this->createResponse($logHandler);

        $requestPacket  = (new RequestPacket())->setJtlrpc('2.0')->setId('1')->setMethod('core.connector.auth');
        $responsePacket = (new ResponsePacket())->setJtlrpc('2.0')->setId('1')
            ->setError((new Error())->setCode(790)->setMessage('Authentication failed'));

        \ob_start();
        $response->prepareAndSend($requestPacket, $responsePacket);
        $sent = (string)\ob_get_clean();

        $logged = $this->loggedMessages($logHandler);
        $this->assertSame($sent, $logged);
        $this->assertStringContainsString('"code":790', $logged);
        $this->assertStringNotContainsString('"result":"***"', $logged);
    }
}

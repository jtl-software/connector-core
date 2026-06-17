<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Test\Utilities;

use Jtl\Connector\Core\Definition\RpcMethod;
use Jtl\Connector\Core\Exception\RateLimitException;
use Jtl\Connector\Core\Logger\LoggerService;
use Jtl\Connector\Core\Rpc\Warnings;
use Jtl\Connector\Core\Test\TestCase;
use Jtl\Connector\Core\Utilities\RateLimiter;
use Psr\Log\LogLevel;

class RateLimiterTest extends TestCase
{
    private RateLimiter $rateLimiter;

    /**
     * Set up test fixture
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $logDir = \sprintf('%s/var/log', $this->connectorDir);
        if (!\is_dir($logDir)) {
            \mkdir($logDir, 0o777, true);
        }
        $loggerService     = new LoggerService($logDir, LogLevel::DEBUG, new Warnings());
        $this->rateLimiter = new RateLimiter($this->connectorDir, $loggerService);
    }

    /**
     * Test: RateLimiter wird korrekt initialisiert
     *
     * @return void
     */
    public function testConstructorCreatesStorageDirectory(): void
    {
        $storageDir = \sprintf('%s/var/rate_limits', $this->connectorDir);
        $this->assertTrue(\is_dir($storageDir));
    }

    /**
     * Test: checkLimit() erlaubt Requests unter dem Limit
     *
     * @return void
     */
    public function testCheckLimitAllowsRequestsBelowLimit(): void
    {
        $this->rateLimiter->setGeneralLimit(5);
        $this->rateLimiter->checkLimit(RpcMethod::INIT, 'test-client');
        $this->assertTrue(true);
    }

    /**
     * Test: checkLimit() wirft Exception wenn Limit überschritten ist
     *
     * @return void
     */
    public function testCheckLimitThrowsExceptionWhenLimitExceeded(): void
    {
        $this->rateLimiter->setGeneralLimit(2);
        $this->rateLimiter->recordRequest(RpcMethod::INIT, 'test-client');
        $this->rateLimiter->recordRequest(RpcMethod::INIT, 'test-client');

        $this->expectException(RateLimitException::class);
        $this->rateLimiter->checkLimit(RpcMethod::INIT, 'test-client');
    }

    /**
     * Test: Auth-Methode hat niedrigeres Limit
     *
     * @return void
     */
    public function testAuthMethodHasLowerLimit(): void
    {
        $this->rateLimiter->setGeneralLimit(60);
        $this->rateLimiter->setAuthLimit(5);
        $this->assertEquals(60, $this->rateLimiter->getGeneralLimit());

        for ($i = 0; $i < 5; $i++) {
            $this->rateLimiter->recordRequest(RpcMethod::AUTH, 'test-client');
        }

        $this->expectException(RateLimitException::class);
        $this->rateLimiter->checkLimit(RpcMethod::AUTH, 'test-client');
    }

    /**
     * Test: recordRequest() speichert Request korrekt
     *
     * @return void
     */
    public function testRecordRequestSavesTimestamp(): void
    {
        $this->rateLimiter->recordRequest(RpcMethod::INIT, 'test-client');

        $files = \glob(\sprintf('%s/var/rate_limits/*.json', $this->connectorDir));
        $this->assertIsArray($files);
        $this->assertNotEmpty($files);
    }

    /**
     * Test: recordRequest() aktualisiert existierende Requests
     *
     * @return void
     */
    public function testRecordRequestAppendsToExisting(): void
    {
        $this->rateLimiter->recordRequest(RpcMethod::INIT, 'test-client');
        $this->rateLimiter->recordRequest(RpcMethod::INIT, 'test-client');
        $this->rateLimiter->recordRequest(RpcMethod::INIT, 'test-client');

        $files = \glob(\sprintf('%s/var/rate_limits/*.json', $this->connectorDir));
        $this->assertIsArray($files);
        $this->assertEquals(1, \count($files));

        $content = \file_get_contents($files[0]);
        $this->assertIsString($content);
        $data = \json_decode($content, true);
        $this->assertIsArray($data);
        $this->assertEquals(3, \count($data));
    }

    /**
     * Test: cleanup() entfernt alte Requests außerhalb des Fensters
     *
     * @return void
     */
    public function testCleanupRemovesExpiredRequests(): void
    {
        $this->rateLimiter->setWindowSeconds(1);
        $this->rateLimiter->recordRequest(RpcMethod::INIT, 'test-client');
        \sleep(2);
        $this->rateLimiter->cleanup();

        $files = \glob(\sprintf('%s/var/rate_limits/*.json', $this->connectorDir));
        $this->assertIsArray($files);
        $this->assertEmpty($files);
    }

    /**
     * Test: cleanup() behält gültige Requests
     *
     * @return void
     */
    public function testCleanupKeepsValidRequests(): void
    {
        $this->rateLimiter->setWindowSeconds(60);
        $this->rateLimiter->recordRequest(RpcMethod::INIT, 'test-client');
        $this->rateLimiter->cleanup();

        $files = \glob(\sprintf('%s/var/rate_limits/*.json', $this->connectorDir));
        $this->assertIsArray($files);
        $this->assertEquals(1, \count($files));
    }

    /**
     * Test: cleanup() ist sicher bei fehlendem Verzeichnis
     *
     * @return void
     */
    public function testCleanupSafeWithMissingDirectory(): void
    {
        $rateLimitDir = \sprintf('%s/var/rate_limits', $this->connectorDir);
        $this->removeDirRecursive($rateLimitDir);

        $this->rateLimiter->cleanup();
        $this->assertTrue(true);
    }

    /**
     * Test: Verschiedene Clients haben separate Limits
     *
     * @return void
     */
    public function testDifferentClientsHaveSeparateLimits(): void
    {
        $this->rateLimiter->setGeneralLimit(2);

        $this->rateLimiter->recordRequest(RpcMethod::INIT, 'client1');
        $this->rateLimiter->recordRequest(RpcMethod::INIT, 'client1');

        $this->rateLimiter->checkLimit(RpcMethod::INIT, 'client2');
        $this->rateLimiter->recordRequest(RpcMethod::INIT, 'client2');

        $this->rateLimiter->checkLimit(RpcMethod::INIT, 'client2');
        $this->assertTrue(true);
    }

    /**
     * Test: Verschiedene Methoden haben separate Counting
     *
     * @return void
     */
    public function testDifferentMethodsHaveSeparateCounting(): void
    {
        $this->rateLimiter->setGeneralLimit(2);

        $this->rateLimiter->recordRequest(RpcMethod::INIT, 'client');
        $this->rateLimiter->recordRequest(RpcMethod::INIT, 'client');

        $this->rateLimiter->checkLimit(RpcMethod::ACK, 'client');
        $this->rateLimiter->recordRequest(RpcMethod::ACK, 'client');

        $this->rateLimiter->checkLimit(RpcMethod::ACK, 'client');
        $this->assertTrue(true);
    }

    /**
     * Test: setGeneralLimit() ändert das Limit
     *
     * @return void
     */
    public function testSetGeneralLimit(): void
    {
        $this->assertEquals(60, $this->rateLimiter->getGeneralLimit());
        $this->rateLimiter->setGeneralLimit(100);
        $this->assertEquals(100, $this->rateLimiter->getGeneralLimit());
    }

    /**
     * Test: setAuthLimit() ändert das Auth-Limit
     *
     * @return void
     */
    public function testSetAuthLimit(): void
    {
        $this->assertEquals(5, $this->rateLimiter->getAuthLimit());
        $this->rateLimiter->setAuthLimit(10);
        $this->assertEquals(10, $this->rateLimiter->getAuthLimit());
    }

    /**
     * Test: setWindowSeconds() ändert das Zeitfenster
     *
     * @return void
     */
    public function testSetWindowSeconds(): void
    {
        $this->assertEquals(60, $this->rateLimiter->getWindowSeconds());
        $this->rateLimiter->setWindowSeconds(30);
        $this->assertEquals(30, $this->rateLimiter->getWindowSeconds());
    }

    /**
     * Test: setMethodLimitOverrides() registriert spezielle Limits pro Methode
     *
     * @return void
     */
    public function testSetMethodLimitOverrides(): void
    {
        $overrides = [
            'test.method1' => 10,
            'test.method2' => 20,
        ];

        $this->rateLimiter->setMethodLimitOverrides($overrides);
        $this->assertEquals($overrides, $this->rateLimiter->getMethodLimitOverrides());
    }

    /**
     * Test: Method Overrides werden respektiert
     *
     * @return void
     */
    public function testMethodLimitOverridesAreRespected(): void
    {
        $this->rateLimiter->setGeneralLimit(100);
        $this->rateLimiter->setMethodLimitOverrides(
            [
            'test.method' => 2,
            ]
        );

        $this->rateLimiter->recordRequest('test.method', 'client');
        $this->rateLimiter->recordRequest('test.method', 'client');

        $this->expectException(RateLimitException::class);
        $this->rateLimiter->checkLimit('test.method', 'client');
    }

    /**
     * Test: Fluent Interface funktioniert
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $result = $this->rateLimiter->setGeneralLimit(100)->setAuthLimit(10)->setWindowSeconds(30);

        $this->assertInstanceOf(RateLimiter::class, $result);
        $this->assertEquals(100, $this->rateLimiter->getGeneralLimit());
        $this->assertEquals(10, $this->rateLimiter->getAuthLimit());
        $this->assertEquals(30, $this->rateLimiter->getWindowSeconds());
    }

    /**
     * Test: recordRequest() mit null-Identifier verwendet getClientIdentifier()
     *
     * @return void
     */
    public function testRecordRequestUsesDefaultIdentifier(): void
    {
        $this->rateLimiter->recordRequest(RpcMethod::INIT);

        $files = \glob(\sprintf('%s/var/rate_limits/*.json', $this->connectorDir));
        $this->assertIsArray($files);
        $this->assertNotEmpty($files);
    }

    /**
     * Test: RateLimitException wird mit korrektem RetryAfter geworfen
     *
     * @return void
     */
    public function testRateLimitExceptionHasCorrectRetryAfter(): void
    {
        $this->rateLimiter->setGeneralLimit(1);
        $this->rateLimiter->setWindowSeconds(45);

        $this->rateLimiter->recordRequest(RpcMethod::INIT, 'client');

        try {
            $this->rateLimiter->checkLimit(RpcMethod::INIT, 'client');
            $this->fail('Expected RateLimitException');
        } catch (RateLimitException $e) {
            $this->assertEquals(45, $e->getRetryAfter());
        }
    }

    /**
     * Test: Cleanup mit corrupierten JSON-Daten
     *
     * @return void
     */
    public function testCleanupHandlesCorruptedJson(): void
    {
        $rateLimitDir = \sprintf('%s/var/rate_limits', $this->connectorDir);
        \file_put_contents(\sprintf('%s/corrupt.json', $rateLimitDir), 'invalid json {[}');

        $this->rateLimiter->cleanup();

        $this->assertFalse(\file_exists(\sprintf('%s/corrupt.json', $rateLimitDir)));
    }

    /**
     * Test: Getter-Methoden
     *
     * @return void
     */
    public function testGetterMethods(): void
    {
        $this->rateLimiter->setGeneralLimit(75);
        $this->rateLimiter->setAuthLimit(8);
        $this->rateLimiter->setWindowSeconds(45);

        $this->assertEquals(75, $this->rateLimiter->getGeneralLimit());
        $this->assertEquals(8, $this->rateLimiter->getAuthLimit());
        $this->assertEquals(45, $this->rateLimiter->getWindowSeconds());
    }

    /**
     * Test: Hilfsmethode von TestCase ist vorhanden
     *
     * @return void
     */
    public function testRemoveDirRecursiveWorksCorrectly(): void
    {
        $testDir = \sprintf('%s/test_remove_dir', $this->connectorDir);
        \mkdir($testDir);
        \file_put_contents(\sprintf('%s/test.txt', $testDir), 'test');

        $this->assertTrue(\is_dir($testDir));

        $this->removeDirRecursive($testDir);

        $this->assertFalse(\is_dir($testDir));
    }
}

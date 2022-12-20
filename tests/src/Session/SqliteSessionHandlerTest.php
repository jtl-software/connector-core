<?php

namespace Jtl\Connector\Core\Test\Session;

use Jtl\Connector\Core\Session\SqliteSessionHandler;
use Jtl\Connector\Core\Test\TestCase;

class SqliteSessionHandlerTest extends TestCase
{
    /**
     * @var string
     */
    protected $dbFile;

    /**
     * @var SqliteSessionHandler
     */
    protected $handler;

    /**
     * @var \PDO
     */
    protected $pdo;

    public function testConstruct(): void
    {
        $this->assertFileExists($this->dbFile);
    }

    public function testClose(): void
    {
        $this->assertTrue($this->handler->close());
    }

    public function testDestroy(): void
    {
        $sessionId   = \uniqid('wtfsess', true);
        $sessionData = $this->getFaker()->text;
        $expires     = \time() + 1;
        $this->assertTrue($this->insertSessionData($sessionId, $sessionData, $expires));
        $this->handler->destroy($sessionId);
        $this->assertNull($this->findSessionData($sessionId));
    }

    /**
     * @param string $sessionId
     * @param string $sessionData
     * @param int    $expires
     *
     * @return bool
     */
    protected function insertSessionData(string $sessionId, string $sessionData, int $expires): bool
    {
        $sql  = 'INSERT INTO session (sessionId, sessionData, sessionExpires) VALUES(:sid,:data,:expires)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue('sid', $sessionId, \PDO::PARAM_STR);
        $stmt->bindValue('data', \base64_encode($sessionData), \PDO::PARAM_STR);
        $stmt->bindValue('expires', $expires, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() === 1;
    }

    /**
     * @param string $sessionId
     *
     * @return array|null
     */
    protected function findSessionData(string $sessionId): ?array
    {
        $sql  = 'SELECT * FROM session WHERE sessionId = :sid';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue('sid', $sessionId, \PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        if (\is_array($data)) {
            $data['sessionData'] = \base64_decode($data['sessionData'], true);
            return $data;
        }
        return null;
    }

    public function testWriteInsert(): void
    {
        $sessionId   = \uniqid('wtfsess', true);
        $sessionData = $this->getFaker()->text;
        $now         = \time();
        $this->assertNull($this->findSessionData($sessionId));
        $this->handler->write($sessionId, $sessionData);
        $data = $this->findSessionData($sessionId);
        $this->assertIsArray($data);
        $this->assertEquals($sessionId, $data['sessionId']);
        $this->assertEquals($sessionData, $data['sessionData']);
        $this->assertGreaterThan($now, $data['sessionExpires']);
    }

    public function testWriteUpdate(): void
    {
        $sessionId   = \uniqid('wtfsess', true);
        $sessionData = $this->getFaker()->text;
        $expires     = \time() + 1;
        $this->assertTrue($this->insertSessionData($sessionId, $sessionData, $expires));
        $newData = $this->getFaker()->text . '213';
        $this->handler->write($sessionId, $newData);
        $data = $this->findSessionData($sessionId);
        $this->assertIsArray($data);
        $this->assertEquals($sessionId, $data['sessionId']);
        $this->assertEquals($newData, $data['sessionData']);
    }

    public function testGc(): void
    {
        foreach ([-2, -5, 4, 6, -7, -42] as $expireOffset) {
            $sessionId   = \uniqid('wtfsess', true);
            $sessionData = $this->getFaker()->text;
            $expires     = \time() + $expireOffset;
            $this->insertSessionData($sessionId, $sessionData, $expires);
        }
        $this->assertEquals(6, $this->countSessionData());
        $this->handler->gc(1234);
        $this->assertEquals(2, $this->countSessionData());
    }

    /**
     * @return integer
     */
    protected function countSessionData(): int
    {
        $sql = 'SELECT COUNT(sessionId) FROM session';
        return $this->pdo->query($sql)->fetchColumn();
    }

    public function testValidateIdSuccess(): void
    {
        $sessionId   = \uniqid('wtfsess', true);
        $sessionData = $this->getFaker()->text;
        $expires     = \time() + 1;
        $this->insertSessionData($sessionId, $sessionData, $expires);
        $this->assertTrue($this->handler->validateId($sessionId));
    }

    public function testValidateIdFailsSessionExpired(): void
    {
        $sessionId   = \uniqid('wtfsess', true);
        $sessionData = $this->getFaker()->text;
        $expires     = \time() - 1;
        $this->insertSessionData($sessionId, $sessionData, $expires);
        $this->assertFalse($this->handler->validateId($sessionId));
    }

    public function testValidateIdFailsSessionDoesNotExist(): void
    {
        $sessionId = \uniqid('wtfsess', true);
        $this->assertFalse($this->handler->validateId($sessionId));
    }

    public function testOpen(): void
    {
        $this->assertTrue($this->handler->open('foo', 'bar'));
    }

    public function testReadSuccess(): void
    {
        $sessionId   = \uniqid('wtfsess', true);
        $sessionData = $this->getFaker()->text;
        $expires     = \time() + 1;
        $this->insertSessionData($sessionId, $sessionData, $expires);
        $this->assertEquals($sessionData, $this->handler->read($sessionId));
    }

    public function testReadFailedSessionExpired(): void
    {
        $sessionId   = \uniqid('wtfsess', true);
        $sessionData = $this->getFaker()->text;
        $expires     = \time() - 1;
        $this->insertSessionData($sessionId, $sessionData, $expires);
        $this->assertEquals('', $this->handler->read($sessionId));
    }

    public function testReadFailedSessionNotExists(): void
    {
        $sessionId = \uniqid('wtfsess', true);
        $this->assertEquals('', $this->handler->read($sessionId));
    }

    public function testUpdateTimestamp(): void
    {
        $sessionId   = \uniqid('wtfsess', true);
        $sessionData = $this->getFaker()->text;
        $expires     = \time() + 1;
        $this->insertSessionData($sessionId, $sessionData, $expires);
        $this->assertTrue($this->handler->updateTimestamp($sessionId, $sessionData));
        $data = $this->findSessionData($sessionId);
        $this->assertIsArray($data);
        $this->assertGreaterThan($expires, $data['sessionExpires']);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->handler = new SqliteSessionHandler(\sprintf('%s/var', $this->connectorDir));
        $this->dbFile  = \sprintf('%s/var/connector.s3db', $this->connectorDir);
        $this->pdo     = new \PDO(
            \sprintf('sqlite:%s', $this->dbFile),
            null,
            null,
            [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]
        );
    }

    protected function tearDown(): void
    {
        $refl = new \ReflectionClass($this->handler);
        $prop = $refl->getProperty('db');
        $prop->setAccessible(true);
        $db = $prop->getValue($this->handler);
        $db->close();
        parent::tearDown();
    }
}

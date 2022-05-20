<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Session
 */

namespace Jtl\Connector\Core\Session;

use Jtl\Connector\Core\Exception\SessionException;
use Jtl\Connector\Core\Database\Sqlite3;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use ReturnTypeWillChange;

/**
 * Session Class
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
class SqliteSessionHandler implements SessionHandlerInterface, LoggerAwareInterface
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var int
     */
    private $lifetime;

    /**
     * @var Sqlite3
     */
    private $db;

    /**
     * SqliteSession constructor.
     * @param string $databaseDir
     * @throws SessionException
     */
    public function __construct(string $databaseDir)
    {
        if (!is_dir($databaseDir) && !mkdir($databaseDir)) {
            throw new SessionException('Could not create sqlite database directory');
        }
        $this->logger = new NullLogger();
        $this->lifetime = (int)ini_get('session.gc_maxlifetime');

        $dbLocation = sprintf('%s/connector.s3db', $databaseDir);
        $isNew = !file_exists($dbLocation);

        $sqlite3 = new Sqlite3();
        $sqlite3->connect(['location' => $dbLocation]);
        $this->db = $sqlite3;

        if ($isNew) {
            $this->initializeTables();
        }
    }

    /**
     * Open Session
     *
     * @param $savePath
     * @param $sessionName
     * @return bool
     */
    #[ReturnTypeWillChange]
    public function open($savePath, $sessionName)
    {
        $this->logger->debug('Open session with save path ({path}) and session name ({name})', ['path' => $savePath, 'name' => $sessionName]);

        return true;
    }

    /**
     * Close Sesssion
     */
    public function close(): bool
    {
        $this->logger->debug('Close session');

        return true;
    }

    /**
     * Read Session
     *
     * @param string $sessionId
     * @return false|string
     */
    #[ReturnTypeWillChange]
    public function read($sessionId)
    {
        $sessionId = $this->db->escapeString($sessionId);
        $this->logger->debug('Read session with id ({id})', ['id' => $sessionId]);

        $rows = $this->db->query($this->createReadQuery($sessionId, time()));
        if ($rows !== null && isset($rows[0])) {
            $row = $rows[0];
            if (isset($row['sessionData']) && strlen($row['sessionData']) > 0) {
                return base64_decode($row['sessionData'], true);
            }
        }

        return '';
    }

    /**
     * @param string $sessionId
     * @param string $sessionData
     * @return bool
     */
    #[ReturnTypeWillChange]
    public function write($sessionId, $sessionData)
    {
        $sessionId = $this->db->escapeString($sessionId);
        $sessionData = base64_encode($sessionData);
        $expire = $this->calculateExpiryTime();
        $this->logger->debug('Write session with id ({id})', ['id' => $sessionId]);

        $db = $this->db->getDb();
        $success = false;

        try {
            $stmt = $db->prepare('INSERT INTO session (sessionId, sessionExpires, sessionData) VALUES(:session_id, :expire, :data)');
            $stmt->bindValue(':session_id', $sessionId, \SQLITE3_TEXT);
            $stmt->bindValue(':expire', $expire, \SQLITE3_INTEGER);
            $stmt->bindValue(':data', $sessionData, \SQLITE3_TEXT);

            /** @var \SQLite3Stmt $stmt */
            $stmt->execute();
            $success = true;
        } catch (\Throwable $ex) {
            if ($db->lastErrorCode() === 19) {
                /** @var \SQLite3Stmt $stmt */
                $stmt = $db->prepare('UPDATE session SET sessionData = :data, sessionExpires = :expire WHERE sessionId = :session_id');
                $stmt->bindValue(':data', $sessionData, \SQLITE3_TEXT);
                $stmt->bindValue(':expire', $expire, \SQLITE3_INTEGER);
                $stmt->bindValue(':session_id', $sessionId, \SQLITE3_TEXT);
                $stmt->execute();
                $success = true;
            }
        }

        return $success;
    }

    /**
     * @param string $sessionId
     * @return bool
     */
    public function destroy($sessionId): bool
    {
        $sessionId = $this->db->escapeString($sessionId);
        $this->logger->debug('Destroy session with id ({id})', ['id' => $sessionId]);
        $this->db->query(sprintf('DELETE FROM session WHERE sessionId = \'%s\'', $sessionId));

        return true;
    }

    /**
     * @param int $maxLifetime
     * @return bool
     */
    #[ReturnTypeWillChange]
    public function gc($maxLifetime): bool
    {
        $this->logger->debug('Garbage collection for session with maximum lifetime ({maxLifetime})', ['maxLifetime' => $maxLifetime]);
        $this->db->query(sprintf('DELETE FROM session WHERE sessionExpires < %d', time()));

        return true;
    }

    /**
     * Checks if Session is Valid
     *
     * @param string $sessionId
     * @return boolean
     */
    public function validateId($sessionId): bool
    {
        $sessionId = $this->db->escapeString($sessionId);
        $this->logger->debug('Check session with id ({id}) and time ({time}) ...', ['id' => $sessionId, 'time' => time()]);
        $rows = $this->db->query($this->createReadQuery($sessionId, time()));
        if ($rows !== null && isset($rows[0]['sessionId']) && $rows[0]['sessionId'] === $sessionId) {
            return true;
        }

        return false;
    }

    /**
     * @param string $sessionId
     * @param string $sessionData
     * @return bool
     */
    public function updateTimestamp($sessionId, $sessionData): bool
    {
        $sql = 'UPDATE session SET sessionExpires = :sessionExpires WHERE sessionId = :sessionId';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':sessionExpires', $this->calculateExpiryTime(), \SQLITE3_INTEGER);
        $stmt->bindValue(':sessionId', $sessionId, \SQLITE3_TEXT);
        $stmt->execute();

        return true;
    }

    /**
     * @param LoggerInterface $logger
     *
     * @return void
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
        $this->db->setLogger($logger);
    }

    /**
     * @return integer
     */
    protected function calculateExpiryTime(): int
    {
        return time() + $this->lifetime;
    }


    /**
     * @param string $sessionId
     * @param integer $expiresAt
     * @return string
     */
    protected function createReadQuery(string $sessionId, int $expiresAt): string
    {
        return sprintf('SELECT sessionId, sessionData FROM session WHERE sessionId = \'%s\' AND sessionExpires >= %d', $this->db->escapeString($sessionId), $expiresAt);
    }

    /**
     * @return void
     * @throws \Exception
     */
    protected function initializeTables(): void
    {
        $schemaQueries = [
            'CREATE TABLE [session] (' . "\n" .
            '   [sessionId] VARCHAR(255)  UNIQUE NOT NULL,' . "\n" .
            '   [sessionExpires] INTEGER  NOT NULL,' . "\n" .
            '   [sessionData] BLOB  NULL' . "\n" .
            ')',

            'CREATE INDEX [sessionIndex] ON [session](' . "\n" .
            '  [sessionId]  ASC,' . "\n" .
            '  [sessionExpires]  ASC' . "\n" .
            ')'
        ];

        $checkQuery = 'SELECT name FROM sqlite_master WHERE type = \'table\' AND name = \'session\'';
        $checkResult = $this->db->fetchSingle($checkQuery);
        if ($checkResult === false) {
            throw new \Exception('Something went wrong while checking existence of session schema');
        } elseif ($checkResult === null) {
            foreach ($schemaQueries as $query) {
                $this->db->exec($query);
            }
        }
    }
}

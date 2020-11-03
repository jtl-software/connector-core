<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Session
 */

namespace Jtl\Connector\Core\Session;

use Jtl\Connector\Core\Exception\ApplicationException;
use Jtl\Connector\Core\Exception\SessionException;
use Jtl\Connector\Core\Database\Sqlite3;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

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
        $isNew = false;
        if (!is_dir($databaseDir)) {
            if (!mkdir($databaseDir)) {
                throw new SessionException('Could not create sqlite database directory');
            }
            $isNew = true;
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
    public function open($savePath, $sessionName)
    {
        $this->logger->debug('Open session with save path ({path}) and session name ({name})', ['path' => $savePath, 'name' => $sessionName]);

        return true;
    }

    /**
     * Close Sesssion
     */
    public function close()
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
    public function read($sessionId)
    {
        $sessionId = $this->db->escapeString($sessionId);
        $this->logger->debug('Read session with id ({id})', ['id' => $sessionId]);

        $rows = $this->db->query(sprintf("SELECT sessionData FROM session WHERE sessionId = '%s' AND sessionExpires >= %d", $sessionId, time()));
        if ($rows !== null && isset($rows[0])) {
            $row = $rows[0];
            if (isset($row["sessionData"]) && strlen($row["sessionData"]) > 0) {
                return base64_decode($row["sessionData"], true);
            }
        }

        return '';
    }

    /**
     * @param string $sessionId
     * @param string $sessionData
     * @return bool
     */
    public function write($sessionId, $sessionData)
    {
        $sessionId = $this->db->escapeString($sessionId);
        $sessionData = base64_encode($sessionData);
        $this->logger->debug('Write session with id ({id})', ['id' => $sessionId]);

        $rows = $this->db->query(sprintf("SELECT sessionData FROM session WHERE sessionId = '%s'", $sessionId));
        $stmt = $this->db->prepare("INSERT INTO session (sessionId, sessionExpires, sessionData) VALUES(:sessionId, :expire, :data)");
        if ($rows !== null && isset($rows[0])) {
            $stmt = $this->db->prepare("UPDATE session SET sessionData = :data, sessionExpires = :expire WHERE sessionId = :sessionId");
        }

        $stmt->bindValue(":sessionId", $sessionId, SQLITE3_TEXT);
        $stmt->bindValue(":expire", $this->calculateExpiryTime(), SQLITE3_INTEGER);
        $stmt->bindValue(":data", $sessionData, SQLITE3_TEXT);
        $stmt->execute();

        return true;
    }

    /**
     * @param string $sessionId
     * @return bool
     */
    public function destroy($sessionId)
    {
        $sessionId = $this->db->escapeString($sessionId);
        $this->logger->debug('Destroy session with id ({id})', ['id' => $sessionId]);
        $this->db->query(sprintf("DELETE FROM session WHERE sessionId = '%s'", $sessionId));

        return true;
    }

    /**
     * @param int $maxLifetime
     * @return bool
     */
    public function gc($maxLifetime)
    {
        $this->logger->debug('Garbage collection for session with maximum lifetime ({maxLifetime})', ['maxLifetime' => $maxLifetime]);
        $this->db->query(sprintf("DELETE FROM session WHERE sessionExpires < %d", time()));

        return true;
    }

    /**
     * Checks if Session is Valid
     *
     * @param string $sessionId
     * @return boolean
     */
    public function validateId($sessionId)
    {
        $sessionId = $this->db->escapeString($sessionId);
        $this->logger->debug('Check session with id ({id}) and time ({time}) ...', ['id' => $sessionId, 'time' => time()]);

        $rows = $this->db->query(sprintf("SELECT sessionId FROM session WHERE sessionId = '%s' AND sessionExpires >= %d", $sessionId, time()));
        if ($rows !== null && isset($rows[0]['sessionId']) && $rows[0]['sessionId'] === $sessionId) {
            $this->logger->debug('Session is valid');

            return true;
        }

        $this->logger->debug('Session is invalid');

        return false;
    }

    /**
     * @param string $sessionId
     * @param string $sessionData
     * @return bool
     */
    public function updateTimestamp($sessionId, $sessionData)
    {
        $sql = 'UPDATE session SET sessionExpires = :sessionExpires WHERE sessionId = :sessionId';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':sessionExpires', $this->calculateExpiryTime(), SQLITE3_INTEGER);
        $stmt->bindValue(':sessionId', $sessionId, SQLITE3_TEXT);
        $stmt->execute();

        return true;
    }

    /**
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return integer
     */
    protected function calculateExpiryTime(): int
    {
        return time() + $this->lifetime;
    }

    /**
     * @return void
     */
    protected function initializeTables(): void
    {
        $results = $this->db->fetch("SELECT name FROM sqlite_master WHERE type='table' AND name='session'");
        if (!is_array($results) || count($results) == 0) {
            $this->db->exec('
                CREATE TABLE [session] (
                    [sessionId] VARCHAR(255)  UNIQUE NOT NULL,
                    [sessionExpires] INTEGER  NOT NULL,
                    [sessionData] BLOB  NULL
                )
            ');

            $this->db->exec('
                CREATE INDEX [sessionIndex] ON [session](
                    [sessionId]  ASC,
                    [sessionExpires]  ASC
                )
            ');
        }
    }
}

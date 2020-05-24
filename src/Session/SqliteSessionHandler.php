<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Session
 */

namespace Jtl\Connector\Core\Session;

use Jtl\Connector\Core\Exception\ApplicationException;
use Jtl\Connector\Core\IO\Path;
use Jtl\Connector\Core\Logger\Logger;
use Jtl\Connector\Core\Database\Sqlite3;

/**
 * Session Class
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
class SqliteSessionHandler implements SessionHandlerInterface
{
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
     * @param string $connectorDir
     * @throws ApplicationException
     */
    public function __construct(string $connectorDir)
    {
        $dir = sprintf('%s/db', $connectorDir);
        if (!is_dir($dir)) {
            if (!mkdir($dir)) {
                throw new ApplicationException('Could not create sqlite database directory');
            }
        }

        $this->lifetime = (int)ini_get('session.gc_maxlifetime');

        $sqlite3 = new Sqlite3();
        $sqlite3->connect(['location' => sprintf('%s/connector.s3db', $dir)]);
        $this->db = $sqlite3;

        $this->initializeTables();
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

    /**
     * Open Session
     *
     * @param $savePath
     * @param $sessionName
     * @return bool
     */
    public function open($savePath, $sessionName)
    {
        Logger::write(sprintf('Open session with save path (%s) and session name (%s)', $savePath, $sessionName), Logger::DEBUG, Logger::CHANNEL_SESSION);

        return $this->db->isConnected();
    }

    /**
     * Close Sesssion
     */
    public function close()
    {
        Logger::write('Close session', Logger::DEBUG, Logger::CHANNEL_SESSION);

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

        $rows = $this->db->query("SELECT sessionData
					        			FROM session
					        			WHERE sessionId = '{$sessionId}'
                                            AND sessionExpires >= " . time());

        Logger::write(sprintf('Read session with id (%s)', $sessionId), Logger::DEBUG, Logger::CHANNEL_SESSION);

        if ($rows !== null && isset($rows[0])) {
            $row = $rows[0];
            if (isset($row["sessionData"]) && strlen($row["sessionData"]) > 0) {
                return base64_decode($row["sessionData"], true);
            }
        }

        return "";
    }

    /**
     * Write Session
     *
     * @param $sessionId
     * @param $sessionData
     * @return bool
     */
    public function write($sessionId, $sessionData)
    {
        $sessionId = $this->db->escapeString($sessionId);
        $sessionData = base64_encode($sessionData);

        $rows = $this->db->query("SELECT sessionData
									FROM session
								    WHERE sessionId = '{$sessionId}'");

        Logger::write(sprintf('Write session with id (%s)', $sessionId), Logger::DEBUG, Logger::CHANNEL_SESSION);

        if ($rows !== null && isset($rows[0])) {
            $stmt = $this->db->prepare("UPDATE session SET sessionData = :data, sessionExpires = :expire WHERE sessionId = :sessionId");
            $stmt->bindValue(":sessionId", $sessionId, SQLITE3_TEXT);
            $stmt->bindValue(":expire", $this->calculateExpiryTime(), SQLITE3_INTEGER);
            $stmt->bindValue(":data", $sessionData, SQLITE3_TEXT);

            /** @var \SQLite3Result $result */
            $result = $stmt->execute();
            if ($result) {
                return true;
            }
        } else {
            $stmt = $this->db->prepare("INSERT INTO session (sessionId, sessionExpires, sessionData) VALUES(:sessionId, :expire, :data)");
            $stmt->bindValue(":sessionId", $sessionId, SQLITE3_TEXT);
            $stmt->bindValue(":expire", $this->calculateExpiryTime(), SQLITE3_INTEGER);
            $stmt->bindValue(":data", $sessionData, SQLITE3_TEXT);

            $result = $stmt->execute();
            if ($result) {
                return true;
            }
        }

        return true;
    }

    /**
     * Destroy Session
     *
     * @param $sessionId
     * @return bool|Jtl\Connector\Core\Database\multitype|number|null
     */
    public function destroy($sessionId)
    {
        $sessionId = $this->db->escapeString($sessionId);

        Logger::write(sprintf('Destroy session with id (%s)', $sessionId), Logger::DEBUG, Logger::CHANNEL_SESSION);

        return $this->db->query("DELETE FROM session WHERE sessionId = '{$sessionId}'");
    }

    /**
     * Garbage Collector
     *
     * @param $maxLifetime
     * @return bool|Jtl\Connector\Core\Database\multitype|number|null
     */
    public function gc($maxLifetime)
    {
        Logger::write(sprintf('Garbage collection for session with maximum lifetime (%s)', $maxLifetime), Logger::DEBUG, Logger::CHANNEL_SESSION);

        return $this->db->query("DELETE FROM session WHERE sessionExpires < " . time());
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

        $rows = $this->db->query("SELECT sessionData
                                        FROM session
                                        WHERE sessionId = '{$sessionId}'
                                            AND sessionExpires >= " . time());

        Logger::write(sprintf('Check session with id (%s) and time (%s) ...', $sessionId, time()), Logger::DEBUG, Logger::CHANNEL_SESSION);

        if ($rows !== null && isset($rows[0])) {
            Logger::write('Session is valid', Logger::DEBUG, Logger::CHANNEL_SESSION);

            return true;
        }

        Logger::write('Session is invalid', Logger::DEBUG, Logger::CHANNEL_SESSION);

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
     * @return integer
     */
    protected function calculateExpiryTime(): int
    {
        return time() + $this->lifetime;
    }
}

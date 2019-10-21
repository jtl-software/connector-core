<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Session
 */

namespace jtl\Connector\Session;

use jtl\Connector\Core\Database\IDatabase;
use jtl\Connector\Core\Exception\ApplicationException;
use jtl\Connector\Core\IO\Path;
use jtl\Connector\Core\Logger\Logger;
use jtl\Connector\Database\Sqlite3;

/**
 * Session Class
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
final class SqliteSession implements \SessionHandlerInterface
{
    /**
     * @var int
     */
    private $_lifetime;
    
    public function __construct()
    {
        $dir = Path::combine(CONNECTOR_DIR, 'db');
        if (!is_dir($dir)) {
            if (!mkdir($dir)) {
                throw new ApplicationException('Could not create sqlite database directory');
            }
        }
    
        $this->_lifetime = ((int) ini_get('session.gc_maxlifetime') > 0) ? (int) ini_get('session.gc_maxlifetime') : 7200;
        $this->_sessionId = session_id();
        
        $sqlite3 = Sqlite3::getInstance();
        $sqlite3->connect(['location' => Path::combine($dir, 'connector.s3db')]);
        $sqlite3->check();
    }
    
    /**
     * Checks if Session is Valid
     *
     * @param string $sessionId
     * @return boolean
     */
    public function check(string $sessionId)
    {
        $sessionId = $this->_db->escapeString($sessionId);
        
        $rows = $this->_db->query("SELECT sessionData
                                        FROM session
                                        WHERE sessionId = '{$sessionId}'
                                            AND sessionExpires >= " . time());
        
        Logger::write(sprintf('Check session with id (%s) and time (%s) ...', $sessionId, time()), Logger::DEBUG, 'session');
        
        if ($rows !== null && isset($rows[0])) {
            Logger::write('Session is valid', Logger::DEBUG, 'session');
            
            return true;
        }
        
        Logger::write('Session is invalid', Logger::DEBUG, 'session');
        
        return false;
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
        Logger::write(sprintf('Open session with savePath (%s) and sessionName (%s)', $savePath, $sessionName), Logger::DEBUG, 'session');
        
        return $this->_db->isConnected();
    }
    
    /**
     * Close Sesssion
     */
    public function close()
    {
        Logger::write('Close session', Logger::DEBUG, 'session');
        
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
        $sessionId = $this->_db->escapeString($sessionId);
        
        $rows = $this->_db->query("SELECT sessionData
					        			FROM session
					        			WHERE sessionId = '{$sessionId}'
                                            AND sessionExpires >= " . time());
        
        Logger::write(sprintf('Read session with id (%s)', $sessionId), Logger::DEBUG, 'session');
        
        if ($rows !== null && isset($rows[0])) {
            $row = $rows[0];
            if (isset($row["sessionData"]) && strlen($row["sessionData"]) > 0) {
                return base64_decode($row["sessionData"]);
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
        $sessionId = $this->_db->escapeString($sessionId);
        $sessionData = base64_encode($sessionData);
        $newExpire = time() + $this->_lifetime;
        
        $rows = $this->_db->query("SELECT sessionData
									FROM session
								    WHERE sessionId = '{$sessionId}'");
        
        Logger::write(sprintf('Write session with id (%s)', $sessionId), Logger::DEBUG, 'session');
        
        if ($rows !== null && isset($rows[0])) {
            $stmt = $this->_db->prepare("UPDATE session SET sessionData=:data WHERE sessionId=:sessionid");
            $stmt->bindValue(":data", $sessionData, SQLITE3_TEXT);
            $stmt->bindValue(":sessionid", $sessionId, SQLITE3_TEXT);
            
            $result = $stmt->execute();
            if ($result) {
                return true;
            }
        } else {
            $stmt = $this->_db->prepare("INSERT INTO session (sessionId, sessionExpires, sessionData) VALUES(:sessionid, :expire, :data)");
            $stmt->bindValue(":sessionid", $sessionId, SQLITE3_TEXT);
            $stmt->bindValue(":expire", $newExpire, SQLITE3_INTEGER);
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
     */
    public function destroy($sessionId)
    {
        $sessionId = $this->_db->escapeString($sessionId);
        
        Logger::write(sprintf('Destroy session with id (%s)', $sessionId), Logger::DEBUG, 'session');
        
        return $this->_db->query("DELETE FROM session WHERE sessionId = '{$sessionId}'");
    }
    
    /**
     * Garbage Collector
     *
     * @param $maxLifetime
     */
    public function gc($maxLifetime)
    {
        Logger::write(sprintf('GC session with maxLifetime (%s)', $maxLifetime), Logger::DEBUG, 'session');
        
        return $this->_db->query("DELETE FROM session WHERE sessionExpires < " . time());
    }
}

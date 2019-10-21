<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Core\Session
 */
namespace jtl\Connector\Core\Session;

use \jtl\Connector\Core\Database\IDatabase;
use \jtl\Connector\Core\Database\Mapper;
use \jtl\Connector\Core\Exception\SessionException;
use jtl\Connector\Core\Http\Request;
use \jtl\Connector\Core\Logger\Logger;

/**
 * Session Handler
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
abstract class AbstractSessionHandler
{
    /**
     * Session Database Mapper
     *
     * @var \jtl\Connector\Core\Database\IDatabase
     */
    protected $_db;
    
    /**
     * Session GC Lifetime
     *
     * @var integer
     */
    protected $_lifetime;
    
    /**
     * Session Id
     *
     * @var string
     */
    protected $_sessionId;

    /**
     * Constructor
     *
     * @param  \jtl\Connector\Core\Database\IDatabase $db
     * @param  $sessionId Connector session ID
     * @param  $sessionName PHP session Name
     * @throws \jtl\Connector\Core\Exception\SessionException
     */
    public function __construct(IDatabase $db, string $sessionName = "jtlConnector")
    {
        $this->_db = $db;
        $this->_sessionId = Request::getSession();
        
        
        
        
    }
    
    /**
     * @param string $savePath
     * @param string $sessionName
     * @return mixed
     */
    abstract public function open(string $savePath, string $sessionName);
    
    /**
     * @return mixed
     */
    abstract public function close();
    
    /**
     * @param string $sessionId
     * @return mixed
     */
    abstract public function read(string $sessionId);
    
    /**
     * @param string $sessionId
     * @param string $sessionData
     * @return mixed
     */
    abstract public function write(string $sessionId, string $sessionData);
    
    /**
     * @param string $sessionId
     * @return mixed
     */
    abstract public function destroy(string $sessionId);
    
    /**
     * @param int $maxLifetime
     * @return mixed
     */
    abstract public function gc(int $maxLifetime);
    
    /**
     * @param string $sessionId
     * @return mixed
     */
    abstract public function check(string $sessionId);
    
    /**
     * SessionId Getter
     *
     * @return string
     */
    public function getSessionId()
    {
        return $this->_sessionId;
    }
    
    /**
     * Lifetime Getter
     *
     * @return number
     */
    public function getLifetime()
    {
        return $this->_lifetime;
    }
}

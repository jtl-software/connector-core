<?php 
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Session
 */

namespace jtl\Connector\Session;

use \jtl\Core\Exception\SessionException;

class SessionHelper
{
    protected $_namespace;
    
    public function __construct($namespace = "default")
    {
        if ($namespace === "") {
            throw new SessionException("Session namespace must be a non-empty string.");
        }
        
        if ($namespace[0] == "_") {
            throw new SessionException("Session namespace must not start with an underscore.");
        }
        
        if (preg_match('#(^[0-9])#i', $namespace[0])) {
            throw new SessionException("Session namespace must not start with a number.");
        }
        
        $this->_namespace = $namespace;
    }
    
    public function __set($name, $value)
    {
        if ($name === null || $name === "") {
            throw new SessionException("The '{$name}' key must be a non-empty string");
        }
        
        $_SESSION[$this->_namespace][$name] = $value;
    }
    
    public function __get($name)
    {
        if ($name === null || $name === "") {
            throw new SessionException("The '{$name}' key must be a non-empty string");
        }
        
        if (isset($_SESSION[$this->_namespace][$name])) {
            return $_SESSION[$this->_namespace][$name];
        }
        
        return null;
    }
}
?>
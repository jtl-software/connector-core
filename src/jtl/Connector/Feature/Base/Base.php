<?php

/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Feature
 */

namespace jtl\Connector\Feature\Base;

/**
 * Base class for all feature classes.
 *
 * @access public
 * @author David Spickers <david.spickers@jtl-software.de>
 */
abstract class Base
{

    /**
     * @var string
     */
    protected $_name;
    protected $_classes;

    /**
     * Returns the name.
     * 
     * @return string
     */
    final public function getName()
    {
        return $this->_name;
    }

    /**
     * Sets the name.
     * 
     * @param string $name
     * @return boolean
     */
    final public function setName($name)
    {
        if ($this->_name != $name) {
            $this->_name = $name;
            return true;
        }
        return false;
    }

    /**
     * Returning all class constants supported.
     * 
     * @param string $prefix
     * @param bool $only_keys
     * @param int $char_len
     * @return mixed
     */
    public function retrieveConstants($prefix = '', $only_keys = true, $char_len = 3)
    {
        $consts = array();
        $rc = new \ReflectionClass($this);
        $bconsts = $rc->getConstants();
        unset($rc);
        if (empty($prefix) && !$only_keys) {
            if (!empty($bconsts)) {
                foreach ($bconsts as $key => $value) {
                    if (substr($key, 0, $char_len) === $prefix) {
                        $consts[$key] = $value;
                    }
                }
            }
        }
        if ($only_keys) {
            return array_keys($consts);
        }
        return $consts;
    }

    /**
     * Returns all declared classes.
     * We need this way, because the autoloader will try to include the class
     * file if we use "class_exists" or similar functions.
     * 
     * @return array
     */
    public function getClasses()
    {
        if (!isset($this->_classes)) {
            $this->_classes = get_declared_classes();
        }
        return $this->_classes;
    }

}
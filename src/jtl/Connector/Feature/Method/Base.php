<?php

/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Feature
 */

namespace jtl\Connector\Feature\Method;

use jtl\Connector\Feature\Base\Base as BaseClass;
use jtl\Connector\Feature\Method\IMethod;

/**
 * Base method class.
 *
 * @access public
 * @author David Spickers <david.spickers@jtl-software.de>
 */
abstract class Base extends BaseClass implements IMethod
{

    /**
     * @var boolean
     */
    protected $_supported;

    /**
     * @var string
     */
    protected $_comment;

    /**
     * @var array of jtl\Connector\Feature\Feature\Feature
     */
    protected $_relations = array();

    /**
     * Create the instance of your extended method.
     * 
     * @param string $name The name of your method.
     * @param boolean $supported If the method fulfill itself, it will be 
     * true. Otherwise the supported flag will be false.
     * @param string $comment A comment about the extended method.
     */
    public function __construct($name, $supported = false, $comment = '')
    {
        $this->_supported = $supported;
        $this->_comment = $comment;
        parent::__construct($name);
    }

    /**
     * Returns if the method is supported.
     * 
     * @return boolean
     */
    public function isSupported()
    {
        return $this->_supported;
    }

    /**
     * Set's if the method is supported.
     * 
     * @param boolean $b True | False
     */
    public function setSupported($b)
    {
        $this->_supported = $b;
    }

    /**
     * Returns the comment.
     * 
     * @return string
     */
    public function getComment()
    {
        return $this->_comment;
    }

    /**
     * Set's the comment of a method.
     * 
     * @param string $c
     */
    public function setComment($c)
    {
        $this->_comment = $c;
    }

}
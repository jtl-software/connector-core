<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Type;

/**
 * Entity data model
 *
 * @access public
 * @package jtl\Connector\Type
 */
class PropertyInfo
{
    protected $name;
    protected $type;
    protected $defaultValue;
    protected $isPrimary;
    protected $isIdentity;
    protected $isNavigation;
    
    public function __construct ($name, $type, $defaultValue, $isPrimary, $isIdentity, $isNavigation)
    {
        $this->name = $name;
        $this->type = $type;
        $this->defaultValue = $defaultValue;
        $this->isPrimary = $isPrimary;
        $this->isIdentity = $isIdentity;
        $this->isNavigation = $isNavigation;
    }

    public function getName()
    {
        return $this->name;
    }
    
    public function getType()
    {
        return $this->type;
    }
    
    public function getDefaultValue()
    {
        return $this->defaultValue;
    }
    
    public function isPrimary()
    {
        return $this->isPrimary;
    }
    
    public function isIdentity()
    {
        return $this->isIdentity;
    }
    
    public function isNavigation()
    {
        return $this->isNavigation;
    }
}
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
    protected $nullable;
    
    public function __construct ($name, $type, $nullable)
    {
        $this->setName($name)
            ->setType($type)
            ->setNullable($nullable);
    }

    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    
    public function getType()
    {
        return $this->type;
    }
    
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }
    
    public function getNullable()
    {
        return $this->type;
    }
    
    public function setNullable($nullable)
    {
        $this->nullable = $nullable;
        return $this;
    }
}
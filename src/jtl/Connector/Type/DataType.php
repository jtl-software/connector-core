<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Type;

use jtl\Connector\Type\PropertyInfo;

/**
 * Entity data model
 *
 * @access public
 * @package jtl\Connector\Type
 */
abstract class DataType
{
    private $propertyInfo = null;
    
    protected Type() {}

    /**
     * Returns all the public properties of the current Type. 
     *
     * @return jtl\Connector\Type\PropertyInfo
     */
    public function getProperties()
    {
        if ($this->propertyInfo === null)
            $this->propertyInfo = $this->loadProperties();
            
        return $this->propertyInfo;
    }
    
    /**
     * Searches for the public property with the specified name.
     *
     * @param string $property
     * @return jtl\Connector\Type\PropertyInfo
     */
    public function getProperty($property)
    {
        foreach ($this->getProperties() as $property)
        {
            
        }
        
        return null;
    }
    
    abstract protected function loadProperties();
}
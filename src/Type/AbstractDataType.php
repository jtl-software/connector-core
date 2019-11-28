<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 */
namespace Jtl\Connector\Core\Type;

/**
 * Entity data model
 *
 * @access public
 * @package Jtl\Connector\Core\Type
 */
abstract class AbstractDataType
{
    /**
     * List of PropertyInfos
     * @var PropertyInfo[]
     */
    private $propertyInfo = null;

    /**
     * Returns all the public properties of the current Type.
     *
     * @return PropertyInfo[]
     */
    public function getProperties()
    {
        if (is_null($this->propertyInfo)) {
            $this->propertyInfo = $this->loadProperties();
        }
            
        return $this->propertyInfo;
    }
    
    /**
     * Searches for the public property with the specified name.
     *
     * @param string $propertyName
     * @return PropertyInfo
     */
    public function getProperty($propertyName)
    {
        foreach ($this->getProperties() as $property) {
            if ($property->getName() == $propertyName) {
                return $property;
            }
        }
        
        return null;
    }
    
    /**
     * @return PropertyInfo[]
     */
    abstract protected function loadProperties();
    abstract public function isMain();
}

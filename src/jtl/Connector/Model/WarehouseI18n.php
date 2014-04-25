<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

/**
 * Localized warehouse name.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */
class WarehouseI18n extends DataModel
{
    /**
     * @var Identity Reference to warehouse
     */
    protected $_warehouseId = null;
    
    /**
     * @var string Localized warehouse name
     */
    protected $_name = '';
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_warehouseId'
    );
    
    /**
     * WarehouseI18n Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            if ($value === null) {
                $this->$name = null;
                return;
            }
        
            switch ($name) {
                case "_warehouseId":
                
                    $this->$name = Identity::convert($value);
                    break;
            
                case "_name":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $warehouseId Reference to warehouse
     * @return \jtl\Connector\Model\WarehouseI18n
     */
    public function setWarehouseId(Identity $warehouseId)
    {
        $this->_warehouseId = $warehouseId;
        return $this;
    }
    
    /**
     * @return Identity Reference to warehouse
     */
    public function getWarehouseId()
    {
        return $this->_warehouseId;
    }
    /**
     * @param string $name Localized warehouse name
     * @return \jtl\Connector\Model\WarehouseI18n
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string Localized warehouse name
     */
    public function getName()
    {
        return $this->_name;
    }
}
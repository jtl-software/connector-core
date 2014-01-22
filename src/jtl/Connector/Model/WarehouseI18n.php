<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * WarehouseI18n Model
 * Localized warehouse name.
 *
 * @access public
 */
class WarehouseI18n extends DataModel
{
    /**
     * @var string Reference to warehouse
     */
    protected $_warehouseId = '';
    
    /**
     * @var string Localized warehouse name
     */
    protected $_name = '';
    
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
                case "_name":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $warehouseId Reference to warehouse
     * @return \jtl\Connector\Model\WarehouseI18n
     */
    public function setWarehouseId($warehouseId)
    {
        $this->_warehouseId = (string)$warehouseId;
        return $this;
    }
    
    /**
     * @return string Reference to warehouse
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
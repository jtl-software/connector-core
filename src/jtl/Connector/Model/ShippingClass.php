<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Shipping classes are usually defined in JTL-Wawi ERP.
 *
 * @access public
 * @subpackage GlobalData
 */
class ShippingClass extends DataModel
{
    /**
     * @var Identity Unique shippingClass id
     */
    protected $_id = null;
    
    /**
     * @var string Optional (internal) Shipping class name
     */
    protected $_name = '';
    
    /**
     * ShippingClass Setter
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
                case "_id":
                
                    $this->$name = ($value instanceof Identity) ? $value : null;
                    break;
            
                case "_name":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $id Unique shippingClass id
     * @return \jtl\Connector\Model\ShippingClass
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique shippingClass id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param string $name Optional (internal) Shipping class name
     * @return \jtl\Connector\Model\ShippingClass
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string Optional (internal) Shipping class name
     */
    public function getName()
    {
        return $this->_name;
    }
}
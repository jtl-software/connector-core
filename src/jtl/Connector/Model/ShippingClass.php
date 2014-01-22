<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ShippingClass Model
 * Shipping classes are usually defined in JTL-Wawi ERP.
 *
 * @access public
 */
class ShippingClass extends DataModel
{
    /**
     * @var string Unique shippingClass id
     */
    protected $_id = '';
    
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
                case "_name":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id Unique shippingClass id
     * @return \jtl\Connector\Model\ShippingClass
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string Unique shippingClass id
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
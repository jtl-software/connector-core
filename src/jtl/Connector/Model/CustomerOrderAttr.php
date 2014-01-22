<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CustomerOrderAttr Model
 * Monolingual attribute for a customerorder.
 *
 * @access public
 */
class CustomerOrderAttr extends DataModel
{
    /**
     * @var string Unique customerOrderAttr id
     */
    protected $_id = '';
    
    /**
     * @var string Reference to customerOrder
     */
    protected $_customerOrderId = '';
    
    /**
     * @var string Attribute key name
     */
    protected $_key = '';
    
    /**
     * @var string Attribute value
     */
    protected $_value = '';
    
    /**
     * CustomerOrderAttr Setter
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
                case "_customerOrderId":
                case "_key":
                case "_value":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id Unique customerOrderAttr id
     * @return \jtl\Connector\Model\CustomerOrderAttr
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string Unique customerOrderAttr id
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param string $customerOrderId Reference to customerOrder
     * @return \jtl\Connector\Model\CustomerOrderAttr
     */
    public function setCustomerOrderId($customerOrderId)
    {
        $this->_customerOrderId = (string)$customerOrderId;
        return $this;
    }
    
    /**
     * @return string Reference to customerOrder
     */
    public function getCustomerOrderId()
    {
        return $this->_customerOrderId;
    }
    
    /**
     * @param string $key Attribute key name
     * @return \jtl\Connector\Model\CustomerOrderAttr
     */
    public function setKey($key)
    {
        $this->_key = (string)$key;
        return $this;
    }
    
    /**
     * @return string Attribute key name
     */
    public function getKey()
    {
        return $this->_key;
    }
    
    /**
     * @param string $value Attribute value
     * @return \jtl\Connector\Model\CustomerOrderAttr
     */
    public function setValue($value)
    {
        $this->_value = (string)$value;
        return $this;
    }
    
    /**
     * @return string Attribute value
     */
    public function getValue()
    {
        return $this->_value;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}
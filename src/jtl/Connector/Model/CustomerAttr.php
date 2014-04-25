<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Customer
 */

namespace jtl\Connector\Model;

/**
 * Monolingual customer attribute.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Customer
 */
class CustomerAttr extends DataModel
{
    /**
     * @var Identity Unique customerAttr id
     */
    protected $_id = null;
    
    /**
     * @var Identity Reference to customer
     */
    protected $_customerId = null;
    
    /**
     * @var string Attribute key
     */
    protected $_key = '';
    
    /**
     * @var string Attribute value
     */
    protected $_value = '';
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_id',
        '_customerId'
    );
    
    /**
     * CustomerAttr Setter
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
                case "_customerId":
                
                    $this->$name = Identity::convert($value);
                    break;
            
                case "_key":
                case "_value":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $id Unique customerAttr id
     * @return \jtl\Connector\Model\CustomerAttr
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique customerAttr id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param Identity $customerId Reference to customer
     * @return \jtl\Connector\Model\CustomerAttr
     */
    public function setCustomerId(Identity $customerId)
    {
        $this->_customerId = $customerId;
        return $this;
    }
    
    /**
     * @return Identity Reference to customer
     */
    public function getCustomerId()
    {
        return $this->_customerId;
    }
    /**
     * @param string $key Attribute key
     * @return \jtl\Connector\Model\CustomerAttr
     */
    public function setKey($key)
    {
        $this->_key = (string)$key;
        return $this;
    }
    
    /**
     * @return string Attribute key
     */
    public function getKey()
    {
        return $this->_key;
    }
    /**
     * @param string $value Attribute value
     * @return \jtl\Connector\Model\CustomerAttr
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
}
<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage CustomerOrder
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Monolingual attribute for a customerorder.
 *
 * @access public
 * @subpackage CustomerOrder
 */
class CustomerOrderAttr extends DataModel
{
    /**
     * @var Identity Unique customerOrderAttr id
     */
    protected $_id = null;
    
    /**
     * @var Identity Reference to customerOrder
     */
    protected $_customerOrderId = null;
    
    /**
     * @var string Attribute key name
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
        'id',
        'customerOrderId'
    );
    
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
     * @param Identity $id Unique customerOrderAttr id
     * @return \jtl\Connector\Model\CustomerOrderAttr
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique customerOrderAttr id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param Identity $customerOrderId Reference to customerOrder
     * @return \jtl\Connector\Model\CustomerOrderAttr
     */
    public function setCustomerOrderId(Identity $customerOrderId)
    {
        $this->_customerOrderId = $customerOrderId;
        return $this;
    }
    
    /**
     * @return Identity Reference to customerOrder
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
}
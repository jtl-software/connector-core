<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Monolingual customer group attribute.
 *
 * @access public
 * @subpackage GlobalData
 */
class CustomerGroupAttr extends DataModel
{
    /**
     * @var Identity Unique customerGroupAttr id
     */
    protected $_id = null;
    
    /**
     * @var Identity Reference to customerGroup
     */
    protected $_customerGroupId = null;
    
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
        'id',
        'customerGroupId'
    );
    
    /**
     * CustomerGroupAttr Setter
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
                case "_customerGroupId":
                
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
     * @param Identity $id Unique customerGroupAttr id
     * @return \jtl\Connector\Model\CustomerGroupAttr
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique customerGroupAttr id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param Identity $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\CustomerGroupAttr
     */
    public function setCustomerGroupId(Identity $customerGroupId)
    {
        $this->_customerGroupId = $customerGroupId;
        return $this;
    }
    
    /**
     * @return Identity Reference to customerGroup
     */
    public function getCustomerGroupId()
    {
        return $this->_customerGroupId;
    }
    /**
     * @param string $key Attribute key
     * @return \jtl\Connector\Model\CustomerGroupAttr
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
     * @return \jtl\Connector\Model\CustomerGroupAttr
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
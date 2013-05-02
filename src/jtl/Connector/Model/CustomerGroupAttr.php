<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * CustomerGroupAttr Model
 * @access public
 */
abstract class CustomerGroupAttr extends Model
{
    /**
     * @var 
     */
    protected $_id;
    
    /**
     * @var string
     */
    protected $_customerGroupId;
    
    /**
     * @var int
     */
    protected $_key;
    
    /**
     * @var 
     */
    protected $_value;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\CustomerGroupAttr
     */
    public function setId($id)
    {
        $this->_id = ()$id;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param string $customerGroupId
     * @return \jtl\Connector\Model\CustomerGroupAttr
     */
    public function setCustomerGroupId($customerGroupId)
    {
        $this->_customerGroupId = (string)$customerGroupId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCustomerGroupId()
    {
        return $this->_customerGroupId;
    }
    
    /**
     * @param int $key
     * @return \jtl\Connector\Model\CustomerGroupAttr
     */
    public function setKey($key)
    {
        $this->_key = (int)$key;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getKey()
    {
        return $this->_key;
    }
    
    /**
     * @param  $value
     * @return \jtl\Connector\Model\CustomerGroupAttr
     */
    public function setValue($value)
    {
        $this->_value = ()$value;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getValue()
    {
        return $this->_value;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/CustomerGroupAttr/CustomerGroupAttr.json", $this->getPublic(array()));
    }
}
?>
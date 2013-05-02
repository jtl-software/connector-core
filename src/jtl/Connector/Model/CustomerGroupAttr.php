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
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_customerGroupId;
    
    /**
     * @var string
     */
    protected $_key;
    
    /**
     * @var string
     */
    protected $_value;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\CustomerGroupAttr
     */
    public function setId($id)
    {
        $this->_id = (int)$id;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param int $customerGroupId
     * @return \jtl\Connector\Model\CustomerGroupAttr
     */
    public function setCustomerGroupId($customerGroupId)
    {
        $this->_customerGroupId = (int)$customerGroupId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getCustomerGroupId()
    {
        return $this->_customerGroupId;
    }
    
    /**
     * @param string $key
     * @return \jtl\Connector\Model\CustomerGroupAttr
     */
    public function setKey($key)
    {
        $this->_key = (string)$key;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getKey()
    {
        return $this->_key;
    }
    
    /**
     * @param string $value
     * @return \jtl\Connector\Model\CustomerGroupAttr
     */
    public function setValue($value)
    {
        $this->_value = (string)$value;
        return $this;
    }
    
    /**
     * @return string
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
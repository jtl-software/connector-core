<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductFunctionAttr Model
 * Monolingual product function attribute.
 *
 * @access public
 */
class ProductFunctionAttr extends DataModel
{
    /**
     * @var string Unique productFunctionAttr id
     */
    protected $_id = '';
    
    /**
     * @var string Reference to product
     */
    protected $_productId = '';
    
    /**
     * @var string Attribute key
     */
    protected $_key = '';
    
    /**
     * @var string Attribute value
     */
    protected $_value = '';
    
    /**
     * ProductFunctionAttr Setter
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
                case "_productId":
                case "_key":
                case "_value":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id Unique productFunctionAttr id
     * @return \jtl\Connector\Model\ProductFunctionAttr
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string Unique productFunctionAttr id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param string $productId Reference to product
     * @return \jtl\Connector\Model\ProductFunctionAttr
     */
    public function setProductId($productId)
    {
        $this->_productId = (string)$productId;
        return $this;
    }
    
    /**
     * @return string Reference to product
     */
    public function getProductId()
    {
        return $this->_productId;
    }
    /**
     * @param string $key Attribute key
     * @return \jtl\Connector\Model\ProductFunctionAttr
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
     * @return \jtl\Connector\Model\ProductFunctionAttr
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
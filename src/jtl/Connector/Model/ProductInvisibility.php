<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductInvisibility Model
 * Specify product to hide from customerGroup.
 *
 * @access public
 */
class ProductInvisibility extends DataModel
{
    /**
     * @var string - Reference to customerGroup
     */
    protected $_customerGroupId = '';
    
    /**
     * @var string - Reference to product
     */
    protected $_productId = '';
    
    /**
     * ProductInvisibility Setter
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
                case "_customerGroupId":
                case "_productId":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $customerGroupId
     * @return \jtl\Connector\Model\ProductInvisibility
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
     * @param string $productId
     * @return \jtl\Connector\Model\ProductInvisibility
     */
    public function setProductId($productId)
    {
        $this->_productId = (string)$productId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getProductId()
    {
        return $this->_productId;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}
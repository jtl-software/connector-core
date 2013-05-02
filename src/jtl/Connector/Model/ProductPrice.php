<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * ProductPrice Model
 * @access public
 */
abstract class ProductPrice extends Model
{
    /**
     * @var string
     */
    protected $_customerGroupId;
    
    /**
     * @var 
     */
    protected $_productId;
    
    /**
     * @var int
     */
    protected $_netPrice;
    
    /**
     * @var 
     */
    protected $_quantity;
    
    /**
     * @param string $customerGroupId
     * @return \jtl\Connector\Model\ProductPrice
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
     * @param  $productId
     * @return \jtl\Connector\Model\ProductPrice
     */
    public function setProductId($productId)
    {
        $this->_productId = ()$productId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getProductId()
    {
        return $this->_productId;
    }
    
    /**
     * @param int $netPrice
     * @return \jtl\Connector\Model\ProductPrice
     */
    public function setNetPrice($netPrice)
    {
        $this->_netPrice = (int)$netPrice;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getNetPrice()
    {
        return $this->_netPrice;
    }
    
    /**
     * @param  $quantity
     * @return \jtl\Connector\Model\ProductPrice
     */
    public function setQuantity($quantity)
    {
        $this->_quantity = ()$quantity;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getQuantity()
    {
        return $this->_quantity;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/ProductPrice/ProductPrice.json", $this->getPublic(array()));
    }
}
?>
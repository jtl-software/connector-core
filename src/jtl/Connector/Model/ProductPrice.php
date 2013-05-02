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
     * @var int
     */
    protected $_customerGroupId;
    
    /**
     * @var int
     */
    protected $_productId;
    
    /**
     * @var double
     */
    protected $_netPrice;
    
    /**
     * @var int
     */
    protected $_quantity;
    
    /**
     * @param int $customerGroupId
     * @return \jtl\Connector\Model\ProductPrice
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
     * @param int $productId
     * @return \jtl\Connector\Model\ProductPrice
     */
    public function setProductId($productId)
    {
        $this->_productId = (int)$productId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getProductId()
    {
        return $this->_productId;
    }
    
    /**
     * @param double $netPrice
     * @return \jtl\Connector\Model\ProductPrice
     */
    public function setNetPrice($netPrice)
    {
        $this->_netPrice = (double)$netPrice;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getNetPrice()
    {
        return $this->_netPrice;
    }
    
    /**
     * @param int $quantity
     * @return \jtl\Connector\Model\ProductPrice
     */
    public function setQuantity($quantity)
    {
        $this->_quantity = (int)$quantity;
        return $this;
    }
    
    /**
     * @return int
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
        Schema::validateModel(CONNECTOR_DIR . "schema/productprice/productprice.json", $this->getPublic(array()));
    }
}
?>
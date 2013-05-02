<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * CustomerOrderPosition Model
 * @access public
 */
abstract class CustomerOrderPosition extends Model
{
    /**
     * @var 
     */
    protected $_id;
    
    /**
     * @var 
     */
    protected $_externalOrderPosition;
    
    /**
     * @var 
     */
    protected $_basketId;
    
    /**
     * @var 
     */
    protected $_productId;
    
    /**
     * @var 
     */
    protected $_shippingClassId;
    
    /**
     * @var int
     */
    protected $_name;
    
    /**
     * @var 
     */
    protected $_sku;
    
    /**
     * @var 
     */
    protected $_singlePrice;
    
    /**
     * @var 
     */
    protected $_price;
    
    /**
     * @var 
     */
    protected $_vat;
    
    /**
     * @var 
     */
    protected $_quantity;
    
    /**
     * @var 
     */
    protected $_type;
    
    /**
     * @var 
     */
    protected $_unique;
    
    /**
     * @var string
     */
    protected $_configItemId;
    
    /**
     * @var 
     */
    protected $_id;
    
    /**
     * @var string
     */
    protected $_customerOrderPositionId;
    
    /**
     * @var 
     */
    protected $_productVariationId;
    
    /**
     * @var 
     */
    protected $_productVariationValueId;
    
    /**
     * @var 
     */
    protected $_productVariationName;
    
    /**
     * @var 
     */
    protected $_productVariationValueName;
    
    /**
     * @var double
     */
    protected $_freeField;
    
    /**
     * @var 
     */
    protected $_surcharge;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\CustomerOrderPosition
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
     * @param  $externalOrderPosition
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setExternalOrderPosition($externalOrderPosition)
    {
        $this->_externalOrderPosition = ()$externalOrderPosition;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getExternalOrderPosition()
    {
        return $this->_externalOrderPosition;
    }
    
    /**
     * @param  $basketId
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setBasketId($basketId)
    {
        $this->_basketId = ()$basketId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getBasketId()
    {
        return $this->_basketId;
    }
    
    /**
     * @param  $productId
     * @return \jtl\Connector\Model\CustomerOrderPosition
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
     * @param  $shippingClassId
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setShippingClassId($shippingClassId)
    {
        $this->_shippingClassId = ()$shippingClassId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getShippingClassId()
    {
        return $this->_shippingClassId;
    }
    
    /**
     * @param int $name
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setName($name)
    {
        $this->_name = (int)$name;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getName()
    {
        return $this->_name;
    }
    
    /**
     * @param  $sku
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setSku($sku)
    {
        $this->_sku = ()$sku;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getSku()
    {
        return $this->_sku;
    }
    
    /**
     * @param  $singlePrice
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setSinglePrice($singlePrice)
    {
        $this->_singlePrice = ()$singlePrice;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getSinglePrice()
    {
        return $this->_singlePrice;
    }
    
    /**
     * @param  $price
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setPrice($price)
    {
        $this->_price = ()$price;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getPrice()
    {
        return $this->_price;
    }
    
    /**
     * @param  $vat
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setVat($vat)
    {
        $this->_vat = ()$vat;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getVat()
    {
        return $this->_vat;
    }
    
    /**
     * @param  $quantity
     * @return \jtl\Connector\Model\CustomerOrderPosition
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
     * @param  $type
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setType($type)
    {
        $this->_type = ()$type;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getType()
    {
        return $this->_type;
    }
    
    /**
     * @param  $unique
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setUnique($unique)
    {
        $this->_unique = ()$unique;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getUnique()
    {
        return $this->_unique;
    }
    
    /**
     * @param string $configItemId
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setConfigItemId($configItemId)
    {
        $this->_configItemId = (string)$configItemId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getConfigItemId()
    {
        return $this->_configItemId;
    }
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\CustomerOrderPosition
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
     * @param string $customerOrderPositionId
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setCustomerOrderPositionId($customerOrderPositionId)
    {
        $this->_customerOrderPositionId = (string)$customerOrderPositionId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCustomerOrderPositionId()
    {
        return $this->_customerOrderPositionId;
    }
    
    /**
     * @param  $productVariationId
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setProductVariationId($productVariationId)
    {
        $this->_productVariationId = ()$productVariationId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getProductVariationId()
    {
        return $this->_productVariationId;
    }
    
    /**
     * @param  $productVariationValueId
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setProductVariationValueId($productVariationValueId)
    {
        $this->_productVariationValueId = ()$productVariationValueId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getProductVariationValueId()
    {
        return $this->_productVariationValueId;
    }
    
    /**
     * @param  $productVariationName
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setProductVariationName($productVariationName)
    {
        $this->_productVariationName = ()$productVariationName;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getProductVariationName()
    {
        return $this->_productVariationName;
    }
    
    /**
     * @param  $productVariationValueName
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setProductVariationValueName($productVariationValueName)
    {
        $this->_productVariationValueName = ()$productVariationValueName;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getProductVariationValueName()
    {
        return $this->_productVariationValueName;
    }
    
    /**
     * @param double $freeField
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setFreeField($freeField)
    {
        $this->_freeField = (double)$freeField;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getFreeField()
    {
        return $this->_freeField;
    }
    
    /**
     * @param  $surcharge
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setSurcharge($surcharge)
    {
        $this->_surcharge = ()$surcharge;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getSurcharge()
    {
        return $this->_surcharge;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/CustomerOrderPosition/CustomerOrderPosition.json", $this->getPublic(array()));
    }
}
?>
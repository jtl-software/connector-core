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
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_externalOrderPosition;
    
    /**
     * @var int
     */
    protected $_basketId;
    
    /**
     * @var int
     */
    protected $_productId;
    
    /**
     * @var int
     */
    protected $_shippingClassId;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @var string
     */
    protected $_sku;
    
    /**
     * @var double
     */
    protected $_singlePrice;
    
    /**
     * @var double
     */
    protected $_price;
    
    /**
     * @var double
     */
    protected $_vat;
    
    /**
     * @var int
     */
    protected $_quantity;
    
    /**
     * @var int
     */
    protected $_type;
    
    /**
     * @var string
     */
    protected $_unique;
    
    /**
     * @var int
     */
    protected $_configItemId;
    
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_customerOrderPositionId;
    
    /**
     * @var int
     */
    protected $_productVariationId;
    
    /**
     * @var int
     */
    protected $_productVariationValueId;
    
    /**
     * @var string
     */
    protected $_productVariationName;
    
    /**
     * @var string
     */
    protected $_productVariationValueName;
    
    /**
     * @var string
     */
    protected $_freeField;
    
    /**
     * @var double
     */
    protected $_surcharge;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\CustomerOrderPosition
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
     * @param int $externalOrderPosition
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setExternalOrderPosition($externalOrderPosition)
    {
        $this->_externalOrderPosition = (int)$externalOrderPosition;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getExternalOrderPosition()
    {
        return $this->_externalOrderPosition;
    }
    
    /**
     * @param int $basketId
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setBasketId($basketId)
    {
        $this->_basketId = (int)$basketId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getBasketId()
    {
        return $this->_basketId;
    }
    
    /**
     * @param int $productId
     * @return \jtl\Connector\Model\CustomerOrderPosition
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
     * @param int $shippingClassId
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setShippingClassId($shippingClassId)
    {
        $this->_shippingClassId = (int)$shippingClassId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getShippingClassId()
    {
        return $this->_shippingClassId;
    }
    
    /**
     * @param string $name
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }
    
    /**
     * @param string $sku
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setSku($sku)
    {
        $this->_sku = (string)$sku;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getSku()
    {
        return $this->_sku;
    }
    
    /**
     * @param double $singlePrice
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setSinglePrice($singlePrice)
    {
        $this->_singlePrice = (double)$singlePrice;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getSinglePrice()
    {
        return $this->_singlePrice;
    }
    
    /**
     * @param double $price
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setPrice($price)
    {
        $this->_price = (double)$price;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getPrice()
    {
        return $this->_price;
    }
    
    /**
     * @param double $vat
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setVat($vat)
    {
        $this->_vat = (double)$vat;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getVat()
    {
        return $this->_vat;
    }
    
    /**
     * @param int $quantity
     * @return \jtl\Connector\Model\CustomerOrderPosition
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
     * @param int $type
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setType($type)
    {
        $this->_type = (int)$type;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getType()
    {
        return $this->_type;
    }
    
    /**
     * @param string $unique
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setUnique($unique)
    {
        $this->_unique = (string)$unique;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getUnique()
    {
        return $this->_unique;
    }
    
    /**
     * @param int $configItemId
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setConfigItemId($configItemId)
    {
        $this->_configItemId = (int)$configItemId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getConfigItemId()
    {
        return $this->_configItemId;
    }
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\CustomerOrderPosition
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
     * @param int $customerOrderPositionId
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setCustomerOrderPositionId($customerOrderPositionId)
    {
        $this->_customerOrderPositionId = (int)$customerOrderPositionId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getCustomerOrderPositionId()
    {
        return $this->_customerOrderPositionId;
    }
    
    /**
     * @param int $productVariationId
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setProductVariationId($productVariationId)
    {
        $this->_productVariationId = (int)$productVariationId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getProductVariationId()
    {
        return $this->_productVariationId;
    }
    
    /**
     * @param int $productVariationValueId
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setProductVariationValueId($productVariationValueId)
    {
        $this->_productVariationValueId = (int)$productVariationValueId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getProductVariationValueId()
    {
        return $this->_productVariationValueId;
    }
    
    /**
     * @param string $productVariationName
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setProductVariationName($productVariationName)
    {
        $this->_productVariationName = (string)$productVariationName;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getProductVariationName()
    {
        return $this->_productVariationName;
    }
    
    /**
     * @param string $productVariationValueName
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setProductVariationValueName($productVariationValueName)
    {
        $this->_productVariationValueName = (string)$productVariationValueName;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getProductVariationValueName()
    {
        return $this->_productVariationValueName;
    }
    
    /**
     * @param string $freeField
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setFreeField($freeField)
    {
        $this->_freeField = (string)$freeField;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getFreeField()
    {
        return $this->_freeField;
    }
    
    /**
     * @param double $surcharge
     * @return \jtl\Connector\Model\CustomerOrderPosition
     */
    public function setSurcharge($surcharge)
    {
        $this->_surcharge = (double)$surcharge;
        return $this;
    }
    
    /**
     * @return double
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
        Schema::validateModel(CONNECTOR_DIR . "schema/customerorderposition/customerorderposition.json", $this->getPublic(array()));
    }
}
?>
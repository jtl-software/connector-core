<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CustomerOrderItemVariation Model
 * customer order item variation
 *
 * @access public
 */
class CustomerOrderItemVariation extends DataModel
{
    /**
     * @var string - Unique customerOrderItemVariation id
     */
    protected $_id = '';
    
    /**
     * @var string - Reference to customerOrderItem
     */
    protected $_customerOrderItemId = '';
    
    /**
     * @var string - Reference to productVariation
     */
    protected $_productVariationId = '';
    
    /**
     * @var string - Reference to productVariationValue
     */
    protected $_productVariationValueId = '';
    
    /**
     * @var string - Variation name e.g. "color"
     */
    protected $_productVariationName = '';
    
    /**
     * @var string - Variation value e.g. "red"
     */
    protected $_productVariationValueName = '';
    
    /**
     * @var string - Optional custom text value for variation 
     */
    protected $_freeField = '';
    
    /**
     * @var double - Optional extra surcharge (added to item price)
     */
    protected $_surcharge = 0;
    
    /**
     * CustomerOrderItemVariation Setter
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
                case "_customerOrderItemId":
                case "_productVariationId":
                case "_productVariationValueId":
                case "_productVariationName":
                case "_productVariationValueName":
                case "_freeField":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_surcharge":
                
                    $this->$name = (double)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param string $customerOrderItemId
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
     */
    public function setCustomerOrderItemId($customerOrderItemId)
    {
        $this->_customerOrderItemId = (string)$customerOrderItemId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCustomerOrderItemId()
    {
        return $this->_customerOrderItemId;
    }
    
    /**
     * @param string $productVariationId
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
     */
    public function setProductVariationId($productVariationId)
    {
        $this->_productVariationId = (string)$productVariationId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getProductVariationId()
    {
        return $this->_productVariationId;
    }
    
    /**
     * @param string $productVariationValueId
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
     */
    public function setProductVariationValueId($productVariationValueId)
    {
        $this->_productVariationValueId = (string)$productVariationValueId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getProductVariationValueId()
    {
        return $this->_productVariationValueId;
    }
    
    /**
     * @param string $productVariationName
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
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
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
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
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
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
     * @return \jtl\Connector\Model\CustomerOrderItemVariation
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
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}
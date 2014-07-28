<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * Product variation value model. Each product defines its own variations and variation values. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ProductVariationValue extends DataModel
{
    /**
     * @type Identity Unique productVariationValue id
     */
    public $_id = null;

    /**
     * @type Identity Reference to productVariation
     */
    public $_productVariationId = null;

    /**
     * @type string 
     */
    public $_cName = '';

    /**
     * @type string 
     */
    public $_ean = '';

    /**
     * @type float|null 
     */
    public $_extraCharge = 0.0;

    /**
     * @type float|null 
     */
    public $_extraChargeNet = 0.0;

    /**
     * @type float|null Optional variation extra weight
     */
    public $_extraWeight = 0.0;

    /**
     * @type boolean 
     */
    public $_flagUpdate = false;

    /**
     * @type boolean 
     */
    public $_isActive = false;

    /**
     * @type string Optional Stock Keeping Unit
     */
    public $_sku = '';

    /**
     * @type integer|null Optional sort number
     */
    public $_sort = 0;

    /**
     * @type float|null Optional stock level
     */
    public $_stockLevel = 0.0;

    /**
     * Nav [ProductVariationValue » ZeroOrOne]
     *
     * @type \jtl\Connector\Model\ProductVariationValueDependency[]
     */
    public $_dependencies = array();

    /**
     * Nav [ProductVariationValue » One]
     *
     * @type \jtl\Connector\Model\ProductVariationValueExtraCharge[]
     */
    public $_extraCharges = array();

    /**
     * Nav [ProductVariationValue » One]
     *
     * @type \jtl\Connector\Model\ProductVariationValueI18n[]
     */
    public $_i18ns = array();

    /**
     * Nav [ProductVariationValue » One]
     *
     * @type \jtl\Connector\Model\ProductVariationValueInvisibility[]
     */
    public $_invisibilities = array();


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_id',
        '_productVariationId',
    );

    /**
     * @type array list of navigations
     */
    public $_navigations = array(
        '_dependencies' => '\jtl\Connector\Model\ProductVariationValueDependency',
        '_extraCharges' => '\jtl\Connector\Model\ProductVariationValueExtraCharge',
        '_i18ns' => '\jtl\Connector\Model\ProductVariationValueI18n',
        '_invisibilities' => '\jtl\Connector\Model\ProductVariationValueInvisibility',
    );

    /**
     * @return array 
     */
    public function getIdentities()
    {
        return $this->_identities;
    }

    /**
     * @return array 
     */
    public function getNavigations()
    {
        return $this->_navigations;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function setProperty($name, $value, $type)
    {
        if (!$this->validateType($value, $type)) {
            throw new InvalidArgumentException(sprintf("expected type %s, given value %s.", $type, gettype($value)));
        }
        $this->{$name} = $value;
        return $this;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function validateType($value, $type)
    {
        switch ($type)
        {
            case 'boolean':
                return is_bool($value);
            case 'integer':
                return is_integer($value);
            case 'float':
                return is_float($value);
            case 'string':
                return is_string($value);
            case 'array':
                return is_array($value);
            default:
                throw new InvalidArgumentException('type validator not found');
        }
    }

    /**
     * @param  float $extraCharge 
     * @return \jtl\Connector\Model\ProductVariationValue
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setExtraCharge($extraCharge)
    {
        return $this->setProperty('_extraCharge', $extraCharge, 'float');
    }
    
    /**
     * @return float 
     */
    public function getExtraCharge()
    {
        return $this->_extraCharge;
    }

    /**
     * @param  float $extraChargeNet 
     * @return \jtl\Connector\Model\ProductVariationValue
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setExtraChargeNet($extraChargeNet)
    {
        return $this->setProperty('_extraChargeNet', $extraChargeNet, 'float');
    }
    
    /**
     * @return float 
     */
    public function getExtraChargeNet()
    {
        return $this->_extraChargeNet;
    }

    /**
     * @param  float $extraWeight Optional variation extra weight
     * @return \jtl\Connector\Model\ProductVariationValue
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setExtraWeight($extraWeight)
    {
        return $this->setProperty('_extraWeight', $extraWeight, 'float');
    }
    
    /**
     * @return float Optional variation extra weight
     */
    public function getExtraWeight()
    {
        return $this->_extraWeight;
    }

    /**
     * @param  string $sku Optional Stock Keeping Unit
     * @return \jtl\Connector\Model\ProductVariationValue
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setSku($sku)
    {
        return $this->setProperty('_sku', $sku, 'string');
    }
    
    /**
     * @return string Optional Stock Keeping Unit
     */
    public function getSku()
    {
        return $this->_sku;
    }

    /**
     * @param  integer $sort Optional sort number
     * @return \jtl\Connector\Model\ProductVariationValue
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('_sort', $sort, 'integer');
    }
    
    /**
     * @return integer Optional sort number
     */
    public function getSort()
    {
        return $this->_sort;
    }

    /**
     * @param  float $stockLevel Optional stock level
     * @return \jtl\Connector\Model\ProductVariationValue
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setStockLevel($stockLevel)
    {
        return $this->setProperty('_stockLevel', $stockLevel, 'float');
    }
    
    /**
     * @return float Optional stock level
     */
    public function getStockLevel()
    {
        return $this->_stockLevel;
    }

    /**
     * @param  string $ean 
     * @return \jtl\Connector\Model\ProductVariationValue
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setEan($ean)
    {
        return $this->setProperty('_ean', $ean, 'string');
    }
    
    /**
     * @return string 
     */
    public function getEan()
    {
        return $this->_ean;
    }

    /**
     * @param  string $cName 
     * @return \jtl\Connector\Model\ProductVariationValue
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCName($cName)
    {
        return $this->setProperty('_cName', $cName, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCName()
    {
        return $this->_cName;
    }

    /**
     * @param  Identity $id Unique productVariationValue id
     * @return \jtl\Connector\Model\ProductVariationValue
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('_id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique productVariationValue id
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param  Identity $productVariationId Reference to productVariation
     * @return \jtl\Connector\Model\ProductVariationValue
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationId(Identity $productVariationId)
    {
        return $this->setProperty('_productVariationId', $productVariationId, 'Identity');
    }
    
    /**
     * @return Identity Reference to productVariation
     */
    public function getProductVariationId()
    {
        return $this->_productVariationId;
    }

    /**
     * @param  boolean $isActive 
     * @return \jtl\Connector\Model\ProductVariationValue
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsActive($isActive)
    {
        return $this->setProperty('_isActive', $isActive, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->_isActive;
    }

    /**
     * @param  boolean $flagUpdate 
     * @return \jtl\Connector\Model\ProductVariationValue
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setFlagUpdate($flagUpdate)
    {
        return $this->setProperty('_flagUpdate', $flagUpdate, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getFlagUpdate()
    {
        return $this->_flagUpdate;
    }

    /**
     * @param  \jtl\Connector\Model\ProductVariationValueDependency $dependency
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function addDependency(\jtl\Connector\Model\ProductVariationValueDependency $dependency)
    {
        $this->_dependencies[] = $dependency;
        return $this;
    }
    
    /**
     * @return ProductVariationValueDependency
     */
    public function getDependencies()
    {
        return $this->_dependencies;
    }

    /**
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function clearDependencies()
    {
        $this->_dependencies = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ProductVariationValueExtraCharge $extraCharge
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function addExtraCharge(\jtl\Connector\Model\ProductVariationValueExtraCharge $extraCharge)
    {
        $this->_extraCharges[] = $extraCharge;
        return $this;
    }
    
    /**
     * @return ProductVariationValueExtraCharge
     */
    public function getExtraCharges()
    {
        return $this->_extraCharges;
    }

    /**
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function clearExtraCharges()
    {
        $this->_extraCharges = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ProductVariationValueI18n $i18ns
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function addI18ns(\jtl\Connector\Model\ProductVariationValueI18n $i18ns)
    {
        $this->_i18ns[] = $i18ns;
        return $this;
    }
    
    /**
     * @return ProductVariationValueI18n
     */
    public function getI18ns()
    {
        return $this->_i18ns;
    }

    /**
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function clearI18ns()
    {
        $this->_i18ns = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ProductVariationValueInvisibility $invisibility
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function addInvisibility(\jtl\Connector\Model\ProductVariationValueInvisibility $invisibility)
    {
        $this->_invisibilities[] = $invisibility;
        return $this;
    }
    
    /**
     * @return ProductVariationValueInvisibility
     */
    public function getInvisibilities()
    {
        return $this->_invisibilities;
    }

    /**
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function clearInvisibilities()
    {
        $this->_invisibilities = array();
        return $this;
    }
}


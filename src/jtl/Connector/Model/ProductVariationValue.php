<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Product variation value model. Each product defines its own variations and variation values. .
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ProductVariationValue extends DataModel
{
    /**
     * @type Identity Unique productVariationValue id
     */
    protected $id = null;

    /**
     * @type Identity Reference to productVariation
     */
    protected $productVariationId = null;

    /**
     * @type string 
     */
    protected $cName = '';

    /**
     * @type string 
     */
    protected $ean = '';

    /**
     * @type float|null 
     */
    protected $extraCharge = 0.0;

    /**
     * @type float|null 
     */
    protected $extraChargeNet = 0.0;

    /**
     * @type float|null Optional variation extra weight
     */
    protected $extraWeight = 0.0;

    /**
     * @type boolean 
     */
    protected $flagUpdate = false;

    /**
     * @type boolean 
     */
    protected $isActive = false;

    /**
     * @type string Optional Stock Keeping Unit
     */
    protected $sku = '';

    /**
     * @type integer|null Optional sort number
     */
    protected $sort = 0;

    /**
     * @type float|null Optional stock level
     */
    protected $stockLevel = 0.0;

    /**
     * Nav [ProductVariationValue » ZeroOrOne]
     *
     * @type \jtl\Connector\Model\ProductVariationValueDependency[]
     */
    protected $dependencies = array();

    /**
     * Nav [ProductVariationValue » One]
     *
     * @type \jtl\Connector\Model\ProductVariationValueExtraCharge[]
     */
    protected $extraCharges = array();

    /**
     * Nav [ProductVariationValue » One]
     *
     * @type \jtl\Connector\Model\ProductVariationValueI18n[]
     */
    protected $i18ns = array();

    /**
     * Nav [ProductVariationValue » One]
     *
     * @type \jtl\Connector\Model\ProductVariationValueInvisibility[]
     */
    protected $invisibilities = array();


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'id',
        'productVariationId',
    );

    /**
     * @type array list of navigations
     */
    protected $navigations = array(
        'dependencies' => '\jtl\Connector\Model\ProductVariationValueDependency',
        'extraCharges' => '\jtl\Connector\Model\ProductVariationValueExtraCharge',
        'i18ns' => '\jtl\Connector\Model\ProductVariationValueI18n',
        'invisibilities' => '\jtl\Connector\Model\ProductVariationValueInvisibility',
    );

    /**
     * @return array 
     */
    public function getIdentities()
    {
        return $this->identities;
    }

    /**
     * @return array 
     */
    public function getNavigations()
    {
        return $this->navigations;
    }

    /**
     * @param  float $extraCharge 
     * @return \jtl\Connector\Model\ProductVariationValue
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setExtraCharge($extraCharge)
    {
        return $this->setProperty('extraCharge', $extraCharge, 'float');
    }
    
    /**
     * @return float 
     */
    public function getExtraCharge()
    {
        return $this->extraCharge;
    }

    /**
     * @param  float $extraChargeNet 
     * @return \jtl\Connector\Model\ProductVariationValue
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setExtraChargeNet($extraChargeNet)
    {
        return $this->setProperty('extraChargeNet', $extraChargeNet, 'float');
    }
    
    /**
     * @return float 
     */
    public function getExtraChargeNet()
    {
        return $this->extraChargeNet;
    }

    /**
     * @param  float $extraWeight Optional variation extra weight
     * @return \jtl\Connector\Model\ProductVariationValue
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setExtraWeight($extraWeight)
    {
        return $this->setProperty('extraWeight', $extraWeight, 'float');
    }
    
    /**
     * @return float Optional variation extra weight
     */
    public function getExtraWeight()
    {
        return $this->extraWeight;
    }

    /**
     * @param  string $sku Optional Stock Keeping Unit
     * @return \jtl\Connector\Model\ProductVariationValue
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setSku($sku)
    {
        return $this->setProperty('sku', $sku, 'string');
    }
    
    /**
     * @return string Optional Stock Keeping Unit
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param  integer $sort Optional sort number
     * @return \jtl\Connector\Model\ProductVariationValue
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('sort', $sort, 'integer');
    }
    
    /**
     * @return integer Optional sort number
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param  float $stockLevel Optional stock level
     * @return \jtl\Connector\Model\ProductVariationValue
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setStockLevel($stockLevel)
    {
        return $this->setProperty('stockLevel', $stockLevel, 'float');
    }
    
    /**
     * @return float Optional stock level
     */
    public function getStockLevel()
    {
        return $this->stockLevel;
    }

    /**
     * @param  string $ean 
     * @return \jtl\Connector\Model\ProductVariationValue
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setEan($ean)
    {
        return $this->setProperty('ean', $ean, 'string');
    }
    
    /**
     * @return string 
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * @param  string $cName 
     * @return \jtl\Connector\Model\ProductVariationValue
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCName($cName)
    {
        return $this->setProperty('cName', $cName, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCName()
    {
        return $this->cName;
    }

    /**
     * @param  Identity $id Unique productVariationValue id
     * @return \jtl\Connector\Model\ProductVariationValue
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique productVariationValue id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $productVariationId Reference to productVariation
     * @return \jtl\Connector\Model\ProductVariationValue
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationId(Identity $productVariationId)
    {
        return $this->setProperty('productVariationId', $productVariationId, 'Identity');
    }
    
    /**
     * @return Identity Reference to productVariation
     */
    public function getProductVariationId()
    {
        return $this->productVariationId;
    }

    /**
     * @param  boolean $isActive 
     * @return \jtl\Connector\Model\ProductVariationValue
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsActive($isActive)
    {
        return $this->setProperty('isActive', $isActive, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param  boolean $flagUpdate 
     * @return \jtl\Connector\Model\ProductVariationValue
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setFlagUpdate($flagUpdate)
    {
        return $this->setProperty('flagUpdate', $flagUpdate, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getFlagUpdate()
    {
        return $this->flagUpdate;
    }

    /**
     * @param  \jtl\Connector\Model\ProductVariationValueDependency $dependency
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function addDependency(\jtl\Connector\Model\ProductVariationValueDependency $dependency)
    {
        $this->dependencies[] = $dependency;
        return $this;
    }

    /**
     * @param  array $dependencies
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function addDependencies(array $dependencies)
    {
		$this->dependencies = array_merge($this->dependencies, $dependencies);
        return $this;
    }
    
    /**
     * @return ProductVariationValueDependency
     */
    public function getDependencies()
    {
        return $this->dependencies;
    }

    /**
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function clearDependencies()
    {
        $this->dependencies = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ProductVariationValueExtraCharge $extraCharge
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function addExtraCharge(\jtl\Connector\Model\ProductVariationValueExtraCharge $extraCharge)
    {
        $this->extraCharges[] = $extraCharge;
        return $this;
    }

    /**
     * @param  array $extraCharges
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function addExtraCharges(array $extraCharges)
    {
		$this->extraCharges = array_merge($this->extraCharges, $extraCharges);
        return $this;
    }
    
    /**
     * @return ProductVariationValueExtraCharge
     */
    public function getExtraCharges()
    {
        return $this->extraCharges;
    }

    /**
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function clearExtraCharges()
    {
        $this->extraCharges = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ProductVariationValueI18n $i18n
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function addI18n(\jtl\Connector\Model\ProductVariationValueI18n $i18n)
    {
        $this->i18ns[] = $i18n;
        return $this;
    }

    /**
     * @param  array $i18ns
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function addI18ns(array $i18ns)
    {
		$this->i18ns = array_merge($this->i18ns, $i18ns);
        return $this;
    }
    
    /**
     * @return ProductVariationValueI18n
     */
    public function getI18ns()
    {
        return $this->i18ns;
    }

    /**
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function clearI18ns()
    {
        $this->i18ns = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ProductVariationValueInvisibility $invisibility
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function addInvisibility(\jtl\Connector\Model\ProductVariationValueInvisibility $invisibility)
    {
        $this->invisibilities[] = $invisibility;
        return $this;
    }

    /**
     * @param  array $invisibilities
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function addInvisibilities(array $invisibilities)
    {
		$this->invisibilities = array_merge($this->invisibilities, $invisibilities);
        return $this;
    }
    
    /**
     * @return ProductVariationValueInvisibility
     */
    public function getInvisibilities()
    {
        return $this->invisibilities;
    }

    /**
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function clearInvisibilities()
    {
        $this->invisibilities = array();
        return $this;
    }
}


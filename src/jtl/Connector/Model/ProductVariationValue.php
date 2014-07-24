<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
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
    protected $_id = null;

    /**
     * @type Identity Reference to productVariation
     */
    protected $_productVariationId = null;

    /**
     * @type string 
     */
    protected $_ean = '';

    /**
     * @type float|null 
     */
    protected $_extraCharge = 0.0;

    /**
     * @type float|null 
     */
    protected $_extraChargeNet = 0.0;

    /**
     * @type float|null Optional variation extra weight
     */
    protected $_extraWeight = 0.0;

    /**
     * @type boolean 
     */
    protected $_flagUpdate = false;

    /**
     * @type boolean 
     */
    protected $_isActive = false;

    /**
     * @type string 
     */
    protected $_name = '';

    /**
     * @type string Optional Stock Keeping Unit
     */
    protected $_sku = '';

    /**
     * @type integer|null Optional sort number
     */
    protected $_sort = 0;

    /**
     * @type float|null Optional stock level
     */
    protected $_stockLevel = 0.0;

    /**
	 * Nav [ProductVariationValue » Many]
	 *
     * @type \jtl\Connector\Model\ProductVariation[]
     */
    protected $_variation = array();

    /**
	 * Nav [ProductVariationValue » ZeroOrOne]
	 *
     * @type \jtl\Connector\Model\ProductVariationValueDependency[]
     */
    protected $_dependencies = array();

    /**
	 * Nav [ProductVariationValue » One]
	 *
     * @type \jtl\Connector\Model\ProductVariationValueExtraCharge[]
     */
    protected $_extraCharges = array();

    /**
	 * Nav [ProductVariationValue » One]
	 *
     * @type \jtl\Connector\Model\ProductVariationValueI18n[]
     */
    protected $_i18ns = array();

    /**
	 * Nav [ProductVariationValue » One]
	 *
     * @type \jtl\Connector\Model\ProductVariationValueInvisibility[]
     */
    protected $_invisibilities = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
		'_productVariationId',
	);

	/**
	 * @param  string $name 
	 * @return \jtl\Connector\Model\ProductVariationValue
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setName($name)
	{
		if (!is_string($name))
			throw new InvalidArgumentException('string expected.');
		$this->_name = $name;
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
	 * @param  float $extraCharge 
	 * @return \jtl\Connector\Model\ProductVariationValue
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setExtraCharge($extraCharge)
	{
		if (!is_float($extraCharge))
			throw new InvalidArgumentException('float expected.');
		$this->_extraCharge = $extraCharge;
		return $this;
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
		if (!is_float($extraChargeNet))
			throw new InvalidArgumentException('float expected.');
		$this->_extraChargeNet = $extraChargeNet;
		return $this;
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
		if (!is_float($extraWeight))
			throw new InvalidArgumentException('float expected.');
		$this->_extraWeight = $extraWeight;
		return $this;
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
		if (!is_string($sku))
			throw new InvalidArgumentException('string expected.');
		$this->_sku = $sku;
		return $this;
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
		if (!is_integer($sort))
			throw new InvalidArgumentException('integer expected.');
		$this->_sort = $sort;
		return $this;
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
		if (!is_float($stockLevel))
			throw new InvalidArgumentException('float expected.');
		$this->_stockLevel = $stockLevel;
		return $this;
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
		if (!is_string($ean))
			throw new InvalidArgumentException('string expected.');
		$this->_ean = $ean;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getEan()
	{
		return $this->_ean;
	}

	/**
	 * @param  Identity $id Unique productVariationValue id
	 * @return \jtl\Connector\Model\ProductVariationValue
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
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
		
		$this->_productVariationId = $productVariationId;
		return $this;
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
		if (!is_bool($isActive))
			throw new InvalidArgumentException('boolean expected.');
		$this->_isActive = $isActive;
		return $this;
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
		if (!is_bool($flagUpdate))
			throw new InvalidArgumentException('boolean expected.');
		$this->_flagUpdate = $flagUpdate;
		return $this;
	}
	
	/**
	 * @return boolean 
	 */
	public function getFlagUpdate()
	{
		return $this->_flagUpdate;
	}

	/**
	 * @param  \jtl\Connector\Model\ProductVariation $variation
	 * @return \jtl\Connector\Model\ProductVariationValue
	 */
	public function addVariation(\jtl\Connector\Model\ProductVariation $variation)
	{
		$this->_variation[] = $variation;
		return $this;
	}
	
	/**
	 * @return ProductVariation
	 */
	public function getVariation()
	{
		return $this->_variation;
	}

	/**
	 * @return \jtl\Connector\Model\ProductVariationValue
	 */
	public function clearVariation()
	{
		$this->_variation = array();
		return $this;
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


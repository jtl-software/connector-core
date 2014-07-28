<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * A config Item that is displayed in a config Group. Config item can reference to a specific productId to inherit price, name and description. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ConfigItem extends DataModel
{
    /**
     * @type Identity Reference to configGroup
     */
    protected $_configGroupId = null;

    /**
     * @type Identity Optional reference to product
     */
    protected $_productId = null;

    /**
     * @type float|null 
     */
    protected $_fStandardpreis = 0.0;

    /**
     * @type integer Optional:Ignore multiplier. If true, quantity of config item will not be increased if product quantity is increased
     */
    protected $_ignoreMultiplier = 0;

    /**
     * @type integer|null Optional: Inherit product name and description  if productId is set. If true, configItem name will be received from referenced product and configItemI18n name will be ignored. 
     */
    protected $_inheritProductName = 0;

    /**
     * @type integer|null Optional: Inherit product price of referenced productId. If true, configItem price will be the same as referenced product price. 
     */
    protected $_inheritProductPrice = 0;

    /**
     * @type float|null Optional initial / predefined quantity. Default is one (1) quantity piece. 
     */
    protected $_initialQuantity = 0.0;

    /**
     * @type integer|null Optional: Preselect configItem. If true, configItem will be preselected or prechecked.
     */
    protected $_isPreSelected = 0;

    /**
     * @type integer|null Optional: Highlight or recommend config item. If true, configItem will be recommended/highlighted. 
     */
    protected $_isRecommended = 0;

    /**
     * @type float|null Maximum allowed quantity. Default 0 for no maximum limit. 
     */
    protected $_maxQuantity = 0.0;

    /**
     * @type float|null Optional minimum quantity required to add configItem. Default 0 for no minimum quantity. 
     */
    protected $_minQuantity = 0.0;

    /**
     * @type integer|null Optional: Show discount compared to productId price. If true, the discount compared to referenct product price will be shown.
     */
    protected $_showDiscount = 0;

    /**
     * @type integer|null Optional: Show surcharge compared to productId price.
     */
    protected $_showSurcharge = 0;

    /**
     * @type integer|null Optional sort order number
     */
    protected $_sort = 0;

    /**
     * @type integer|null Config item type. 0: Product, 1: Special
     */
    protected $_type = 0;


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_configGroupId',
		'_productId',
	);

	/**
	 * @param  integer $type Config item type. 0: Product, 1: Special
	 * @return \jtl\Connector\Model\ConfigItem
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setType($type)
	{
		if (!is_integer($type))
			throw new InvalidArgumentException('integer expected.');
		$this->_type = $type;
		return $this;
	}
	
	/**
	 * @return integer Config item type. 0: Product, 1: Special
	 */
	public function getType()
	{
		return $this->_type;
	}

	/**
	 * @param  integer $isPreSelected Optional: Preselect configItem. If true, configItem will be preselected or prechecked.
	 * @return \jtl\Connector\Model\ConfigItem
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setIsPreSelected($isPreSelected)
	{
		if (!is_integer($isPreSelected))
			throw new InvalidArgumentException('integer expected.');
		$this->_isPreSelected = $isPreSelected;
		return $this;
	}
	
	/**
	 * @return integer Optional: Preselect configItem. If true, configItem will be preselected or prechecked.
	 */
	public function getIsPreSelected()
	{
		return $this->_isPreSelected;
	}

	/**
	 * @param  integer $isRecommended Optional: Highlight or recommend config item. If true, configItem will be recommended/highlighted. 
	 * @return \jtl\Connector\Model\ConfigItem
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setIsRecommended($isRecommended)
	{
		if (!is_integer($isRecommended))
			throw new InvalidArgumentException('integer expected.');
		$this->_isRecommended = $isRecommended;
		return $this;
	}
	
	/**
	 * @return integer Optional: Highlight or recommend config item. If true, configItem will be recommended/highlighted. 
	 */
	public function getIsRecommended()
	{
		return $this->_isRecommended;
	}

	/**
	 * @param  integer $inheritProductName Optional: Inherit product name and description  if productId is set. If true, configItem name will be received from referenced product and configItemI18n name will be ignored. 
	 * @return \jtl\Connector\Model\ConfigItem
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setInheritProductName($inheritProductName)
	{
		if (!is_integer($inheritProductName))
			throw new InvalidArgumentException('integer expected.');
		$this->_inheritProductName = $inheritProductName;
		return $this;
	}
	
	/**
	 * @return integer Optional: Inherit product name and description  if productId is set. If true, configItem name will be received from referenced product and configItemI18n name will be ignored. 
	 */
	public function getInheritProductName()
	{
		return $this->_inheritProductName;
	}

	/**
	 * @param  integer $inheritProductPrice Optional: Inherit product price of referenced productId. If true, configItem price will be the same as referenced product price. 
	 * @return \jtl\Connector\Model\ConfigItem
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setInheritProductPrice($inheritProductPrice)
	{
		if (!is_integer($inheritProductPrice))
			throw new InvalidArgumentException('integer expected.');
		$this->_inheritProductPrice = $inheritProductPrice;
		return $this;
	}
	
	/**
	 * @return integer Optional: Inherit product price of referenced productId. If true, configItem price will be the same as referenced product price. 
	 */
	public function getInheritProductPrice()
	{
		return $this->_inheritProductPrice;
	}

	/**
	 * @param  integer $sort Optional sort order number
	 * @return \jtl\Connector\Model\ConfigItem
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
	 * @return integer Optional sort order number
	 */
	public function getSort()
	{
		return $this->_sort;
	}

	/**
	 * @param  integer $showDiscount Optional: Show discount compared to productId price. If true, the discount compared to referenct product price will be shown.
	 * @return \jtl\Connector\Model\ConfigItem
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setShowDiscount($showDiscount)
	{
		if (!is_integer($showDiscount))
			throw new InvalidArgumentException('integer expected.');
		$this->_showDiscount = $showDiscount;
		return $this;
	}
	
	/**
	 * @return integer Optional: Show discount compared to productId price. If true, the discount compared to referenct product price will be shown.
	 */
	public function getShowDiscount()
	{
		return $this->_showDiscount;
	}

	/**
	 * @param  integer $showSurcharge Optional: Show surcharge compared to productId price.
	 * @return \jtl\Connector\Model\ConfigItem
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setShowSurcharge($showSurcharge)
	{
		if (!is_integer($showSurcharge))
			throw new InvalidArgumentException('integer expected.');
		$this->_showSurcharge = $showSurcharge;
		return $this;
	}
	
	/**
	 * @return integer Optional: Show surcharge compared to productId price.
	 */
	public function getShowSurcharge()
	{
		return $this->_showSurcharge;
	}

	/**
	 * @param  float $minQuantity Optional minimum quantity required to add configItem. Default 0 for no minimum quantity. 
	 * @return \jtl\Connector\Model\ConfigItem
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setMinQuantity($minQuantity)
	{
		if (!is_float($minQuantity))
			throw new InvalidArgumentException('float expected.');
		$this->_minQuantity = $minQuantity;
		return $this;
	}
	
	/**
	 * @return float Optional minimum quantity required to add configItem. Default 0 for no minimum quantity. 
	 */
	public function getMinQuantity()
	{
		return $this->_minQuantity;
	}

	/**
	 * @param  float $maxQuantity Maximum allowed quantity. Default 0 for no maximum limit. 
	 * @return \jtl\Connector\Model\ConfigItem
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setMaxQuantity($maxQuantity)
	{
		if (!is_float($maxQuantity))
			throw new InvalidArgumentException('float expected.');
		$this->_maxQuantity = $maxQuantity;
		return $this;
	}
	
	/**
	 * @return float Maximum allowed quantity. Default 0 for no maximum limit. 
	 */
	public function getMaxQuantity()
	{
		return $this->_maxQuantity;
	}

	/**
	 * @param  float $initialQuantity Optional initial / predefined quantity. Default is one (1) quantity piece. 
	 * @return \jtl\Connector\Model\ConfigItem
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setInitialQuantity($initialQuantity)
	{
		if (!is_float($initialQuantity))
			throw new InvalidArgumentException('float expected.');
		$this->_initialQuantity = $initialQuantity;
		return $this;
	}
	
	/**
	 * @return float Optional initial / predefined quantity. Default is one (1) quantity piece. 
	 */
	public function getInitialQuantity()
	{
		return $this->_initialQuantity;
	}

	/**
	 * @param  float $fStandardpreis 
	 * @return \jtl\Connector\Model\ConfigItem
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setFStandardpreis($fStandardpreis)
	{
		if (!is_float($fStandardpreis))
			throw new InvalidArgumentException('float expected.');
		$this->_fStandardpreis = $fStandardpreis;
		return $this;
	}
	
	/**
	 * @return float 
	 */
	public function getFStandardpreis()
	{
		return $this->_fStandardpreis;
	}

	/**
	 * @param  integer $ignoreMultiplier Optional:Ignore multiplier. If true, quantity of config item will not be increased if product quantity is increased
	 * @return \jtl\Connector\Model\ConfigItem
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setIgnoreMultiplier($ignoreMultiplier)
	{
		if (!is_integer($ignoreMultiplier))
			throw new InvalidArgumentException('integer expected.');
		$this->_ignoreMultiplier = $ignoreMultiplier;
		return $this;
	}
	
	/**
	 * @return integer Optional:Ignore multiplier. If true, quantity of config item will not be increased if product quantity is increased
	 */
	public function getIgnoreMultiplier()
	{
		return $this->_ignoreMultiplier;
	}

	/**
	 * @param  Identity $configGroupId Reference to configGroup
	 * @return \jtl\Connector\Model\ConfigItem
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setConfigGroupId(Identity $configGroupId)
	{
		
		$this->_configGroupId = $configGroupId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to configGroup
	 */
	public function getConfigGroupId()
	{
		return $this->_configGroupId;
	}

	/**
	 * @param  Identity $productId Optional reference to product
	 * @return \jtl\Connector\Model\ConfigItem
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setProductId(Identity $productId)
	{
		
		$this->_productId = $productId;
		return $this;
	}
	
	/**
	 * @return Identity Optional reference to product
	 */
	public function getProductId()
	{
		return $this->_productId;
	}
}


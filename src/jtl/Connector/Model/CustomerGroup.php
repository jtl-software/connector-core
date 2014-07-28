<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Customer group model..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class CustomerGroup extends DataModel
{
    /**
     * @type Identity Unique customerGroup id
     */
    protected $_id = null;

    /**
     * @type integer|null Optional: Show net prices default instead of gross prices
     */
    protected $_applyNetPrice = 0;

    /**
     * @type float|null Optional percentual discount on all products. Negative Value means surcharge. 
     */
    protected $_discount = 0.0;

    /**
     * @type boolean Optional: Flag default customer group
     */
    protected $_isDefault = false;

    /**
     * @type integer|null 
     */
    protected $_kKundenDrucktext = 0;

    /**
     * @type string 
     */
    protected $_name = '';

    /**
	 * Nav [CustomerGroup » One]
	 *
     * @type \jtl\Connector\Model\CustomerGroupAttr[]
     */
    protected $_attrs = array();

    /**
	 * Nav [CustomerGroup » One]
	 *
     * @type \jtl\Connector\Model\CustomerGroupI18n[]
     */
    protected $_i18n = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
	);

	/**
	 * @param  string $name 
	 * @return \jtl\Connector\Model\CustomerGroup
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
	 * @param  integer $applyNetPrice Optional: Show net prices default instead of gross prices
	 * @return \jtl\Connector\Model\CustomerGroup
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setApplyNetPrice($applyNetPrice)
	{
		if (!is_integer($applyNetPrice))
			throw new InvalidArgumentException('integer expected.');
		$this->_applyNetPrice = $applyNetPrice;
		return $this;
	}
	
	/**
	 * @return integer Optional: Show net prices default instead of gross prices
	 */
	public function getApplyNetPrice()
	{
		return $this->_applyNetPrice;
	}

	/**
	 * @param  float $discount Optional percentual discount on all products. Negative Value means surcharge. 
	 * @return \jtl\Connector\Model\CustomerGroup
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setDiscount($discount)
	{
		if (!is_float($discount))
			throw new InvalidArgumentException('float expected.');
		$this->_discount = $discount;
		return $this;
	}
	
	/**
	 * @return float Optional percentual discount on all products. Negative Value means surcharge. 
	 */
	public function getDiscount()
	{
		return $this->_discount;
	}

	/**
	 * @param  integer $kKundenDrucktext 
	 * @return \jtl\Connector\Model\CustomerGroup
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setKKundenDrucktext($kKundenDrucktext)
	{
		if (!is_integer($kKundenDrucktext))
			throw new InvalidArgumentException('integer expected.');
		$this->_kKundenDrucktext = $kKundenDrucktext;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getKKundenDrucktext()
	{
		return $this->_kKundenDrucktext;
	}

	/**
	 * @param  Identity $id Unique customerGroup id
	 * @return \jtl\Connector\Model\CustomerGroup
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique customerGroup id
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  boolean $isDefault Optional: Flag default customer group
	 * @return \jtl\Connector\Model\CustomerGroup
	 * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
	 */
	public function setIsDefault($isDefault)
	{
		if (!is_bool($isDefault))
			throw new InvalidArgumentException('boolean expected.');
		$this->_isDefault = $isDefault;
		return $this;
	}
	
	/**
	 * @return boolean Optional: Flag default customer group
	 */
	public function getIsDefault()
	{
		return $this->_isDefault;
	}

	/**
	 * @param  \jtl\Connector\Model\CustomerGroupAttr $attr
	 * @return \jtl\Connector\Model\CustomerGroup
	 */
	public function addAttr(\jtl\Connector\Model\CustomerGroupAttr $attr)
	{
		$this->_attrs[] = $attr;
		return $this;
	}
	
	/**
	 * @return CustomerGroupAttr
	 */
	public function getAttrs()
	{
		return $this->_attrs;
	}

	/**
	 * @return \jtl\Connector\Model\CustomerGroup
	 */
	public function clearAttrs()
	{
		$this->_attrs = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\CustomerGroupI18n $i18n
	 * @return \jtl\Connector\Model\CustomerGroup
	 */
	public function addI18n(\jtl\Connector\Model\CustomerGroupI18n $i18n)
	{
		$this->_i18n[] = $i18n;
		return $this;
	}
	
	/**
	 * @return CustomerGroupI18n
	 */
	public function getI18n()
	{
		return $this->_i18n;
	}

	/**
	 * @return \jtl\Connector\Model\CustomerGroup
	 */
	public function clearI18n()
	{
		$this->_i18n = array();
		return $this;
	}
}


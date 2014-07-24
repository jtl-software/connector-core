<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Currency model properties..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class Currency extends DataModel
{
    /**
     * @type Identity Unique currency id
     */
    protected $_id = null;

    /**
     * @type boolean 
     */
    protected $_beforeAmount = false;

    /**
     * @type string 
     */
    protected $_decimalSeparator = '';

    /**
     * @type float Optional conversion factor to default currency. Default is 1 (equals default currency)
     */
    protected $_factor = 0.0;

    /**
     * @type boolean Optional: Flag default currency. True, if this is the default currency. Exact one currency must be marked as default. 
     */
    protected $_isDefault = false;

    /**
     * @type DateTime|null 
     */
    protected $_lastModified = null;

    /**
     * @type string 
     */
    protected $_mapping = '';

    /**
     * @type string Currency name
     */
    protected $_name = '';

    /**
     * @type string Currency name
     */
    protected $_nameHTML = '';

    /**
     * @type string 
     */
    protected $_thousandsSeparator = '';


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
	);

	/**
	 * @param  string $name Currency name
	 * @return \jtl\Connector\Model\Currency
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
	 * @return string Currency name
	 */
	public function getName()
	{
		return $this->_name;
	}

	/**
	 * @param  string $nameHTML Currency name
	 * @return \jtl\Connector\Model\Currency
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setNameHTML($nameHTML)
	{
		if (!is_string($nameHTML))
			throw new InvalidArgumentException('string expected.');
		$this->_nameHTML = $nameHTML;
		return $this;
	}
	
	/**
	 * @return string Currency name
	 */
	public function getNameHTML()
	{
		return $this->_nameHTML;
	}

	/**
	 * @param  float $factor Optional conversion factor to default currency. Default is 1 (equals default currency)
	 * @return \jtl\Connector\Model\Currency
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setFactor($factor)
	{
		if (!is_float($factor))
			throw new InvalidArgumentException('float expected.');
		$this->_factor = $factor;
		return $this;
	}
	
	/**
	 * @return float Optional conversion factor to default currency. Default is 1 (equals default currency)
	 */
	public function getFactor()
	{
		return $this->_factor;
	}

	/**
	 * @param  string $decimalSeparator 
	 * @return \jtl\Connector\Model\Currency
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setDecimalSeparator($decimalSeparator)
	{
		if (!is_string($decimalSeparator))
			throw new InvalidArgumentException('string expected.');
		$this->_decimalSeparator = $decimalSeparator;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getDecimalSeparator()
	{
		return $this->_decimalSeparator;
	}

	/**
	 * @param  string $thousandsSeparator 
	 * @return \jtl\Connector\Model\Currency
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setThousandsSeparator($thousandsSeparator)
	{
		if (!is_string($thousandsSeparator))
			throw new InvalidArgumentException('string expected.');
		$this->_thousandsSeparator = $thousandsSeparator;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getThousandsSeparator()
	{
		return $this->_thousandsSeparator;
	}

	/**
	 * @param  DateTime $lastModified 
	 * @return \jtl\Connector\Model\Currency
	 * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
	 */
	public function setLastModified(DateTime $lastModified)
	{
		
		$this->_lastModified = $lastModified;
		return $this;
	}
	
	/**
	 * @return DateTime 
	 */
	public function getLastModified()
	{
		return $this->_lastModified;
	}

	/**
	 * @param  string $mapping 
	 * @return \jtl\Connector\Model\Currency
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setMapping($mapping)
	{
		if (!is_string($mapping))
			throw new InvalidArgumentException('string expected.');
		$this->_mapping = $mapping;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getMapping()
	{
		return $this->_mapping;
	}

	/**
	 * @param  Identity $id Unique currency id
	 * @return \jtl\Connector\Model\Currency
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique currency id
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  boolean $isDefault Optional: Flag default currency. True, if this is the default currency. Exact one currency must be marked as default. 
	 * @return \jtl\Connector\Model\Currency
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
	 * @return boolean Optional: Flag default currency. True, if this is the default currency. Exact one currency must be marked as default. 
	 */
	public function getIsDefault()
	{
		return $this->_isDefault;
	}

	/**
	 * @param  boolean $beforeAmount 
	 * @return \jtl\Connector\Model\Currency
	 * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
	 */
	public function setBeforeAmount($beforeAmount)
	{
		if (!is_bool($beforeAmount))
			throw new InvalidArgumentException('boolean expected.');
		$this->_beforeAmount = $beforeAmount;
		return $this;
	}
	
	/**
	 * @return boolean 
	 */
	public function getBeforeAmount()
	{
		return $this->_beforeAmount;
	}
}


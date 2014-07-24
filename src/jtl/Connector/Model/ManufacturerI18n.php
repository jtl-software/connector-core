<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Locale specific text and meta-information for manufacturer..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ManufacturerI18n extends DataModel
{
    /**
     * @type Identity Reference to manufacturer
     */
    protected $_manufacturerId = null;

    /**
     * @type string Optional manufacturer description (HTML)
     */
    protected $_description = '';

    /**
     * @type string Locale
     */
    protected $_localeName = '';

    /**
     * @type string Optional meta description tag value
     */
    protected $_metaDescription = '';

    /**
     * @type string Optional meta keywords tag value
     */
    protected $_metaKeywords = '';

    /**
     * @type string 
     */
    protected $_metaTitle = '';

    /**
	 * Nav [ManufacturerI18n » Many]
	 *
     * @type \jtl\Connector\Model\Manufacturer[]
     */
    protected $_manufacturer = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_manufacturerId',
	);

	/**
	 * @param  string $metaTitle 
	 * @return \jtl\Connector\Model\ManufacturerI18n
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setMetaTitle($metaTitle)
	{
		if (!is_string($metaTitle))
			throw new InvalidArgumentException('string expected.');
		$this->_metaTitle = $metaTitle;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getMetaTitle()
	{
		return $this->_metaTitle;
	}

	/**
	 * @param  string $metaKeywords Optional meta keywords tag value
	 * @return \jtl\Connector\Model\ManufacturerI18n
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setMetaKeywords($metaKeywords)
	{
		if (!is_string($metaKeywords))
			throw new InvalidArgumentException('string expected.');
		$this->_metaKeywords = $metaKeywords;
		return $this;
	}
	
	/**
	 * @return string Optional meta keywords tag value
	 */
	public function getMetaKeywords()
	{
		return $this->_metaKeywords;
	}

	/**
	 * @param  string $metaDescription Optional meta description tag value
	 * @return \jtl\Connector\Model\ManufacturerI18n
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setMetaDescription($metaDescription)
	{
		if (!is_string($metaDescription))
			throw new InvalidArgumentException('string expected.');
		$this->_metaDescription = $metaDescription;
		return $this;
	}
	
	/**
	 * @return string Optional meta description tag value
	 */
	public function getMetaDescription()
	{
		return $this->_metaDescription;
	}

	/**
	 * @param  string $description Optional manufacturer description (HTML)
	 * @return \jtl\Connector\Model\ManufacturerI18n
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setDescription($description)
	{
		if (!is_string($description))
			throw new InvalidArgumentException('string expected.');
		$this->_description = $description;
		return $this;
	}
	
	/**
	 * @return string Optional manufacturer description (HTML)
	 */
	public function getDescription()
	{
		return $this->_description;
	}

	/**
	 * @param  Identity $manufacturerId Reference to manufacturer
	 * @return \jtl\Connector\Model\ManufacturerI18n
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setManufacturerId(Identity $manufacturerId)
	{
		
		$this->_manufacturerId = $manufacturerId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to manufacturer
	 */
	public function getManufacturerId()
	{
		return $this->_manufacturerId;
	}

	/**
	 * @param  string $localeName Locale
	 * @return \jtl\Connector\Model\ManufacturerI18n
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setLocaleName($localeName)
	{
		if (!is_string($localeName))
			throw new InvalidArgumentException('string expected.');
		$this->_localeName = $localeName;
		return $this;
	}
	
	/**
	 * @return string Locale
	 */
	public function getLocaleName()
	{
		return $this->_localeName;
	}

	/**
	 * @param  \jtl\Connector\Model\Manufacturer $manufacturer
	 * @return \jtl\Connector\Model\ManufacturerI18n
	 */
	public function addManufacturer(\jtl\Connector\Model\Manufacturer $manufacturer)
	{
		$this->_manufacturer[] = $manufacturer;
		return $this;
	}
	
	/**
	 * @return Manufacturer
	 */
	public function getManufacturer()
	{
		return $this->_manufacturer;
	}

	/**
	 * @return \jtl\Connector\Model\ManufacturerI18n
	 */
	public function clearManufacturer()
	{
		$this->_manufacturer = array();
		return $this;
	}
}


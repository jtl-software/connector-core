<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Localized specific value text..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class SpecificValueI18n extends DataModel
{
    /**
     * @type Identity Reference to specificValue
     */
    protected $_specificValueId = null;

    /**
     * @type string Optional localized description
     */
    protected $_description = '';

    /**
     * @type string locale
     */
    protected $_localeName = '';

    /**
     * @type string Optional localized meta description value
     */
    protected $_metaDescription = '';

    /**
     * @type string Optional localized meta keywords value
     */
    protected $_metaKeywords = '';

    /**
     * @type string Optional localized title tag value
     */
    protected $_titleTag = '';

    /**
     * @type string 
     */
    protected $_url = '';

    /**
     * @type string Localized value
     */
    protected $_value = '';

    /**
	 * Nav [SpecificValueI18n » Many]
	 *
     * @type \jtl\Connector\Model\SpecificValue[]
     */
    protected $_specificValue = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_specificValueId',
	);

	/**
	 * @param  string $value Localized value
	 * @return \jtl\Connector\Model\SpecificValueI18n
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setValue($value)
	{
		if (!is_string($value))
			throw new InvalidArgumentException('string expected.');
		$this->_value = $value;
		return $this;
	}
	
	/**
	 * @return string Localized value
	 */
	public function getValue()
	{
		return $this->_value;
	}

	/**
	 * @param  string $url 
	 * @return \jtl\Connector\Model\SpecificValueI18n
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setUrl($url)
	{
		if (!is_string($url))
			throw new InvalidArgumentException('string expected.');
		$this->_url = $url;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getUrl()
	{
		return $this->_url;
	}

	/**
	 * @param  string $titleTag Optional localized title tag value
	 * @return \jtl\Connector\Model\SpecificValueI18n
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setTitleTag($titleTag)
	{
		if (!is_string($titleTag))
			throw new InvalidArgumentException('string expected.');
		$this->_titleTag = $titleTag;
		return $this;
	}
	
	/**
	 * @return string Optional localized title tag value
	 */
	public function getTitleTag()
	{
		return $this->_titleTag;
	}

	/**
	 * @param  string $metaKeywords Optional localized meta keywords value
	 * @return \jtl\Connector\Model\SpecificValueI18n
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
	 * @return string Optional localized meta keywords value
	 */
	public function getMetaKeywords()
	{
		return $this->_metaKeywords;
	}

	/**
	 * @param  string $metaDescription Optional localized meta description value
	 * @return \jtl\Connector\Model\SpecificValueI18n
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
	 * @return string Optional localized meta description value
	 */
	public function getMetaDescription()
	{
		return $this->_metaDescription;
	}

	/**
	 * @param  string $description Optional localized description
	 * @return \jtl\Connector\Model\SpecificValueI18n
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
	 * @return string Optional localized description
	 */
	public function getDescription()
	{
		return $this->_description;
	}

	/**
	 * @param  Identity $specificValueId Reference to specificValue
	 * @return \jtl\Connector\Model\SpecificValueI18n
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setSpecificValueId(Identity $specificValueId)
	{
		
		$this->_specificValueId = $specificValueId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to specificValue
	 */
	public function getSpecificValueId()
	{
		return $this->_specificValueId;
	}

	/**
	 * @param  string $localeName locale
	 * @return \jtl\Connector\Model\SpecificValueI18n
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
	 * @return string locale
	 */
	public function getLocaleName()
	{
		return $this->_localeName;
	}

	/**
	 * @param  \jtl\Connector\Model\SpecificValue $specificValue
	 * @return \jtl\Connector\Model\SpecificValueI18n
	 */
	public function addSpecificValue(\jtl\Connector\Model\SpecificValue $specificValue)
	{
		$this->_specificValue[] = $specificValue;
		return $this;
	}
	
	/**
	 * @return SpecificValue
	 */
	public function getSpecificValue()
	{
		return $this->_specificValue;
	}

	/**
	 * @return \jtl\Connector\Model\SpecificValueI18n
	 */
	public function clearSpecificValue()
	{
		$this->_specificValue = array();
		return $this;
	}
}


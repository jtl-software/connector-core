<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Manufacturer / brand properties. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class Manufacturer extends DataModel
{
    /**
     * @type Identity Unique manufacturer id
     */
    protected $_id = null;

    /**
     * @type string 
     */
    protected $_description = '';

    /**
     * @type string 
     */
    protected $_metaDescription = '';

    /**
     * @type string 
     */
    protected $_metaKeywords = '';

    /**
     * @type string 
     */
    protected $_metaTitle = '';

    /**
     * @type string Manufacturer (brand) name
     */
    protected $_name = '';

    /**
     * @type integer|null Optional sort number
     */
    protected $_sort = 0;

    /**
     * @type string 
     */
    protected $_url = '';

    /**
     * @type string Optional manufacturer website URL
     */
    protected $_www = '';

    /**
	 * Nav [Manufacturer » One]
	 *
     * @type \jtl\Connector\Model\ManufacturerI18n[]
     */
    protected $_i18ns = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
	);

	/**
	 * @param  string $name Manufacturer (brand) name
	 * @return \jtl\Connector\Model\Manufacturer
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
	 * @return string Manufacturer (brand) name
	 */
	public function getName()
	{
		return $this->_name;
	}

	/**
	 * @param  string $www Optional manufacturer website URL
	 * @return \jtl\Connector\Model\Manufacturer
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setWww($www)
	{
		if (!is_string($www))
			throw new InvalidArgumentException('string expected.');
		$this->_www = $www;
		return $this;
	}
	
	/**
	 * @return string Optional manufacturer website URL
	 */
	public function getWww()
	{
		return $this->_www;
	}

	/**
	 * @param  integer $sort Optional sort number
	 * @return \jtl\Connector\Model\Manufacturer
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
	 * @param  string $url 
	 * @return \jtl\Connector\Model\Manufacturer
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
	 * @param  string $metaTitle 
	 * @return \jtl\Connector\Model\Manufacturer
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
	 * @param  string $metaKeywords 
	 * @return \jtl\Connector\Model\Manufacturer
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
	 * @return string 
	 */
	public function getMetaKeywords()
	{
		return $this->_metaKeywords;
	}

	/**
	 * @param  string $metaDescription 
	 * @return \jtl\Connector\Model\Manufacturer
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
	 * @return string 
	 */
	public function getMetaDescription()
	{
		return $this->_metaDescription;
	}

	/**
	 * @param  string $description 
	 * @return \jtl\Connector\Model\Manufacturer
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
	 * @return string 
	 */
	public function getDescription()
	{
		return $this->_description;
	}

	/**
	 * @param  Identity $id Unique manufacturer id
	 * @return \jtl\Connector\Model\Manufacturer
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique manufacturer id
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  \jtl\Connector\Model\ManufacturerI18n $i18ns
	 * @return \jtl\Connector\Model\Manufacturer
	 */
	public function addI18ns(\jtl\Connector\Model\ManufacturerI18n $i18ns)
	{
		$this->_i18ns[] = $i18ns;
		return $this;
	}
	
	/**
	 * @return ManufacturerI18n
	 */
	public function getI18ns()
	{
		return $this->_i18ns;
	}

	/**
	 * @return \jtl\Connector\Model\Manufacturer
	 */
	public function clearI18ns()
	{
		$this->_i18ns = array();
		return $this;
	}
}


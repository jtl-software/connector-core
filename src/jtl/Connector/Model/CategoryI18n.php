<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Localized category properties. localeName, categoryId and a localized name must be set. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class CategoryI18n extends DataModel
{
    /**
     * @type Identity Reference to category
     */
    protected $_categoryId = null;

    /**
     * @type string Optional localized Long Description
     */
    protected $_description = '';

    /**
     * @type string Locale
     */
    protected $_localeName = '';

    /**
     * @type string Localized category name
     */
    protected $_name = '';

    /**
     * @type string 
     */
    protected $_url = '';

    /**
	 * Nav [CategoryI18n » Many]
	 *
     * @type \jtl\Connector\Model\Category[]
     */
    protected $_category = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_categoryId',
	);

	/**
	 * @param  string $name Localized category name
	 * @return \jtl\Connector\Model\CategoryI18n
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
	 * @return string Localized category name
	 */
	public function getName()
	{
		return $this->_name;
	}

	/**
	 * @param  string $description Optional localized Long Description
	 * @return \jtl\Connector\Model\CategoryI18n
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
	 * @return string Optional localized Long Description
	 */
	public function getDescription()
	{
		return $this->_description;
	}

	/**
	 * @param  string $url 
	 * @return \jtl\Connector\Model\CategoryI18n
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
	 * @param  Identity $categoryId Reference to category
	 * @return \jtl\Connector\Model\CategoryI18n
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setCategoryId(Identity $categoryId)
	{
		
		$this->_categoryId = $categoryId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to category
	 */
	public function getCategoryId()
	{
		return $this->_categoryId;
	}

	/**
	 * @param  string $localeName Locale
	 * @return \jtl\Connector\Model\CategoryI18n
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
	 * @param  \jtl\Connector\Model\Category $category
	 * @return \jtl\Connector\Model\CategoryI18n
	 */
	public function addCategory(\jtl\Connector\Model\Category $category)
	{
		$this->_category[] = $category;
		return $this;
	}
	
	/**
	 * @return Category
	 */
	public function getCategory()
	{
		return $this->_category;
	}

	/**
	 * @return \jtl\Connector\Model\CategoryI18n
	 */
	public function clearCategory()
	{
		$this->_category = array();
		return $this;
	}
}


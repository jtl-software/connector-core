<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Locale specific texts for product.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ProductI18n extends DataModel
{
    /**
     * @type Identity Reference to product
     */
    protected $_productId = null;

    /**
     * @type integer 
     */
    protected $_connectorId = 0;

    /**
     * @type string Optional product description
     */
    protected $_description = '';

    /**
     * @type string locale
     */
    protected $_localeName = '';

    /**
     * @type string Product name / title
     */
    protected $_name = '';

    /**
     * @type string Optional product shortdescription
     */
    protected $_shortDescription = '';

    /**
     * @type string 
     */
    protected $_url = '';

    /**
	 * Nav [ProductI18n » Many]
	 *
     * @type \jtl\Connector\Model\Product[]
     */
    protected $_product = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_productId',
	);

	/**
	 * @param  string $name Product name / title
	 * @return \jtl\Connector\Model\ProductI18n
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
	 * @return string Product name / title
	 */
	public function getName()
	{
		return $this->_name;
	}

	/**
	 * @param  string $description Optional product description
	 * @return \jtl\Connector\Model\ProductI18n
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
	 * @return string Optional product description
	 */
	public function getDescription()
	{
		return $this->_description;
	}

	/**
	 * @param  string $shortDescription Optional product shortdescription
	 * @return \jtl\Connector\Model\ProductI18n
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setShortDescription($shortDescription)
	{
		if (!is_string($shortDescription))
			throw new InvalidArgumentException('string expected.');
		$this->_shortDescription = $shortDescription;
		return $this;
	}
	
	/**
	 * @return string Optional product shortdescription
	 */
	public function getShortDescription()
	{
		return $this->_shortDescription;
	}

	/**
	 * @param  string $url 
	 * @return \jtl\Connector\Model\ProductI18n
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
	 * @param  integer $connectorId 
	 * @return \jtl\Connector\Model\ProductI18n
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setConnectorId($connectorId)
	{
		if (!is_integer($connectorId))
			throw new InvalidArgumentException('integer expected.');
		$this->_connectorId = $connectorId;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getConnectorId()
	{
		return $this->_connectorId;
	}

	/**
	 * @param  Identity $productId Reference to product
	 * @return \jtl\Connector\Model\ProductI18n
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setProductId(Identity $productId)
	{
		
		$this->_productId = $productId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to product
	 */
	public function getProductId()
	{
		return $this->_productId;
	}

	/**
	 * @param  string $localeName locale
	 * @return \jtl\Connector\Model\ProductI18n
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
	 * @param  \jtl\Connector\Model\Product $product
	 * @return \jtl\Connector\Model\ProductI18n
	 */
	public function addProduct(\jtl\Connector\Model\Product $product)
	{
		$this->_product[] = $product;
		return $this;
	}
	
	/**
	 * @return Product
	 */
	public function getProduct()
	{
		return $this->_product;
	}

	/**
	 * @return \jtl\Connector\Model\ProductI18n
	 */
	public function clearProduct()
	{
		$this->_product = array();
		return $this;
	}
}


<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Locale specific product variation properties. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ProductVariationI18n extends DataModel
{
    /**
     * @type Identity Reference to productVariation
     */
    protected $_productVariationId = null;

    /**
     * @type string Locale
     */
    protected $_localeName = '';

    /**
     * @type string Locale specific variation name
     */
    protected $_name = '';

    /**
	 * Nav [ProductVariationI18n » Many]
	 *
     * @type \jtl\Connector\Model\ProductVariation[]
     */
    protected $_productVariation = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_productVariationId',
	);

	/**
	 * @param  string $name Locale specific variation name
	 * @return \jtl\Connector\Model\ProductVariationI18n
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
	 * @return string Locale specific variation name
	 */
	public function getName()
	{
		return $this->_name;
	}

	/**
	 * @param  Identity $productVariationId Reference to productVariation
	 * @return \jtl\Connector\Model\ProductVariationI18n
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
	 * @param  string $localeName Locale
	 * @return \jtl\Connector\Model\ProductVariationI18n
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
	 * @param  \jtl\Connector\Model\ProductVariation $productVariation
	 * @return \jtl\Connector\Model\ProductVariationI18n
	 */
	public function addProductVariation(\jtl\Connector\Model\ProductVariation $productVariation)
	{
		$this->_productVariation[] = $productVariation;
		return $this;
	}
	
	/**
	 * @return ProductVariation
	 */
	public function getProductVariation()
	{
		return $this->_productVariation;
	}

	/**
	 * @return \jtl\Connector\Model\ProductVariationI18n
	 */
	public function clearProductVariation()
	{
		$this->_productVariation = array();
		return $this;
	}
}


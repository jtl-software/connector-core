<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * locale specifig productVariationValue name..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ProductVariationValueI18n extends DataModel
{
    /**
     * @type Identity Reference to productVariationValue
     */
    protected $_productVariationValueId = null;

    /**
     * @type string Locale
     */
    protected $_localeName = '';

    /**
     * @type string Locale specific variationValue name
     */
    protected $_name = '';

    /**
	 * Nav [ProductVariationValueI18n » Many]
	 *
     * @type \jtl\Connector\Model\ProductVariationValue[]
     */
    protected $_productVariationValue = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_productVariationValueId',
	);

	/**
	 * @param  string $name Locale specific variationValue name
	 * @return \jtl\Connector\Model\ProductVariationValueI18n
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
	 * @return string Locale specific variationValue name
	 */
	public function getName()
	{
		return $this->_name;
	}

	/**
	 * @param  Identity $productVariationValueId Reference to productVariationValue
	 * @return \jtl\Connector\Model\ProductVariationValueI18n
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setProductVariationValueId(Identity $productVariationValueId)
	{
		
		$this->_productVariationValueId = $productVariationValueId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to productVariationValue
	 */
	public function getProductVariationValueId()
	{
		return $this->_productVariationValueId;
	}

	/**
	 * @param  string $localeName Locale
	 * @return \jtl\Connector\Model\ProductVariationValueI18n
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
	 * @param  \jtl\Connector\Model\ProductVariationValue $productVariationValue
	 * @return \jtl\Connector\Model\ProductVariationValueI18n
	 */
	public function addProductVariationValue(\jtl\Connector\Model\ProductVariationValue $productVariationValue)
	{
		$this->_productVariationValue[] = $productVariationValue;
		return $this;
	}
	
	/**
	 * @return ProductVariationValue
	 */
	public function getProductVariationValue()
	{
		return $this->_productVariationValue;
	}

	/**
	 * @return \jtl\Connector\Model\ProductVariationValueI18n
	 */
	public function clearProductVariationValue()
	{
		$this->_productVariationValue = array();
		return $this;
	}
}


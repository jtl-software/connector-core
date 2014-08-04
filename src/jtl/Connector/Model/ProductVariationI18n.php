<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Locale specific product variation properties. .
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ProductVariationI18n extends DataModel
{
    /**
     * @type Identity Reference to productVariation
     */
    protected $productVariationId = null;

    /**
     * @type string Locale
     */
    protected $localeName = '';

    /**
     * @type string Locale specific variation name
     */
    protected $name = '';

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'productVariationId',
    );

    /**
     * @param  Identity $productVariationId Reference to productVariation
     * @return \jtl\Connector\Model\ProductVariationI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationId(Identity $productVariationId)
    {
        return $this->setProperty('ProductVariationId', $productVariationId, 'Identity');
    }

    /**
     * @return Identity Reference to productVariation
     */
    public function getProductVariationId()
    {
        return $this->productVariationId;
    }

    /**
     * @param  string $localeName Locale
     * @return \jtl\Connector\Model\ProductVariationI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setLocaleName(Identity $localeName)
    {
        return $this->setProperty('LocaleName', $localeName, 'string');
    }

    /**
     * @return string Locale
     */
    public function getLocaleName()
    {
        return $this->localeName;
    }

    /**
     * @param  string $name Locale specific variation name
     * @return \jtl\Connector\Model\ProductVariationI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setName(Identity $name)
    {
        return $this->setProperty('Name', $name, 'string');
    }

    /**
     * @return string Locale specific variation name
     */
    public function getName()
    {
        return $this->name;
    }

 
}

<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * locale specifig productVariationValue name..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ProductVariationValueI18n extends DataModel
{
    /**
     * @type Identity Reference to productVariationValue
     */
    protected $productVariationValueId = null;

    /**
     * @type string Locale
     */
    protected $localeName = '';

    /**
     * @type string Locale specific variationValue name
     */
    protected $name = '';

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'productVariationValueId',
    );

    /**
     * @param  Identity $productVariationValueId Reference to productVariationValue
     * @return \jtl\Connector\Model\ProductVariationValueI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationValueId(Identity $productVariationValueId)
    {
        return $this->setProperty('ProductVariationValueId', $productVariationValueId, 'Identity');
    }

    /**
     * @return Identity Reference to productVariationValue
     */
    public function getProductVariationValueId()
    {
        return $this->productVariationValueId;
    }

    /**
     * @param  string $localeName Locale
     * @return \jtl\Connector\Model\ProductVariationValueI18n
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
     * @param  string $name Locale specific variationValue name
     * @return \jtl\Connector\Model\ProductVariationValueI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setName(Identity $name)
    {
        return $this->setProperty('Name', $name, 'string');
    }

    /**
     * @return string Locale specific variationValue name
     */
    public function getName()
    {
        return $this->name;
    }

 
}

<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * locale specifig productVariationValue name..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 */
class ProductVariationValueI18n extends DataModel
{
    /**
     * @var Identity Reference to productVariationValue
     * @Serializer\Type("jtl\Connector\Model\Identity")
     */
    protected $productVariationValueId = null;

    /**
     * @var string Locale
     * @Serializer\Type("string")
     */
    protected $localeName = '';

    /**
     * @var string Locale specific variationValue name
     * @Serializer\Type("string")
     */
    protected $name = '';


    public function __construct()
    {
        $this->productVariationValueId = new Identity;
    }

    /**
     * @param  Identity $productVariationValueId Reference to productVariationValue
     * @return \jtl\Connector\Model\ProductVariationValueI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationValueId(Identity $productVariationValueId)
    {
        return $this->setProperty('productVariationValueId', $productVariationValueId, 'Identity');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setLocaleName($localeName)
    {
        return $this->setProperty('localeName', $localeName, 'string');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }

    /**
     * @return string Locale specific variationValue name
     */
    public function getName()
    {
        return $this->name;
    }

 
}

<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Localized key-value-pair for productAttr..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 */
class ProductAttrI18n extends DataModel
{
    /**
     * @var Identity Reference to productAttr
     */
    protected $productAttrId = null;

    /**
     * @var string Attribute key
     */
    protected $key = '';

    /**
     * @var string Locale
     */
    protected $localeName = '';

    /**
     * @var string Attribute value
     */
    protected $value = '';

    /**
     * @param  Identity $productAttrId Reference to productAttr
     * @return \jtl\Connector\Model\ProductAttrI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductAttrId(Identity $productAttrId)
    {
        return $this->setProperty('productAttrId', $productAttrId, 'Identity');
    }

    /**
     * @return Identity Reference to productAttr
     */
    public function getProductAttrId()
    {
        return $this->productAttrId;
    }

    /**
     * @param  string $key Attribute key
     * @return \jtl\Connector\Model\ProductAttrI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setKey($key)
    {
        return $this->setProperty('key', $key, 'string');
    }

    /**
     * @return string Attribute key
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param  string $localeName Locale
     * @return \jtl\Connector\Model\ProductAttrI18n
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
     * @param  string $value Attribute value
     * @return \jtl\Connector\Model\ProductAttrI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setValue($value)
    {
        return $this->setProperty('value', $value, 'string');
    }

    /**
     * @return string Attribute value
     */
    public function getValue()
    {
        return $this->value;
    }

 
}

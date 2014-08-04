<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Localized key-value-pair for productAttr..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ProductAttrI18n extends DataModel
{
    /**
     * @type Identity Reference to productAttr
     */
    protected $productAttrId = null;

    /**
     * @type string Attribute key
     */
    protected $key = '';

    /**
     * @type string Locale
     */
    protected $localeName = '';

    /**
     * @type string Attribute value
     */
    protected $value = '';

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'productAttrId',
    );

    /**
     * @param  Identity $productAttrId Reference to productAttr
     * @return \jtl\Connector\Model\ProductAttrI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductAttrId(Identity $productAttrId)
    {
        return $this->setProperty('ProductAttrId', $productAttrId, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setKey(Identity $key)
    {
        return $this->setProperty('Key', $key, 'string');
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
     * @param  string $value Attribute value
     * @return \jtl\Connector\Model\ProductAttrI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setValue(Identity $value)
    {
        return $this->setProperty('Value', $value, 'string');
    }

    /**
     * @return string Attribute value
     */
    public function getValue()
    {
        return $this->value;
    }

 
}

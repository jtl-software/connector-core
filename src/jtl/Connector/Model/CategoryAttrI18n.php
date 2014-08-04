<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Localized key-value-pair for categoryAttr. All properties must be specified. .
 *
 * @access public
 * @package jtl\Connector\Model
 */
class CategoryAttrI18n extends DataModel
{
    /**
     * @type Identity Reference to categoryAttr
     */
    protected $categoryAttrId = null;

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
        'categoryAttrId',
    );

    /**
     * @param  Identity $categoryAttrId Reference to categoryAttr
     * @return \jtl\Connector\Model\CategoryAttrI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCategoryAttrId(Identity $categoryAttrId)
    {
        return $this->setProperty('CategoryAttrId', $categoryAttrId, 'Identity');
    }

    /**
     * @return Identity Reference to categoryAttr
     */
    public function getCategoryAttrId()
    {
        return $this->categoryAttrId;
    }

    /**
     * @param  string $key Attribute key
     * @return \jtl\Connector\Model\CategoryAttrI18n
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
     * @return \jtl\Connector\Model\CategoryAttrI18n
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
     * @return \jtl\Connector\Model\CategoryAttrI18n
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

<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Category
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Localized key-value-pair for categoryAttr. All properties must be specified. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Category
 * 
 * @Serializer\AccessType("public_method")
 */
class CategoryAttrI18n extends DataModel
{
    /**
     * @var Identity Reference to categoryAttr
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("categoryAttrId")
     * @Serializer\Accessor(getter="getCategoryAttrId",setter="setCategoryAttrId")
     */
    protected $categoryAttrId = null;

    /**
     * @var string Attribute key
     * @Serializer\Type("string")
     * @Serializer\SerializedName("key")
     * @Serializer\Accessor(getter="getKey",setter="setKey")
     */
    protected $key = '';

    /**
     * @var string Locale
     * @Serializer\Type("string")
     * @Serializer\SerializedName("localeName")
     * @Serializer\Accessor(getter="getLocaleName",setter="setLocaleName")
     */
    protected $localeName = '';

    /**
     * @var string Attribute value
     * @Serializer\Type("string")
     * @Serializer\SerializedName("value")
     * @Serializer\Accessor(getter="getValue",setter="setValue")
     */
    protected $value = '';


    public function __construct()
    {
        $this->categoryAttrId = new Identity;
    }

    /**
     * @param  Identity $categoryAttrId Reference to categoryAttr
     * @return \jtl\Connector\Model\CategoryAttrI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCategoryAttrId(Identity $categoryAttrId)
    {
        return $this->setProperty('categoryAttrId', $categoryAttrId, 'Identity');
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
     * @return \jtl\Connector\Model\CategoryAttrI18n
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
     * @return \jtl\Connector\Model\CategoryAttrI18n
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

<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Monolingual mediafile attribute.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * 
 * @Serializer\AccessType("public_method")
 */
class MediaFileAttr extends DataModel
{
    /**
     * @var Identity Unique MediaFileAttr id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;

    /**
     * @var Identity Reference to mediaFile
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("mediaFileId")
     * @Serializer\Accessor(getter="getMediaFileId",setter="setMediaFileId")
     */
    protected $mediaFileId = null;

    /**
     * @var string Attribute name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("key")
     * @Serializer\Accessor(getter="getKey",setter="setKey")
     */
    protected $key = '';

    /**
     * @var string Locale
     * @Serializer\Type("string")
     * @Serializer\SerializedName("languageISO")
     * @Serializer\Accessor(getter="getLanguageISO",setter="setLanguageISO")
     */
    protected $languageISO = '';

    /**
     * @var string Attribute value
     * @Serializer\Type("string")
     * @Serializer\SerializedName("value")
     * @Serializer\Accessor(getter="getValue",setter="setValue")
     */
    protected $value = '';

    /**
     * @var jtl\Connector\Model\MediaFileAttrI18n[] 
     * @Serializer\Type("array<jtl\Connector\Model\MediaFileAttrI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected $i18ns = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
        $this->mediaFileId = new Identity();
    }

    /**
     * @param Identity $id Unique MediaFileAttr id
     * @return \jtl\Connector\Model\MediaFileAttr
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity Unique MediaFileAttr id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param Identity $mediaFileId Reference to mediaFile
     * @return \jtl\Connector\Model\MediaFileAttr
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMediaFileId(Identity $mediaFileId)
    {
        return $this->setProperty('mediaFileId', $mediaFileId, 'Identity');
    }

    /**
     * @return Identity Reference to mediaFile
     */
    public function getMediaFileId()
    {
        return $this->mediaFileId;
    }

    /**
     * @param string $key Attribute name
     * @return \jtl\Connector\Model\MediaFileAttr
     */
    public function setKey($key)
    {
        return $this->setProperty('key', $key, 'string');
    }

    /**
     * @return string Attribute name
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string $languageISO Locale
     * @return \jtl\Connector\Model\MediaFileAttr
     */
    public function setLanguageISO($languageISO)
    {
        return $this->setProperty('languageISO', $languageISO, 'string');
    }

    /**
     * @return string Locale
     */
    public function getLanguageISO()
    {
        return $this->languageISO;
    }

    /**
     * @param string $value Attribute value
     * @return \jtl\Connector\Model\MediaFileAttr
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

    /**
     * @param \jtl\Connector\Model\MediaFileAttrI18n $i18n
     * @return \jtl\Connector\Model\MediaFileAttr
     */
    public function addI18n(\jtl\Connector\Model\MediaFileAttrI18n $i18n)
    {
        $this->i18ns[] = $i18n;
        return $this;
    }
    
    /**
     * @param array $i18ns
     * @return \jtl\Connector\Model\MediaFileAttr
     */
    public function setI18ns(array $i18ns)
    {
        $this->i18ns = $i18ns;
        return $this;
    }
    
    /**
     * @return jtl\Connector\Model\MediaFileAttrI18n[]
     */
    public function getI18ns()
    {
        return $this->i18ns;
    }

    /**
     * @return \jtl\Connector\Model\MediaFileAttr
     */
    public function clearI18ns()
    {
        $this->i18ns = array();
        return $this;
    }
}

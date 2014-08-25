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
 * Monolingual mediafile attribute..
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
     * @var string Attribute name
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
     * @var int Reference to mediaFile
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("mediaFileId")
     * @Serializer\Accessor(getter="getMediaFileId",setter="setMediaFileId")
     */
    protected $mediaFileId = 0;

    /**
     * @var string Attribute value
     * @Serializer\Type("string")
     * @Serializer\SerializedName("value")
     * @Serializer\Accessor(getter="getValue",setter="setValue")
     */
    protected $value = '';


    public function __construct()
    {
        $this->id = new Identity;
    }

    /**
     * @param  Identity $id Unique MediaFileAttr id
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
     * @param  string $key Attribute name
     * @return \jtl\Connector\Model\MediaFileAttr
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $localeName Locale
     * @return \jtl\Connector\Model\MediaFileAttr
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
     * @param  int $mediaFileId Reference to mediaFile
     * @return \jtl\Connector\Model\MediaFileAttr
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setMediaFileId($mediaFileId)
    {
        return $this->setProperty('mediaFileId', $mediaFileId, 'int');
    }

    /**
     * @return int Reference to mediaFile
     */
    public function getMediaFileId()
    {
        return $this->mediaFileId;
    }

    /**
     * @param  string $value Attribute value
     * @return \jtl\Connector\Model\MediaFileAttr
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

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
 * Locale specific mediafile name + description.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * 
 * @Serializer\AccessType("public_method")
 */
class MediaFileI18n extends DataModel
{
    /**
     * @var Identity Reference to mediaFile
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("mediaFileId")
     * @Serializer\Accessor(getter="getMediaFileId",setter="setMediaFileId")
     */
    protected $mediaFileId = null;

    /**
     * @var string Locale specific description
     * @Serializer\Type("string")
     * @Serializer\SerializedName("description")
     * @Serializer\Accessor(getter="getDescription",setter="setDescription")
     */
    protected $description = '';

    /**
     * @var string Locale
     * @Serializer\Type("string")
     * @Serializer\SerializedName("languageISO")
     * @Serializer\Accessor(getter="getLanguageISO",setter="setLanguageISO")
     */
    protected $languageISO = '';

    /**
     * @var string Locale specific name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->mediaFileId = new Identity();
    }

    /**
     * @param Identity $mediaFileId Reference to mediaFile
     * @return \jtl\Connector\Model\MediaFileI18n
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
     * @param string $description Locale specific description
     * @return \jtl\Connector\Model\MediaFileI18n
     */
    public function setDescription($description)
    {
        return $this->setProperty('description', $description, 'string');
    }

    /**
     * @return string Locale specific description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $languageISO Locale
     * @return \jtl\Connector\Model\MediaFileI18n
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
     * @param string $name Locale specific name
     * @return \jtl\Connector\Model\MediaFileI18n
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }

    /**
     * @return string Locale specific name
     */
    public function getName()
    {
        return $this->name;
    }
}

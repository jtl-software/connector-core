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
 * Localized fileDownload name and  description.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * 
 * @Serializer\AccessType("public_method")
 */
class FileDownloadI18n extends DataModel
{
    /**
     * @var Identity Reference to fileDownloadId
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("fileDownloadId")
     * @Serializer\Accessor(getter="getFileDownloadId",setter="setFileDownloadId")
     */
    protected $fileDownloadId = null;

    /**
     * @var string Optional File download description
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
     * @var string File download title / name
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
        $this->fileDownloadId = new Identity();
    }

    /**
     * @param Identity $fileDownloadId Reference to fileDownloadId
     * @return \jtl\Connector\Model\FileDownloadI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setFileDownloadId(Identity $fileDownloadId)
    {
        return $this->setProperty('fileDownloadId', $fileDownloadId, 'Identity');
    }

    /**
     * @return Identity Reference to fileDownloadId
     */
    public function getFileDownloadId()
    {
        return $this->fileDownloadId;
    }

    /**
     * @param string $description Optional File download description
     * @return \jtl\Connector\Model\FileDownloadI18n
     */
    public function setDescription($description)
    {
        return $this->setProperty('description', $description, 'string');
    }

    /**
     * @return string Optional File download description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $languageISO Locale
     * @return \jtl\Connector\Model\FileDownloadI18n
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
     * @param string $name File download title / name
     * @return \jtl\Connector\Model\FileDownloadI18n
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }

    /**
     * @return string File download title / name
     */
    public function getName()
    {
        return $this->name;
    }
}

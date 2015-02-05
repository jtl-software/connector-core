
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
 * File download properties. 
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * 
 * @Serializer\AccessType("public_method")
 */
class FileDownload extends DataModel
{

    /**
     * @var Identity Unique fileDownload id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;


    /**
     * @var DateTime Optional creation date
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("creationDate")
     * @Serializer\Accessor(getter="getCreationDate",setter="setCreationDate")
     */
    protected $creationDate = null;


    /**
     * @var string Optional max days to allow Download, starting from payment date. Default 0 for no time limit. 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("maxDays")
     * @Serializer\Accessor(getter="getMaxDays",setter="setMaxDays")
     */
    protected $maxDays = '';


    /**
     * @var string Optional max number of allowed downloads per customer. Default 0 for no maximum download limit. 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("maxDownloads")
     * @Serializer\Accessor(getter="getMaxDownloads",setter="setMaxDownloads")
     */
    protected $maxDownloads = '';


    /**
     * @var string Path to download file
     * @Serializer\Type("string")
     * @Serializer\SerializedName("path")
     * @Serializer\Accessor(getter="getPath",setter="setPath")
     */
    protected $path = '';


    /**
     * @var string Optional path to preview file
     * @Serializer\Type("string")
     * @Serializer\SerializedName("previewPath")
     * @Serializer\Accessor(getter="getPreviewPath",setter="setPreviewPath")
     */
    protected $previewPath = '';


    /**
     * @var string Optional sort number
     * @Serializer\Type("string")
     * @Serializer\SerializedName("sort")
     * @Serializer\Accessor(getter="getSort",setter="setSort")
     */
    protected $sort = '';


    /**
     * @var jtl\Connector\Model\FileDownloadI18n[] 
     * @Serializer\Type("array<jtl\Connector\Model\FileDownloadI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected $i18ns = array();


    public function __construct()
    {
        $this->id = new Identity();
    }
	
 
    /**
     * @param Identity $id Unique fileDownload id
     * @return \jtl\Connector\Model\FileDownload
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity Unique fileDownload id
     */
    public function getId()
    {
        return $this->id;
    }
	
 
    /**
     * @param DateTime $creationDate Optional creation date
     * @return \jtl\Connector\Model\FileDownload
     * @throws \InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setCreationDate(DateTime $creationDate)
    {
        return $this->setProperty('creationDate', $creationDate, 'DateTime');
    }

    /**
     * @return DateTime Optional creation date
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }
	
 
    /**
     * @param string $maxDays Optional max days to allow Download, starting from payment date. Default 0 for no time limit. 
     * @return \jtl\Connector\Model\FileDownload
     */
    public function setMaxDays($maxDays)
    {
        return $this->setProperty('maxDays', $maxDays, 'string');
    }

    /**
     * @return string Optional max days to allow Download, starting from payment date. Default 0 for no time limit. 
     */
    public function getMaxDays()
    {
        return $this->maxDays;
    }
	
 
    /**
     * @param string $maxDownloads Optional max number of allowed downloads per customer. Default 0 for no maximum download limit. 
     * @return \jtl\Connector\Model\FileDownload
     */
    public function setMaxDownloads($maxDownloads)
    {
        return $this->setProperty('maxDownloads', $maxDownloads, 'string');
    }

    /**
     * @return string Optional max number of allowed downloads per customer. Default 0 for no maximum download limit. 
     */
    public function getMaxDownloads()
    {
        return $this->maxDownloads;
    }
	
 
    /**
     * @param string $path Path to download file
     * @return \jtl\Connector\Model\FileDownload
     */
    public function setPath($path)
    {
        return $this->setProperty('path', $path, 'string');
    }

    /**
     * @return string Path to download file
     */
    public function getPath()
    {
        return $this->path;
    }
	
 
    /**
     * @param string $previewPath Optional path to preview file
     * @return \jtl\Connector\Model\FileDownload
     */
    public function setPreviewPath($previewPath)
    {
        return $this->setProperty('previewPath', $previewPath, 'string');
    }

    /**
     * @return string Optional path to preview file
     */
    public function getPreviewPath()
    {
        return $this->previewPath;
    }
	
 
    /**
     * @param string $sort Optional sort number
     * @return \jtl\Connector\Model\FileDownload
     */
    public function setSort($sort)
    {
        return $this->setProperty('sort', $sort, 'string');
    }

    /**
     * @return string Optional sort number
     */
    public function getSort()
    {
        return $this->sort;
    }


    /**
     * @param \jtl\Connector\Model\FileDownloadI18n $i18n
     * @return \jtl\Connector\Model\FileDownload
     */
    public function addI18n(\jtl\Connector\Model\FileDownloadI18n $i18n)
    {
        $this->i18ns[] = $i18n;
        return $this;
    }
    
    /**
     * @return jtl\Connector\Model\FileDownloadI18n[]
     */
    public function getI18ns()
    {
        return $this->i18ns;
    }

    /**
     * @return \jtl\Connector\Model\FileDownload
     */
    public function clearI18ns()
    {
        $this->i18ns = array();
        return $this;
    }


}

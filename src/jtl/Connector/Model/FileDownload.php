<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * File download properties. .
 *
 * @access public
 * @package jtl\Connector\Model
 */
class FileDownload extends DataModel
{
    /**
     * @type Identity Unique fileDownload id
     */
    protected $id = null;

    /**
     * @type DateTime|null Optional creation date
     */
    protected $created = null;

    /**
     * @type string 
     */
    protected $internalId = '';

    /**
     * @type integer|null Optional max days to allow Download, starting from payment date. Default 0 for no time limit. 
     */
    protected $maxDays = 0;

    /**
     * @type integer|null Optional max number of allowed downloads per customer. Default 0 for no maximum download limit. 
     */
    protected $maxDownloads = 0;

    /**
     * @type string Path to download file
     */
    protected $path = '';

    /**
     * @type string Optional path to preview file
     */
    protected $previewPath = '';

    /**
     * @type integer|null Optional sort number
     */
    protected $sort = 0;

    /**
     * Nav [FileDownload » One]
     *
     * @type \jtl\Connector\Model\FileDownloadI18n[]
     */
    protected $i18n = array();


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'id',
    );

    /**
     * @param  string $internalId 
     * @return \jtl\Connector\Model\FileDownload
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setInternalId($internalId)
    {
        return $this->setProperty('internalId', $internalId, 'string');
    }
    
    /**
     * @return string 
     */
    public function getInternalId()
    {
        return $this->internalId;
    }

    /**
     * @param  string $path Path to download file
     * @return \jtl\Connector\Model\FileDownload
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $previewPath Optional path to preview file
     * @return \jtl\Connector\Model\FileDownload
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  integer $maxDownloads Optional max number of allowed downloads per customer. Default 0 for no maximum download limit. 
     * @return \jtl\Connector\Model\FileDownload
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setMaxDownloads($maxDownloads)
    {
        return $this->setProperty('maxDownloads', $maxDownloads, 'integer');
    }
    
    /**
     * @return integer Optional max number of allowed downloads per customer. Default 0 for no maximum download limit. 
     */
    public function getMaxDownloads()
    {
        return $this->maxDownloads;
    }

    /**
     * @param  integer $maxDays Optional max days to allow Download, starting from payment date. Default 0 for no time limit. 
     * @return \jtl\Connector\Model\FileDownload
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setMaxDays($maxDays)
    {
        return $this->setProperty('maxDays', $maxDays, 'integer');
    }
    
    /**
     * @return integer Optional max days to allow Download, starting from payment date. Default 0 for no time limit. 
     */
    public function getMaxDays()
    {
        return $this->maxDays;
    }

    /**
     * @param  DateTime $created Optional creation date
     * @return \jtl\Connector\Model\FileDownload
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setCreated(DateTime $created)
    {
        return $this->setProperty('created', $created, 'DateTime');
    }
    
    /**
     * @return DateTime Optional creation date
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param  integer $sort Optional sort number
     * @return \jtl\Connector\Model\FileDownload
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('sort', $sort, 'integer');
    }
    
    /**
     * @return integer Optional sort number
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param  Identity $id Unique fileDownload id
     * @return \jtl\Connector\Model\FileDownload
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @param  \jtl\Connector\Model\FileDownloadI18n $i18n
     * @return \jtl\Connector\Model\FileDownload
     */
    public function addI18n(\jtl\Connector\Model\FileDownloadI18n $i18n)
    {
        $this->i18n[] = $i18n;
        return $this;
    }
    
    /**
     * @return FileDownloadI18n
     */
    public function getI18n()
    {
        return $this->i18n;
    }

    /**
     * @return \jtl\Connector\Model\FileDownload
     */
    public function clearI18n()
    {
        $this->i18n = array();
        return $this;
    }
}


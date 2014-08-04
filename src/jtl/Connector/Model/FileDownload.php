<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * File download properties. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */
class FileDownload extends DataModel
{
    /**
     * @var Identity Unique fileDownload id
     */
    protected $id = null;

    /**
     * @var DateTime Optional creation date
     */
    protected $created = null;

    /**
     * @var int Optional max days to allow Download, starting from payment date. Default 0 for no time limit. 
     */
    protected $maxDays = 0;

    /**
     * @var int Optional max number of allowed downloads per customer. Default 0 for no maximum download limit. 
     */
    protected $maxDownloads = 0;

    /**
     * @var string Path to download file
     */
    protected $path = '';

    /**
     * @var string Optional path to preview file
     */
    protected $previewPath = '';

    /**
     * @var int Optional sort number
     */
    protected $sort = 0;

    /**
     * @var \jtl\Connector\Model\FileDownloadI18n[]
     */
    protected $i18n = array();

    /**
     * @param  Identity $id Unique fileDownload id
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
     * @param  DateTime $created Optional creation date
     * @return \jtl\Connector\Model\FileDownload
     * @throws \InvalidArgumentException if the provided argument is not of type 'DateTime'.
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
     * @param  int $maxDays Optional max days to allow Download, starting from payment date. Default 0 for no time limit. 
     * @return \jtl\Connector\Model\FileDownload
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setMaxDays($maxDays)
    {
        return $this->setProperty('maxDays', $maxDays, 'int');
    }

    /**
     * @return int Optional max days to allow Download, starting from payment date. Default 0 for no time limit. 
     */
    public function getMaxDays()
    {
        return $this->maxDays;
    }

    /**
     * @param  int $maxDownloads Optional max number of allowed downloads per customer. Default 0 for no maximum download limit. 
     * @return \jtl\Connector\Model\FileDownload
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setMaxDownloads($maxDownloads)
    {
        return $this->setProperty('maxDownloads', $maxDownloads, 'int');
    }

    /**
     * @return int Optional max number of allowed downloads per customer. Default 0 for no maximum download limit. 
     */
    public function getMaxDownloads()
    {
        return $this->maxDownloads;
    }

    /**
     * @param  string $path Path to download file
     * @return \jtl\Connector\Model\FileDownload
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  int $sort Optional sort number
     * @return \jtl\Connector\Model\FileDownload
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('sort', $sort, 'int');
    }

    /**
     * @return int Optional sort number
     */
    public function getSort()
    {
        return $this->sort;
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
     * @return \jtl\Connector\Model\FileDownloadI18n[]
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

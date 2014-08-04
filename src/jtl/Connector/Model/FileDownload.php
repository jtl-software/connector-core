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
     * @type string Optional creation date
     */
    protected $created = '';

    /**
     * @type int Optional max days to allow Download, starting from payment date. Default 0 for no time limit. 
     */
    protected $maxDays = 0;

    /**
     * @type int Optional max number of allowed downloads per customer. Default 0 for no maximum download limit. 
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
     * @type int Optional sort number
     */
    protected $sort = 0;

    /**
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
     * @param  Identity $id Unique fileDownload id
     * @return \jtl\Connector\Model\FileDownload
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
    }

    /**
     * @return Identity Unique fileDownload id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  string $created Optional creation date
     * @return \jtl\Connector\Model\FileDownload
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCreated(Identity $created)
    {
        return $this->setProperty('Created', $created, 'string');
    }

    /**
     * @return string Optional creation date
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param  int $maxDays Optional max days to allow Download, starting from payment date. Default 0 for no time limit. 
     * @return \jtl\Connector\Model\FileDownload
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMaxDays(Identity $maxDays)
    {
        return $this->setProperty('MaxDays', $maxDays, 'int');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMaxDownloads(Identity $maxDownloads)
    {
        return $this->setProperty('MaxDownloads', $maxDownloads, 'int');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setPath(Identity $path)
    {
        return $this->setProperty('Path', $path, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setPreviewPath(Identity $previewPath)
    {
        return $this->setProperty('PreviewPath', $previewPath, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSort(Identity $sort)
    {
        return $this->setProperty('Sort', $sort, 'int');
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

<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * FileDownload Model
 * @access public
 */
abstract class FileDownload extends Model
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var string
     */
    protected $_identificationString;
    
    /**
     * @var string
     */
    protected $_path;
    
    /**
     * @var string
     */
    protected $_previewPath;
    
    /**
     * @var int
     */
    protected $_maxDownloads;
    
    /**
     * @var int
     */
    protected $_maxDays;
    
    /**
     * @var int
     */
    protected $_sort;
    
    /**
     * @var string
     */
    protected $_created;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\FileDownload
     */
    public function setId($id)
    {
        $this->_id = (int)$id;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param string $identificationString
     * @return \jtl\Connector\Model\FileDownload
     */
    public function setIdentificationString($identificationString)
    {
        $this->_identificationString = (string)$identificationString;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getIdentificationString()
    {
        return $this->_identificationString;
    }
    
    /**
     * @param string $path
     * @return \jtl\Connector\Model\FileDownload
     */
    public function setPath($path)
    {
        $this->_path = (string)$path;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPath()
    {
        return $this->_path;
    }
    
    /**
     * @param string $previewPath
     * @return \jtl\Connector\Model\FileDownload
     */
    public function setPreviewPath($previewPath)
    {
        $this->_previewPath = (string)$previewPath;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPreviewPath()
    {
        return $this->_previewPath;
    }
    
    /**
     * @param int $maxDownloads
     * @return \jtl\Connector\Model\FileDownload
     */
    public function setMaxDownloads($maxDownloads)
    {
        $this->_maxDownloads = (int)$maxDownloads;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getMaxDownloads()
    {
        return $this->_maxDownloads;
    }
    
    /**
     * @param int $maxDays
     * @return \jtl\Connector\Model\FileDownload
     */
    public function setMaxDays($maxDays)
    {
        $this->_maxDays = (int)$maxDays;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getMaxDays()
    {
        return $this->_maxDays;
    }
    
    /**
     * @param int $sort
     * @return \jtl\Connector\Model\FileDownload
     */
    public function setSort($sort)
    {
        $this->_sort = (int)$sort;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getSort()
    {
        return $this->_sort;
    }
    
    /**
     * @param string $created
     * @return \jtl\Connector\Model\FileDownload
     */
    public function setCreated($created)
    {
        $this->_created = (string)$created;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCreated()
    {
        return $this->_created;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/FileDownload/FileDownload.json", $this->getPublic(array()));
    }
}
?>
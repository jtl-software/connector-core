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
     * @var 
     */
    protected $_id;
    
    /**
     * @var 
     */
    protected $_identificationString;
    
    /**
     * @var 
     */
    protected $_path;
    
    /**
     * @var 
     */
    protected $_previewPath;
    
    /**
     * @var 
     */
    protected $_maxDownloads;
    
    /**
     * @var 
     */
    protected $_maxDays;
    
    /**
     * @var 
     */
    protected $_sort;
    
    /**
     * @var string
     */
    protected $_created;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\FileDownload
     */
    public function setId($id)
    {
        $this->_id = ()$id;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param  $identificationString
     * @return \jtl\Connector\Model\FileDownload
     */
    public function setIdentificationString($identificationString)
    {
        $this->_identificationString = ()$identificationString;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getIdentificationString()
    {
        return $this->_identificationString;
    }
    
    /**
     * @param  $path
     * @return \jtl\Connector\Model\FileDownload
     */
    public function setPath($path)
    {
        $this->_path = ()$path;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getPath()
    {
        return $this->_path;
    }
    
    /**
     * @param  $previewPath
     * @return \jtl\Connector\Model\FileDownload
     */
    public function setPreviewPath($previewPath)
    {
        $this->_previewPath = ()$previewPath;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getPreviewPath()
    {
        return $this->_previewPath;
    }
    
    /**
     * @param  $maxDownloads
     * @return \jtl\Connector\Model\FileDownload
     */
    public function setMaxDownloads($maxDownloads)
    {
        $this->_maxDownloads = ()$maxDownloads;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getMaxDownloads()
    {
        return $this->_maxDownloads;
    }
    
    /**
     * @param  $maxDays
     * @return \jtl\Connector\Model\FileDownload
     */
    public function setMaxDays($maxDays)
    {
        $this->_maxDays = ()$maxDays;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getMaxDays()
    {
        return $this->_maxDays;
    }
    
    /**
     * @param  $sort
     * @return \jtl\Connector\Model\FileDownload
     */
    public function setSort($sort)
    {
        $this->_sort = ()$sort;
        return $this;
    }
    
    /**
     * @return 
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
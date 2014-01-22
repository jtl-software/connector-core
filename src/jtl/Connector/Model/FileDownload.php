<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * FileDownload Model
 * File download properties. 
 *
 * @access public
 */
class FileDownload extends DataModel
{
    /**
     * @var string - Unique fileDownload id
     */
    protected $_id = '';
    
    /**
     * @var string - Path to download file
     */
    protected $_path = '';
    
    /**
     * @var string - Optional path to preview file
     */
    protected $_previewPath = '';
    
    /**
     * @var int - Optional max number of allowed downloads per customer. Default 0 for no maximum download limit. 
     */
    protected $_maxDownloads = 0;
    
    /**
     * @var int - Optional max days to allow Download, starting from payment date. Default 0 for no time limit. 
     */
    protected $_maxDays = 0;
    
    /**
     * @var int - Optional sort number
     */
    protected $_sort = 0;
    
    /**
     * @var string - Optional creation date
     */
    protected $_created = '';
    
    /**
     * FileDownload Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            if ($value === null) {
                $this->$name = null;
                return;
            }
        
            switch ($name) {
                case "_id":
                case "_path":
                case "_previewPath":
                case "_created":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_maxDownloads":
                case "_maxDays":
                case "_sort":
                
                    $this->$name = (int)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id
     * @return \jtl\Connector\Model\FileDownload
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getId()
    {
        return $this->_id;
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
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}
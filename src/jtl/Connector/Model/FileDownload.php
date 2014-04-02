<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * File download properties. 
 *
 * @access public
 */
class FileDownload extends DataModel
{
    /**
     * @var string Unique fileDownload id
     */
    protected $_id = '';             
    
    /**
     * @var string Path to download file
     */
    protected $_path = '';             
    
    /**
     * @var string Optional path to preview file
     */
    protected $_previewPath = '';             
    
    /**
     * @var int Optional max number of allowed downloads per customer. Default 0 for no maximum download limit. 
     */
    protected $_maxDownloads = 0;             
    
    /**
     * @var int Optional max days to allow Download, starting from payment date. Default 0 for no time limit. 
     */
    protected $_maxDays = 0;             
    
    /**
     * @var int Optional sort number
     */
    protected $_sort = 0;             
    
    /**
     * @var string Optional creation date
     */
    protected $_created = null;             
    
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
     * @param string $id Unique fileDownload id
     * @return \jtl\Connector\Model\FileDownload
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string Unique fileDownload id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param string $path Path to download file
     * @return \jtl\Connector\Model\FileDownload
     */
    public function setPath($path)
    {
        $this->_path = (string)$path;
        return $this;
    }
    
    /**
     * @return string Path to download file
     */
    public function getPath()
    {
        return $this->_path;
    }
    /**
     * @param string $previewPath Optional path to preview file
     * @return \jtl\Connector\Model\FileDownload
     */
    public function setPreviewPath($previewPath)
    {
        $this->_previewPath = (string)$previewPath;
        return $this;
    }
    
    /**
     * @return string Optional path to preview file
     */
    public function getPreviewPath()
    {
        return $this->_previewPath;
    }
    /**
     * @param int $maxDownloads Optional max number of allowed downloads per customer. Default 0 for no maximum download limit. 
     * @return \jtl\Connector\Model\FileDownload
     */
    public function setMaxDownloads($maxDownloads)
    {
        $this->_maxDownloads = (int)$maxDownloads;
        return $this;
    }
    
    /**
     * @return int Optional max number of allowed downloads per customer. Default 0 for no maximum download limit. 
     */
    public function getMaxDownloads()
    {
        return $this->_maxDownloads;
    }
    /**
     * @param int $maxDays Optional max days to allow Download, starting from payment date. Default 0 for no time limit. 
     * @return \jtl\Connector\Model\FileDownload
     */
    public function setMaxDays($maxDays)
    {
        $this->_maxDays = (int)$maxDays;
        return $this;
    }
    
    /**
     * @return int Optional max days to allow Download, starting from payment date. Default 0 for no time limit. 
     */
    public function getMaxDays()
    {
        return $this->_maxDays;
    }
    /**
     * @param int $sort Optional sort number
     * @return \jtl\Connector\Model\FileDownload
     */
    public function setSort($sort)
    {
        $this->_sort = (int)$sort;
        return $this;
    }
    
    /**
     * @return int Optional sort number
     */
    public function getSort()
    {
        return $this->_sort;
    }
    /**
     * @param string $created Optional creation date
     * @return \jtl\Connector\Model\FileDownload
     */
    public function setCreated($created)
    {
        $this->_created = (string)$created;
        return $this;
    }
    
    /**
     * @return string Optional creation date
     */
    public function getCreated()
    {
        return $this->_created;
    }
}
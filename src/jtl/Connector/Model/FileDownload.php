<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

/**
 * File download properties. 
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
    protected $_id = null;
    
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
     * @var mixed:string
     */
    protected $_identities = array(
        '_id'
    );
    
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
                
                    $this->$name = Identity::convert($value);
                    break;
            
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
     * @param Identity $id Unique fileDownload id
     * @return \jtl\Connector\Model\FileDownload
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique fileDownload id
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
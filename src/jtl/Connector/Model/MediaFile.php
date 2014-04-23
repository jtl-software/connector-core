<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Media file model.
 *
 * @access public
 * @subpackage Product
 */
class MediaFile extends DataModel
{
    /**
     * @var Identity Unique MediaFile id
     */
    protected $_id = null;
    
    /**
     * @var Identity Reference to product
     */
    protected $_productId = null;
    
    /**
     * @var string File path
     */
    protected $_path = '';
    
    /**
     * @var string Complete URL
     */
    protected $_url = '';
    
    /**
     * @var string Optional media file category name
     */
    protected $_mediaFileCategory = '';
    
    /**
     * @var string Media file type e.g. "pdf"
     */
    protected $_type = '';
    
    /**
     * @var int Optional sort number
     */
    protected $_sort = 0;
    
    /**
     * MediaFile Setter
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
                case "_productId":
                
                    $this->$name = ($value instanceof Identity) ? $value : null;
                    break;
            
                case "_path":
                case "_url":
                case "_mediaFileCategory":
                case "_type":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_sort":
                
                    $this->$name = (int)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $id Unique MediaFile id
     * @return \jtl\Connector\Model\MediaFile
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique MediaFile id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param Identity $productId Reference to product
     * @return \jtl\Connector\Model\MediaFile
     */
    public function setProductId(Identity $productId)
    {
        $this->_productId = $productId;
        return $this;
    }
    
    /**
     * @return Identity Reference to product
     */
    public function getProductId()
    {
        return $this->_productId;
    }
    /**
     * @param string $path File path
     * @return \jtl\Connector\Model\MediaFile
     */
    public function setPath($path)
    {
        $this->_path = (string)$path;
        return $this;
    }
    
    /**
     * @return string File path
     */
    public function getPath()
    {
        return $this->_path;
    }
    /**
     * @param string $url Complete URL
     * @return \jtl\Connector\Model\MediaFile
     */
    public function setUrl($url)
    {
        $this->_url = (string)$url;
        return $this;
    }
    
    /**
     * @return string Complete URL
     */
    public function getUrl()
    {
        return $this->_url;
    }
    /**
     * @param string $mediaFileCategory Optional media file category name
     * @return \jtl\Connector\Model\MediaFile
     */
    public function setMediaFileCategory($mediaFileCategory)
    {
        $this->_mediaFileCategory = (string)$mediaFileCategory;
        return $this;
    }
    
    /**
     * @return string Optional media file category name
     */
    public function getMediaFileCategory()
    {
        return $this->_mediaFileCategory;
    }
    /**
     * @param string $type Media file type e.g. "pdf"
     * @return \jtl\Connector\Model\MediaFile
     */
    public function setType($type)
    {
        $this->_type = (string)$type;
        return $this;
    }
    
    /**
     * @return string Media file type e.g. "pdf"
     */
    public function getType()
    {
        return $this->_type;
    }
    /**
     * @param int $sort Optional sort number
     * @return \jtl\Connector\Model\MediaFile
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
}
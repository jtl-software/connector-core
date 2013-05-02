<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * MediaFile Model
 * @access public
 */
abstract class MediaFile extends Model
{
    /**
     * @var 
     */
    protected $_id;
    
    /**
     * @var 
     */
    protected $_productId;
    
    /**
     * @var 
     */
    protected $_path;
    
    /**
     * @var 
     */
    protected $_url;
    
    /**
     * @var 
     */
    protected $_mediaFileCategory;
    
    /**
     * @var 
     */
    protected $_type;
    
    /**
     * @var 
     */
    protected $_sort;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\MediaFile
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
     * @param  $productId
     * @return \jtl\Connector\Model\MediaFile
     */
    public function setProductId($productId)
    {
        $this->_productId = ()$productId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getProductId()
    {
        return $this->_productId;
    }
    
    /**
     * @param  $path
     * @return \jtl\Connector\Model\MediaFile
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
     * @param  $url
     * @return \jtl\Connector\Model\MediaFile
     */
    public function setUrl($url)
    {
        $this->_url = ()$url;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getUrl()
    {
        return $this->_url;
    }
    
    /**
     * @param  $mediaFileCategory
     * @return \jtl\Connector\Model\MediaFile
     */
    public function setMediaFileCategory($mediaFileCategory)
    {
        $this->_mediaFileCategory = ()$mediaFileCategory;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getMediaFileCategory()
    {
        return $this->_mediaFileCategory;
    }
    
    /**
     * @param  $type
     * @return \jtl\Connector\Model\MediaFile
     */
    public function setType($type)
    {
        $this->_type = ()$type;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getType()
    {
        return $this->_type;
    }
    
    /**
     * @param  $sort
     * @return \jtl\Connector\Model\MediaFile
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
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/MediaFile/MediaFile.json", $this->getPublic(array()));
    }
}
?>
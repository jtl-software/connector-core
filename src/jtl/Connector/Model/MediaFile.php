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
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_productId;
    
    /**
     * @var string
     */
    protected $_path;
    
    /**
     * @var string
     */
    protected $_url;
    
    /**
     * @var string
     */
    protected $_mediaFileCategory;
    
    /**
     * @var string
     */
    protected $_type;
    
    /**
     * @var int
     */
    protected $_sort;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\MediaFile
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
     * @param int $productId
     * @return \jtl\Connector\Model\MediaFile
     */
    public function setProductId($productId)
    {
        $this->_productId = (int)$productId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getProductId()
    {
        return $this->_productId;
    }
    
    /**
     * @param string $path
     * @return \jtl\Connector\Model\MediaFile
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
     * @param string $url
     * @return \jtl\Connector\Model\MediaFile
     */
    public function setUrl($url)
    {
        $this->_url = (string)$url;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->_url;
    }
    
    /**
     * @param string $mediaFileCategory
     * @return \jtl\Connector\Model\MediaFile
     */
    public function setMediaFileCategory($mediaFileCategory)
    {
        $this->_mediaFileCategory = (string)$mediaFileCategory;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getMediaFileCategory()
    {
        return $this->_mediaFileCategory;
    }
    
    /**
     * @param string $type
     * @return \jtl\Connector\Model\MediaFile
     */
    public function setType($type)
    {
        $this->_type = (string)$type;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getType()
    {
        return $this->_type;
    }
    
    /**
     * @param int $sort
     * @return \jtl\Connector\Model\MediaFile
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
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/MediaFile/MediaFile.json", $this->getPublic(array()));
    }
}
?>
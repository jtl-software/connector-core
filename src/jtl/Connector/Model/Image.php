<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Image Model
 * @access public
 */
abstract class Image extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var string
     */
    protected $_relationType;
    
    /**
     * @var int
     */
    protected $_foreignKey;
    
    /**
     * @var bool
     */
    protected $_isMainImage;
    
    /**
     * @var string
     */
    protected $_filename;
    
    /**
     * @var int
     */
    protected $_sort;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\Image
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
     * @param string $relationType
     * @return \jtl\Connector\Model\Image
     */
    public function setRelationType($relationType)
    {
        $this->_relationType = (string)$relationType;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getRelationType()
    {
        return $this->_relationType;
    }
    /**
     * @param int $foreignKey
     * @return \jtl\Connector\Model\Image
     */
    public function setForeignKey($foreignKey)
    {
        $this->_foreignKey = (int)$foreignKey;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getForeignKey()
    {
        return $this->_foreignKey;
    }
    /**
     * @param bool $isMainImage
     * @return \jtl\Connector\Model\Image
     */
    public function setIsMainImage($isMainImage)
    {
        $this->_isMainImage = (bool)$isMainImage;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getIsMainImage()
    {
        return $this->_isMainImage;
    }
    /**
     * @param string $filename
     * @return \jtl\Connector\Model\Image
     */
    public function setFilename($filename)
    {
        $this->_filename = (string)$filename;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getFilename()
    {
        return $this->_filename;
    }
    /**
     * @param int $sort
     * @return \jtl\Connector\Model\Image
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
}
?>
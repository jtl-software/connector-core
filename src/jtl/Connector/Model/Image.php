<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Image Model
 * Image model.
 *
 * @access public
 */
class Image extends DataModel
{
    /**
     * @var string - Unique image id
     */
    protected $_id = '';
    
    /**
     * @var string - Reference to master imageId
     */
    protected $_masterImageId = '';
    
    /**
     * @var string - Allowed values: product, category, manufacturer, specific, specificValue, configGroup, productVariationValue
     */
    protected $_relationType = 'product';
    
    /**
     * @var int - Foreign key dependent on relationType
     */
    protected $_foreignKey = 0;
    
    /**
     * @var string - Filename or path
     */
    protected $_filename = '';
    
    /**
     * @var int - Optional sort number
     */
    protected $_sort = 0;
    
    /**
     * Image Setter
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
                case "_masterImageId":
                case "_relationType":
                case "_filename":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_foreignKey":
                case "_sort":
                
                    $this->$name = (int)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id
     * @return \jtl\Connector\Model\Image
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
     * @param string $masterImageId
     * @return \jtl\Connector\Model\Image
     */
    public function setMasterImageId($masterImageId)
    {
        $this->_masterImageId = (string)$masterImageId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getMasterImageId()
    {
        return $this->_masterImageId;
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
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}
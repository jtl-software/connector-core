<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Image
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Image model.
 *
 * @access public
 * @subpackage Image
 */
class Image extends DataModel
{
    /**
     * @var Identity Unique image id
     */
    protected $_id = null;
    
    /**
     * @var Identity Reference to master imageId
     */
    protected $_masterImageId = null;
    
    /**
     * @var string Allowed values: product, category, manufacturer, specific, specificValue, configGroup, productVariationValue
     */
    protected $_relationType = 'product';
    
    /**
     * @var int Foreign key dependent on relationType
     */
    protected $_foreignKey = 0;
    
    /**
     * @var string Filename or path
     */
    protected $_filename = '';
    
    /**
     * @var int Optional sort number
     */
    protected $_sort = 0;
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        'id',
        'masterImageId'
    );
    
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
                
                    $this->$name = Identity::convert($value);
                    break;
            
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
     * @param Identity $id Unique image id
     * @return \jtl\Connector\Model\Image
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique image id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param Identity $masterImageId Reference to master imageId
     * @return \jtl\Connector\Model\Image
     */
    public function setMasterImageId(Identity $masterImageId)
    {
        $this->_masterImageId = $masterImageId;
        return $this;
    }
    
    /**
     * @return Identity Reference to master imageId
     */
    public function getMasterImageId()
    {
        return $this->_masterImageId;
    }
    /**
     * @param string $relationType Allowed values: product, category, manufacturer, specific, specificValue, configGroup, productVariationValue
     * @return \jtl\Connector\Model\Image
     */
    public function setRelationType($relationType)
    {
        $this->_relationType = (string)$relationType;
        return $this;
    }
    
    /**
     * @return string Allowed values: product, category, manufacturer, specific, specificValue, configGroup, productVariationValue
     */
    public function getRelationType()
    {
        return $this->_relationType;
    }
    /**
     * @param int $foreignKey Foreign key dependent on relationType
     * @return \jtl\Connector\Model\Image
     */
    public function setForeignKey($foreignKey)
    {
        $this->_foreignKey = (int)$foreignKey;
        return $this;
    }
    
    /**
     * @return int Foreign key dependent on relationType
     */
    public function getForeignKey()
    {
        return $this->_foreignKey;
    }
    /**
     * @param string $filename Filename or path
     * @return \jtl\Connector\Model\Image
     */
    public function setFilename($filename)
    {
        $this->_filename = (string)$filename;
        return $this;
    }
    
    /**
     * @return string Filename or path
     */
    public function getFilename()
    {
        return $this->_filename;
    }
    /**
     * @param int $sort Optional sort number
     * @return \jtl\Connector\Model\Image
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
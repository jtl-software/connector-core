<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * Image Model
 * @access public
 */
abstract class Image extends Model
{
    /**
     * @var 
     */
    protected $_id;
    
    /**
     * @var 
     */
    protected $_relationType;
    
    /**
     * @var double
     */
    protected $_foreignKey;
    
    /**
     * @var double
     */
    protected $_filename;
    
    /**
     * @var 
     */
    protected $_sort;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\Image
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
     * @param  $relationType
     * @return \jtl\Connector\Model\Image
     */
    public function setRelationType($relationType)
    {
        $this->_relationType = ()$relationType;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getRelationType()
    {
        return $this->_relationType;
    }
    
    /**
     * @param double $foreignKey
     * @return \jtl\Connector\Model\Image
     */
    public function setForeignKey($foreignKey)
    {
        $this->_foreignKey = (double)$foreignKey;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getForeignKey()
    {
        return $this->_foreignKey;
    }
    
    /**
     * @param double $filename
     * @return \jtl\Connector\Model\Image
     */
    public function setFilename($filename)
    {
        $this->_filename = (double)$filename;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getFilename()
    {
        return $this->_filename;
    }
    
    /**
     * @param  $sort
     * @return \jtl\Connector\Model\Image
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
        Schema::validateModel(CONNECTOR_DIR . "schema/Image/Image.json", $this->getPublic(array()));
    }
}
?>
<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * FileUpload Model
 * File upload properties. 
 *
 * @access public
 */
class FileUpload extends DataModel
{
    /**
     * @var string Unique fileUpload id
     */
    protected $_id = '';
    
    /**
     * @var string Reference to product
     */
    protected $_productId = '';
    
    /**
     * @var string Filename specification
     */
    protected $_name = '';
    
    /**
     * @var string Optional file description
     */
    protected $_description = '';
    
    /**
     * @var string Allowed file type
     */
    protected $_fileType = '';
    
    /**
     * @var bool Optional flag to force upload before finishing checkout. True if file upload is required to buy product
     */
    protected $_isRequired = false;
    
    /**
     * FileUpload Setter
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
                case "_name":
                case "_description":
                case "_fileType":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_isRequired":
                
                    $this->$name = (bool)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id Unique fileUpload id
     * @return \jtl\Connector\Model\FileUpload
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string Unique fileUpload id
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param string $productId Reference to product
     * @return \jtl\Connector\Model\FileUpload
     */
    public function setProductId($productId)
    {
        $this->_productId = (string)$productId;
        return $this;
    }
    
    /**
     * @return string Reference to product
     */
    public function getProductId()
    {
        return $this->_productId;
    }
    
    /**
     * @param string $name Filename specification
     * @return \jtl\Connector\Model\FileUpload
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string Filename specification
     */
    public function getName()
    {
        return $this->_name;
    }
    
    /**
     * @param string $description Optional file description
     * @return \jtl\Connector\Model\FileUpload
     */
    public function setDescription($description)
    {
        $this->_description = (string)$description;
        return $this;
    }
    
    /**
     * @return string Optional file description
     */
    public function getDescription()
    {
        return $this->_description;
    }
    
    /**
     * @param string $fileType Allowed file type
     * @return \jtl\Connector\Model\FileUpload
     */
    public function setFileType($fileType)
    {
        $this->_fileType = (string)$fileType;
        return $this;
    }
    
    /**
     * @return string Allowed file type
     */
    public function getFileType()
    {
        return $this->_fileType;
    }
    
    /**
     * @param bool $isRequired Optional flag to force upload before finishing checkout. True if file upload is required to buy product
     * @return \jtl\Connector\Model\FileUpload
     */
    public function setIsRequired($isRequired)
    {
        $this->_isRequired = (bool)$isRequired;
        return $this;
    }
    
    /**
     * @return bool Optional flag to force upload before finishing checkout. True if file upload is required to buy product
     */
    public function getIsRequired()
    {
        return $this->_isRequired;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}
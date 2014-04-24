<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

/**
 * File upload properties. 
 *
 * @access public
 * @subpackage Product
 */
class FileUpload extends DataModel
{
    /**
     * @var Identity Unique fileUpload id
     */
    protected $_id = null;
    
    /**
     * @var Identity Reference to product
     */
    protected $_productId = null;
    
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
     * @var mixed:string
     */
    protected $_identities = array(
        '_id',
        '_productId'
    );
    
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
                
                    $this->$name = Identity::convert($value);
                    break;
            
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
     * @param Identity $id Unique fileUpload id
     * @return \jtl\Connector\Model\FileUpload
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique fileUpload id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param Identity $productId Reference to product
     * @return \jtl\Connector\Model\FileUpload
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
}
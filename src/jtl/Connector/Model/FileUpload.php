<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * FileUpload Model
 * @access public
 */
abstract class FileUpload extends Model
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
     * @var int
     */
    protected $_name;
    
    /**
     * @var string
     */
    protected $_description;
    
    /**
     * @var double
     */
    protected $_fileType;
    
    /**
     * @var 
     */
    protected $_required;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\FileUpload
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
     * @return \jtl\Connector\Model\FileUpload
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
     * @param int $name
     * @return \jtl\Connector\Model\FileUpload
     */
    public function setName($name)
    {
        $this->_name = (int)$name;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getName()
    {
        return $this->_name;
    }
    
    /**
     * @param string $description
     * @return \jtl\Connector\Model\FileUpload
     */
    public function setDescription($description)
    {
        $this->_description = (string)$description;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->_description;
    }
    
    /**
     * @param double $fileType
     * @return \jtl\Connector\Model\FileUpload
     */
    public function setFileType($fileType)
    {
        $this->_fileType = (double)$fileType;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getFileType()
    {
        return $this->_fileType;
    }
    
    /**
     * @param  $required
     * @return \jtl\Connector\Model\FileUpload
     */
    public function setRequired($required)
    {
        $this->_required = ()$required;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getRequired()
    {
        return $this->_required;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/FileUpload/FileUpload.json", $this->getPublic(array()));
    }
}
?>
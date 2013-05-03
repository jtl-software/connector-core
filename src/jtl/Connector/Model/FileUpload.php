<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * FileUpload Model
 * @access public
 */
abstract class FileUpload extends DataModel
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
    protected $_name;
    
    /**
     * @var string
     */
    protected $_description;
    
    /**
     * @var string
     */
    protected $_fileType;
    
    /**
     * @var int
     */
    protected $_required;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\FileUpload
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
     * @return \jtl\Connector\Model\FileUpload
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
     * @param string $name
     * @return \jtl\Connector\Model\FileUpload
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string
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
     * @param string $fileType
     * @return \jtl\Connector\Model\FileUpload
     */
    public function setFileType($fileType)
    {
        $this->_fileType = (string)$fileType;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getFileType()
    {
        return $this->_fileType;
    }
    /**
     * @param int $required
     * @return \jtl\Connector\Model\FileUpload
     */
    public function setRequired($required)
    {
        $this->_required = (int)$required;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getRequired()
    {
        return $this->_required;
    }
}
?>
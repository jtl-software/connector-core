<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * File upload properties. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 */
class FileUpload extends DataModel
{
    /**
     * @var Identity Unique fileUpload id
     */
    protected $id = null;

    /**
     * @var Identity Reference to product
     */
    protected $productId = null;

    /**
     * @var string Optional file description
     */
    protected $description = '';

    /**
     * @var string Allowed file type
     */
    protected $fileType = '';

    /**
     * @var bool Optional flag to force upload before finishing checkout. True if file upload is required to buy product
     */
    protected $isRequired = false;

    /**
     * @var string Filename specification
     */
    protected $name = '';

    /**
     * @param  Identity $id Unique fileUpload id
     * @return \jtl\Connector\Model\FileUpload
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity Unique fileUpload id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $productId Reference to product
     * @return \jtl\Connector\Model\FileUpload
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('productId', $productId, 'Identity');
    }

    /**
     * @return Identity Reference to product
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param  string $description Optional file description
     * @return \jtl\Connector\Model\FileUpload
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setDescription($description)
    {
        return $this->setProperty('description', $description, 'string');
    }

    /**
     * @return string Optional file description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param  string $fileType Allowed file type
     * @return \jtl\Connector\Model\FileUpload
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setFileType($fileType)
    {
        return $this->setProperty('fileType', $fileType, 'string');
    }

    /**
     * @return string Allowed file type
     */
    public function getFileType()
    {
        return $this->fileType;
    }

    /**
     * @param  bool $isRequired Optional flag to force upload before finishing checkout. True if file upload is required to buy product
     * @return \jtl\Connector\Model\FileUpload
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setIsRequired($isRequired)
    {
        return $this->setProperty('isRequired', $isRequired, 'bool');
    }

    /**
     * @return bool Optional flag to force upload before finishing checkout. True if file upload is required to buy product
     */
    public function getIsRequired()
    {
        return $this->isRequired;
    }

    /**
     * @param  string $name Filename specification
     * @return \jtl\Connector\Model\FileUpload
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }

    /**
     * @return string Filename specification
     */
    public function getName()
    {
        return $this->name;
    }

 
}

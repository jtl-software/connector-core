<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * File upload properties. .
 *
 * @access public
 * @package jtl\Connector\Model
 */
class FileUpload extends DataModel
{
    /**
     * @type Identity Unique fileUpload id
     */
    protected $id = null;

    /**
     * @type Identity Reference to product
     */
    protected $productId = null;

    /**
     * @type string Optional file description
     */
    protected $description = '';

    /**
     * @type string Allowed file type
     */
    protected $fileType = '';

    /**
     * @type bool Optional flag to force upload before finishing checkout. True if file upload is required to buy product
     */
    protected $isRequired = false;

    /**
     * @type string Filename specification
     */
    protected $name = '';

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'id',
        'productId',
    );

    /**
     * @param  Identity $id Unique fileUpload id
     * @return \jtl\Connector\Model\FileUpload
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('ProductId', $productId, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setDescription(Identity $description)
    {
        return $this->setProperty('Description', $description, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setFileType(Identity $fileType)
    {
        return $this->setProperty('FileType', $fileType, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setIsRequired(Identity $isRequired)
    {
        return $this->setProperty('IsRequired', $isRequired, 'bool');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setName(Identity $name)
    {
        return $this->setProperty('Name', $name, 'string');
    }

    /**
     * @return string Filename specification
     */
    public function getName()
    {
        return $this->name;
    }

 
}

<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * File upload properties.
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class FileUpload extends AbstractIdentity
{
    /**
     * @var Identity Reference to product
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("productId")
     * @Serializer\Accessor(getter="getProductId",setter="setProductId")
     */
    protected $productId = null;
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("fileType")
     * @Serializer\Accessor(getter="getFileType",setter="setFileType")
     */
    protected $fileType = '';
    
    /**
     * @var boolean
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isRequired")
     * @Serializer\Accessor(getter="getIsRequired",setter="setIsRequired")
     */
    protected $isRequired = false;
    
    /**
     * @var FileUploadI18n[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\FileUploadI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected $i18ns = [];

    /**
     * Constructor.
     * @param string $endpoint
     * @param int $host
     */
    public function __construct(string $endpoint = '', int $host = 0)
    {
        parent::__construct($endpoint, $host);
        $this->productId = new Identity();
    }

    /**
     * @param Identity $productId Reference to product
     * @return FileUpload
     */
    public function setProductId(Identity $productId): FileUpload
    {
        $this->productId = $productId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to product
     */
    public function getProductId(): Identity
    {
        return $this->productId;
    }
    
    /**
     * @param string $fileType
     * @return FileUpload
     */
    public function setFileType(string $fileType): FileUpload
    {
        $this->fileType = $fileType;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getFileType(): string
    {
        return $this->fileType;
    }
    
    /**
     * @param boolean $isRequired
     * @return FileUpload
     */
    public function setIsRequired(bool $isRequired): FileUpload
    {
        $this->isRequired = $isRequired;
        
        return $this;
    }
    
    /**
     * @return boolean
     */
    public function getIsRequired(): bool
    {
        return $this->isRequired;
    }
    
    /**
     * @param FileUploadI18n $i18n
     * @return FileUpload
     */
    public function addI18n(FileUploadI18n $i18n): FileUpload
    {
        $this->i18ns[] = $i18n;
        
        return $this;
    }

    /**
     * @param FileUploadI18n ...$i18ns
     * @return FileUpload
     */
    public function setI18ns(FileUploadI18n ...$i18ns): FileUpload
    {
        $this->i18ns = $i18ns;
        
        return $this;
    }
    
    /**
     * @return FileUploadI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }
    
    /**
     * @return FileUpload
     */
    public function clearI18ns(): FileUpload
    {
        $this->i18ns = [];
        
        return $this;
    }
}

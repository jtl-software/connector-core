<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;

/**
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductFileDownload extends DataModel
{
    /**
     * @var Identity
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("productId")
     * @Serializer\Accessor(getter="getProductId",setter="setProductId")
     */
    protected $productId = null;
    
    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("creationDate")
     * @Serializer\Accessor(getter="getCreationDate",setter="setCreationDate")
     */
    protected $creationDate = null;
    
    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("maxDays")
     * @Serializer\Accessor(getter="getMaxDays",setter="setMaxDays")
     */
    protected $maxDays = 0;
    
    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("maxDownloads")
     * @Serializer\Accessor(getter="getMaxDownloads",setter="setMaxDownloads")
     */
    protected $maxDownloads = 0;
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("path")
     * @Serializer\Accessor(getter="getPath",setter="setPath")
     */
    protected $path = '';
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("previewPath")
     * @Serializer\Accessor(getter="getPreviewPath",setter="setPreviewPath")
     */
    protected $previewPath = '';
    
    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("sort")
     * @Serializer\Accessor(getter="getSort",setter="setSort")
     */
    protected $sort = 0;
    
    /**
     * @var ProductFileDownloadI18n[]
     * @Serializer\Type("array<jtl\Connector\Model\ProductFileDownloadI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected $i18ns = [];
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productId = new Identity();
    }
    
    /**
     * @param Identity $productId
     * @return ProductFileDownload
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId): ProductFileDownload
    {
        $this->productId = $productId;
        
        return $this;
    }
    
    /**
     * @return Identity
     */
    public function getProductId(): Identity
    {
        return $this->productId;
    }
    
    /**
     * @param \DateTimeInterface $creationDate
     * @return ProductFileDownload
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setCreationDate(\DateTimeInterface $creationDate = null): ProductFileDownload
    {
        $this->creationDate = $creationDate;
        
        return $this;
    }
    
    /**
     * @return DateTime
     */
    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }
    
    /**
     * @param integer $maxDays
     * @return ProductFileDownload
     */
    public function setMaxDays(int $maxDays): ProductFileDownload
    {
        $this->maxDays = $maxDays;
        
        return $this;
    }
    
    /**
     * @return integer
     */
    public function getMaxDays(): int
    {
        return $this->maxDays;
    }
    
    /**
     * @param integer $maxDownloads
     * @return ProductFileDownload
     */
    public function setMaxDownloads(int $maxDownloads): ProductFileDownload
    {
        $this->maxDownloads = $maxDownloads;
        
        return $this;
    }
    
    /**
     * @return integer
     */
    public function getMaxDownloads(): int
    {
        return $this->maxDownloads;
    }
    
    /**
     * @param string $path
     * @return ProductFileDownload
     */
    public function setPath(string $path): ProductFileDownload
    {
        $this->path = $path;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }
    
    /**
     * @param string $previewPath
     * @return ProductFileDownload
     */
    public function setPreviewPath(string $previewPath): ProductFileDownload
    {
        $this->previewPath = $previewPath;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPreviewPath(): string
    {
        return $this->previewPath;
    }
    
    /**
     * @param integer $sort
     * @return ProductFileDownload
     */
    public function setSort(int $sort): ProductFileDownload
    {
        $this->sort = $sort;
        
        return $this;
    }
    
    /**
     * @return integer
     */
    public function getSort(): int
    {
        return $this->sort;
    }
    
    /**
     * @param ProductFileDownloadI18n $i18n
     * @return ProductFileDownload
     */
    public function addI18n(ProductFileDownloadI18n $i18n): ProductFileDownload
    {
        $this->i18ns[] = $i18n;
        
        return $this;
    }
    
    /**
     * @param array $i18ns
     * @return ProductFileDownload
     */
    public function setI18ns(array $i18ns): ProductFileDownload
    {
        $this->i18ns = $i18ns;
        
        return $this;
    }
    
    /**
     * @return ProductFileDownloadI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }
    
    /**
     * @return ProductFileDownload
     */
    public function clearI18ns(): ProductFileDownload
    {
        $this->i18ns = [];
        
        return $this;
    }
}

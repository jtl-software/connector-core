<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;

/**
 * Media file model.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductMediaFile extends DataModel
{
    /**
     * @var Identity Unique MediaFile id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;
    
    /**
     * @var Identity Reference to product
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("productId")
     * @Serializer\Accessor(getter="getProductId",setter="setProductId")
     */
    protected $productId = null;
    
    /**
     * @var string Optional media file category name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("mediaFileCategory")
     * @Serializer\Accessor(getter="getMediaFileCategory",setter="setMediaFileCategory")
     */
    protected $mediaFileCategory = '';
    
    /**
     * @var string File path
     * @Serializer\Type("string")
     * @Serializer\SerializedName("path")
     * @Serializer\Accessor(getter="getPath",setter="setPath")
     */
    protected $path = '';
    
    /**
     * @var string Optional sort number
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("sort")
     * @Serializer\Accessor(getter="getSort",setter="setSort")
     */
    protected $sort = 0;
    
    /**
     * @var string Media file type e.g. 'pdf'
     * @Serializer\Type("string")
     * @Serializer\SerializedName("type")
     * @Serializer\Accessor(getter="getType",setter="setType")
     */
    protected $type = '';
    
    /**
     * @var string Complete URL
     * @Serializer\Type("string")
     * @Serializer\SerializedName("url")
     * @Serializer\Accessor(getter="getUrl",setter="setUrl")
     */
    protected $url = '';
    
    /**
     * @var ProductMediaFileAttr[]
     * @Serializer\Type("array<jtl\Connector\Model\ProductMediaFileAttr>")
     * @Serializer\SerializedName("attributes")
     * @Serializer\AccessType("reflection")
     */
    protected $attributes = [];
    
    /**
     * @var ProductMediaFileI18n[]
     * @Serializer\Type("array<jtl\Connector\Model\ProductMediaFileI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected $i18ns = [];
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
        $this->productId = new Identity();
    }
    
    /**
     * @param Identity $id Unique MediaFile id
     * @return ProductMediaFile
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): ProductMediaFile
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity Unique MediaFile id
     */
    public function getId(): Identity
    {
        return $this->id;
    }
    
    /**
     * @param Identity $productId Reference to product
     * @return ProductMediaFile
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId): ProductMediaFile
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
     * @param string $mediaFileCategory Optional media file category name
     * @return ProductMediaFile
     */
    public function setMediaFileCategory(string $mediaFileCategory): ProductMediaFile
    {
        $this->mediaFileCategory = $mediaFileCategory;
        
        return $this;
    }
    
    /**
     * @return string Optional media file category name
     */
    public function getMediaFileCategory(): string
    {
        return $this->mediaFileCategory;
    }
    
    /**
     * @param string $path File path
     * @return ProductMediaFile
     */
    public function setPath(string $path): ProductMediaFile
    {
        $this->path = $path;
        
        return $this;
    }
    
    /**
     * @return string File path
     */
    public function getPath(): string
    {
        return $this->path;
    }
    
    /**
     * @param integer $sort Optional sort number
     * @return ProductMediaFile
     */
    public function setSort(int $sort): ProductMediaFile
    {
        $this->sort = $sort;
        
        return $this;
    }
    
    /**
     * @return integer Optional sort number
     */
    public function getSort(): int
    {
        return $this->sort;
    }
    
    /**
     * @param string $type Media file type e.g. 'pdf'
     * @return ProductMediaFile
     */
    public function setType(string $type): ProductMediaFile
    {
        $this->type = $type;
        
        return $this;
    }
    
    /**
     * @return string Media file type e.g. 'pdf'
     */
    public function getType(): string
    {
        return $this->type;
    }
    
    /**
     * @param string $url Complete URL
     * @return ProductMediaFile
     */
    public function setUrl(string $url): ProductMediaFile
    {
        $this->url = $url;
        
        return $this;
    }
    
    /**
     * @return string Complete URL
     */
    public function getUrl(): string
    {
        return $this->url;
    }
    
    /**
     * @param ProductMediaFileAttr $attribute
     * @return ProductMediaFile
     */
    public function addAttribute(ProductMediaFileAttr $attribute): ProductMediaFile
    {
        $this->attributes[] = $attribute;
        
        return $this;
    }
    
    /**
     * @param array $attributes
     * @return ProductMediaFile
     */
    public function setAttributes(array $attributes): ProductMediaFile
    {
        $this->attributes = $attributes;
        
        return $this;
    }
    
    /**
     * @return ProductMediaFileAttr[]
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }
    
    /**
     * @return ProductMediaFile
     */
    public function clearAttributes(): ProductMediaFile
    {
        $this->attributes = [];
        
        return $this;
    }
    
    /**
     * @param ProductMediaFileI18n $i18n
     * @return ProductMediaFile
     */
    public function addI18n(ProductMediaFileI18n $i18n): ProductMediaFile
    {
        $this->i18ns[] = $i18n;
        
        return $this;
    }
    
    /**
     * @param array $i18ns
     * @return ProductMediaFile
     */
    public function setI18ns(array $i18ns): ProductMediaFile
    {
        $this->i18ns = $i18ns;
        
        return $this;
    }
    
    /**
     * @return ProductMediaFileI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }
    
    /**
     * @return ProductMediaFile
     */
    public function clearI18ns(): ProductMediaFile
    {
        $this->i18ns = [];
        
        return $this;
    }
}

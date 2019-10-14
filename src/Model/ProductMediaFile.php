<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
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
     * @var \jtl\Connector\Model\ProductMediaFileAttr[]
     * @Serializer\Type("array<jtl\Connector\Model\ProductMediaFileAttr>")
     * @Serializer\SerializedName("attributes")
     * @Serializer\AccessType("reflection")
     */
    protected $attributes = [];
    
    /**
     * @var \jtl\Connector\Model\ProductMediaFileI18n[]
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
     * @return \jtl\Connector\Model\ProductMediaFile
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
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
     * @return \jtl\Connector\Model\ProductMediaFile
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        $this->productId = $productId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to product
     */
    public function getProductId()
    {
        return $this->productId;
    }
    
    /**
     * @param string $mediaFileCategory Optional media file category name
     * @return \jtl\Connector\Model\ProductMediaFile
     */
    public function setMediaFileCategory($mediaFileCategory)
    {
        $this->mediaFileCategory = $mediaFileCategory;
        
        return $this;
    }
    
    /**
     * @return string Optional media file category name
     */
    public function getMediaFileCategory()
    {
        return $this->mediaFileCategory;
    }
    
    /**
     * @param string $path File path
     * @return \jtl\Connector\Model\ProductMediaFile
     */
    public function setPath($path)
    {
        $this->path = $path;
        
        return $this;
    }
    
    /**
     * @return string File path
     */
    public function getPath()
    {
        return $this->path;
    }
    
    /**
     * @param integer $sort Optional sort number
     * @return \jtl\Connector\Model\ProductMediaFile
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
        
        return $this;
    }
    
    /**
     * @return integer Optional sort number
     */
    public function getSort()
    {
        return $this->sort;
    }
    
    /**
     * @param string $type Media file type e.g. 'pdf'
     * @return \jtl\Connector\Model\ProductMediaFile
     */
    public function setType($type)
    {
        $this->type = $type;
        
        return $this;
    }
    
    /**
     * @return string Media file type e.g. 'pdf'
     */
    public function getType()
    {
        return $this->type;
    }
    
    /**
     * @param string $url Complete URL
     * @return \jtl\Connector\Model\ProductMediaFile
     */
    public function setUrl($url)
    {
        $this->url = $url;
        
        return $this;
    }
    
    /**
     * @return string Complete URL
     */
    public function getUrl()
    {
        return $this->url;
    }
    
    /**
     * @param \jtl\Connector\Model\ProductMediaFileAttr $attribute
     * @return \jtl\Connector\Model\ProductMediaFile
     */
    public function addAttribute(\jtl\Connector\Model\ProductMediaFileAttr $attribute)
    {
        $this->attributes[] = $attribute;
        
        return $this;
    }
    
    /**
     * @param array $attributes
     * @return \jtl\Connector\Model\ProductMediaFile
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;
        
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\ProductMediaFileAttr[]
     */
    public function getAttributes()
    {
        return $this->attributes;
    }
    
    /**
     * @return \jtl\Connector\Model\ProductMediaFile
     */
    public function clearAttributes()
    {
        $this->attributes = [];
        
        return $this;
    }
    
    /**
     * @param \jtl\Connector\Model\ProductMediaFileI18n $i18n
     * @return \jtl\Connector\Model\ProductMediaFile
     */
    public function addI18n(\jtl\Connector\Model\ProductMediaFileI18n $i18n)
    {
        $this->i18ns[] = $i18n;
        
        return $this;
    }
    
    /**
     * @param array $i18ns
     * @return \jtl\Connector\Model\ProductMediaFile
     */
    public function setI18ns(array $i18ns)
    {
        $this->i18ns = $i18ns;
        
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\ProductMediaFileI18n[]
     */
    public function getI18ns()
    {
        return $this->i18ns;
    }
    
    /**
     * @return \jtl\Connector\Model\ProductMediaFile
     */
    public function clearI18ns()
    {
        $this->i18ns = [];
        
        return $this;
    }
}

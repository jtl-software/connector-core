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
     * @var \jtl\Connector\Model\ProductFileDownloadI18n[]
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
     * @return \jtl\Connector\Model\ProductFileDownload
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        $this->productId = $productId;
        
        return $this;
    }
    
    /**
     * @return Identity
     */
    public function getProductId()
    {
        return $this->productId;
    }
    
    /**
     * @param DateTime $creationDate
     * @return \jtl\Connector\Model\ProductFileDownload
     * @throws \InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setCreationDate(DateTime $creationDate = null)
    {
        $this->creationDate = $creationDate;
        
        return $this;
    }
    
    /**
     * @return DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }
    
    /**
     * @param integer $maxDays
     * @return \jtl\Connector\Model\ProductFileDownload
     */
    public function setMaxDays($maxDays)
    {
        $this->maxDays = $maxDays;
        
        return $this;
    }
    
    /**
     * @return integer
     */
    public function getMaxDays()
    {
        return $this->maxDays;
    }
    
    /**
     * @param integer $maxDownloads
     * @return \jtl\Connector\Model\ProductFileDownload
     */
    public function setMaxDownloads($maxDownloads)
    {
        $this->maxDownloads = $maxDownloads;
        
        return $this;
    }
    
    /**
     * @return integer
     */
    public function getMaxDownloads()
    {
        return $this->maxDownloads;
    }
    
    /**
     * @param string $path
     * @return \jtl\Connector\Model\ProductFileDownload
     */
    public function setPath($path)
    {
        $this->path = $path;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }
    
    /**
     * @param string $previewPath
     * @return \jtl\Connector\Model\ProductFileDownload
     */
    public function setPreviewPath($previewPath)
    {
        $this->previewPath = $previewPath;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPreviewPath()
    {
        return $this->previewPath;
    }
    
    /**
     * @param integer $sort
     * @return \jtl\Connector\Model\ProductFileDownload
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
        
        return $this;
    }
    
    /**
     * @return integer
     */
    public function getSort()
    {
        return $this->sort;
    }
    
    /**
     * @param \jtl\Connector\Model\ProductFileDownloadI18n $i18n
     * @return \jtl\Connector\Model\ProductFileDownload
     */
    public function addI18n(\jtl\Connector\Model\ProductFileDownloadI18n $i18n)
    {
        $this->i18ns[] = $i18n;
        
        return $this;
    }
    
    /**
     * @param array $i18ns
     * @return \jtl\Connector\Model\ProductFileDownload
     */
    public function setI18ns(array $i18ns)
    {
        $this->i18ns = $i18ns;
        
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\ProductFileDownloadI18n[]
     */
    public function getI18ns()
    {
        return $this->i18ns;
    }
    
    /**
     * @return \jtl\Connector\Model\ProductFileDownload
     */
    public function clearI18ns()
    {
        $this->i18ns = [];
        
        return $this;
    }
}

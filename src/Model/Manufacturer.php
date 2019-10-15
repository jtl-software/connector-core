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
 * Manufacturer / brand properties.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class Manufacturer extends DataModel
{
    /**
     * @var Identity Unique manufacturer id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;
    
    /**
     * @var string Manufacturer (brand) name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';
    
    /**
     * @var integer Optional sort number
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("sort")
     * @Serializer\Accessor(getter="getSort",setter="setSort")
     */
    protected $sort = 0;
    
    /**
     * @var string Optional url path e.g. 'Products-manufactured-by-X'
     * @Serializer\Type("string")
     * @Serializer\SerializedName("urlPath")
     * @Serializer\Accessor(getter="getUrlPath",setter="setUrlPath")
     */
    protected $urlPath = '';
    
    /**
     * @var string Optional manufacturer website URL
     * @Serializer\Type("string")
     * @Serializer\SerializedName("websiteUrl")
     * @Serializer\Accessor(getter="getWebsiteUrl",setter="setWebsiteUrl")
     */
    protected $websiteUrl = '';
    
    /**
     * @var ManufacturerI18n[]
     * @Serializer\Type("array<jtl\Connector\Model\ManufacturerI18n>")
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
    }
    
    /**
     * @param Identity $id Unique manufacturer id
     * @return Manufacturer
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): Manufacturer
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity Unique manufacturer id
     */
    public function getId(): Identity
    {
        return $this->id;
    }
    
    /**
     * @param string $name Manufacturer (brand) name
     * @return Manufacturer
     */
    public function setName(string $name): Manufacturer
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return string Manufacturer (brand) name
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * @param integer $sort Optional sort number
     * @return Manufacturer
     */
    public function setSort(int $sort): Manufacturer
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
     * @param string $urlPath Optional url path e.g. 'Products-manufactured-by-X'
     * @return Manufacturer
     */
    public function setUrlPath(string $urlPath): Manufacturer
    {
        $this->urlPath = $urlPath;
        
        return $this;
    }
    
    /**
     * @return string Optional url path e.g. 'Products-manufactured-by-X'
     */
    public function getUrlPath(): string
    {
        return $this->urlPath;
    }
    
    /**
     * @param string $websiteUrl Optional manufacturer website URL
     * @return Manufacturer
     */
    public function setWebsiteUrl(string $websiteUrl): Manufacturer
    {
        $this->websiteUrl = $websiteUrl;
        
        return $this;
    }
    
    /**
     * @return string Optional manufacturer website URL
     */
    public function getWebsiteUrl(): string
    {
        return $this->websiteUrl;
    }
    
    /**
     * @param ManufacturerI18n $i18n
     * @return Manufacturer
     */
    public function addI18n(ManufacturerI18n $i18n): Manufacturer
    {
        $this->i18ns[] = $i18n;
        
        return $this;
    }
    
    /**
     * @param array $i18ns
     * @return Manufacturer
     */
    public function setI18ns(array $i18ns): Manufacturer
    {
        $this->i18ns = $i18ns;
        
        return $this;
    }
    
    /**
     * @return ManufacturerI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }
    
    /**
     * @return Manufacturer
     */
    public function clearI18ns(): Manufacturer
    {
        $this->i18ns = [];
        
        return $this;
    }
}

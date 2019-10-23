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
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class Image extends DataModel
{
    /**
     * @var Identity
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("foreignKey")
     * @Serializer\Accessor(getter="getForeignKey",setter="setForeignKey")
     */
    protected $foreignKey = null;
    
    /**
     * @var Identity
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("filename")
     * @Serializer\Accessor(getter="getFilename",setter="setFilename")
     */
    protected $filename = '';
    
    /**
     * @var ImageRelationType
     * @Serializer\Type("string")
     * @Serializer\SerializedName("relationType")
     * @Serializer\Accessor(getter="getRelationType",setter="setRelationType")
     */
    protected $relationType = '';
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("remoteUrl")
     * @Serializer\Accessor(getter="getRemoteUrl",setter="setRemoteUrl")
     */
    protected $remoteUrl = '';
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';
    
    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("sort")
     * @Serializer\Accessor(getter="getSort",setter="setSort")
     */
    protected $sort = 0;
    
    /**
     * @var ImageI18n[]
     * @Serializer\Type("array<jtl\Connector\Model\ImageI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected $i18ns = [];
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->foreignKey = new Identity();
        $this->id = new Identity();
    }
    
    /**
     * @param Identity $foreignKey
     * @return Image
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setForeignKey(Identity $foreignKey): Image
    {
        $this->foreignKey = $foreignKey;
        
        return $this;
    }
    
    /**
     * @return Identity
     */
    public function getForeignKey(): Identity
    {
        return $this->foreignKey;
    }
    
    /**
     * @param Identity $id
     * @return Image
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): Image
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity
     */
    public function getId(): Identity
    {
        return $this->id;
    }
    
    /**
     * @param string $filename
     * @return Image
     */
    public function setFilename(string $filename): Image
    {
        $this->filename = $filename;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename;
    }
    
    /**
     * @param string $relationType
     * @return Image
     */
    public function setRelationType(string $relationType): Image
    {
        $this->relationType = $relationType;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getRelationType(): string
    {
        return $this->relationType;
    }
    
    /**
     * @param string $remoteUrl
     * @return Image
     */
    public function setRemoteUrl(string $remoteUrl): Image
    {
        $this->remoteUrl = $remoteUrl;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getRemoteUrl(): string
    {
        return $this->remoteUrl;
    }
    
    /**
     * @param string $name
     * @return Image
     */
    public function setName(string $name): Image
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * @param integer $sort
     * @return Image
     */
    public function setSort(int $sort): Image
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
     * @param ImageI18n $i18n
     * @return Image
     */
    public function addI18n(ImageI18n $i18n): Image
    {
        $this->i18ns[] = $i18n;
        
        return $this;
    }

    /**
     * @param ImageI18n ...$i18ns
     * @return Image
     */
    public function setI18ns(ImageI18n ...$i18ns): Image
    {
        $this->i18ns = $i18ns;
        
        return $this;
    }
    
    /**
     * @return ImageI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }
    
    /**
     * @return Image
     */
    public function clearI18ns(): Image
    {
        $this->i18ns = [];
        
        return $this;
    }
}

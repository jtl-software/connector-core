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
class CategoryAttrI18n extends DataModel
{
    /**
     * @var Identity
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("categoryAttrId")
     * @Serializer\Accessor(getter="getCategoryAttrId",setter="setCategoryAttrId")
     */
    protected $categoryAttrId = null;
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("languageISO")
     * @Serializer\Accessor(getter="getLanguageISO",setter="setLanguageISO")
     */
    protected $languageISO = '';
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("value")
     * @Serializer\Accessor(getter="getValue",setter="setValue")
     */
    protected $value = '';
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categoryAttrId = new Identity();
    }
    
    /**
     * @param Identity $categoryAttrId
     * @return CategoryAttrI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCategoryAttrId(Identity $categoryAttrId): CategoryAttrI18n
    {
        $this->categoryAttrId = $categoryAttrId;
        
        return $this;
    }
    
    /**
     * @return Identity
     */
    public function getCategoryAttrId(): Identity
    {
        return $this->categoryAttrId;
    }
    
    /**
     * @param string $languageISO
     * @return CategoryAttrI18n
     */
    public function setLanguageISO(string $languageISO): CategoryAttrI18n
    {
        $this->languageISO = $languageISO;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getLanguageISO(): string
    {
        return $this->languageISO;
    }
    
    /**
     * @param string $name
     * @return CategoryAttrI18n
     */
    public function setName(
        string $name
    ): CategoryAttrI18n {
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
     * @param string $value
     * @return CategoryAttrI18n
     */
    public function setValue(string $value): CategoryAttrI18n
    {
        $this->value = $value;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}

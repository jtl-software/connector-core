<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;

/**
 * Localized category attribute
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CategoryAttr extends AbstractI18nAttribute
{
    /**
     * @var Identity Reference to category
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("categoryId")
     * @Serializer\Accessor(getter="getCategoryId",setter="setCategoryId")
     */
    protected $categoryId = null;

    /**
     * @var CategoryAttrI18n[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\CategoryAttrI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected $i18ns = [];
    
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->categoryId = new Identity();
    }
    
    /**
     * @param Identity $categoryId Reference to category
     * @return CategoryAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCategoryId(Identity $categoryId): CategoryAttr
    {
        $this->categoryId = $categoryId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to category
     */
    public function getCategoryId(): Identity
    {
        return $this->categoryId;
    }

    /**
     * @param CategoryAttrI18n $i18n
     * @return CategoryAttr
     */
    public function addI18n(CategoryAttrI18n $i18n): CategoryAttr
    {
        $this->i18ns[] = $i18n;
        
        return $this;
    }
    
    /**
     * @param CategoryI18n ...$i18ns
     * @return CategoryAttr
     */
    public function setI18ns(CategoryI18n ...$i18ns): CategoryAttr
    {
        $this->i18ns = $i18ns;
        
        return $this;
    }
    
    /**
     * @return CategoryAttrI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }
    
    /**
     * @return CategoryAttr
     */
    public function clearI18ns(): CategoryAttr
    {
        $this->i18ns = [];
        
        return $this;
    }
}

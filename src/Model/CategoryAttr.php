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
 * Localized category attribute
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CategoryAttr extends AbstractI18nAttribute
{
    /**
     * @var CategoryAttrI18n[]
     * @Serializer\Type("array<jtl\Connector\Model\CategoryAttrI18n>")
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

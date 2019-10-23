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
 * Localized product attribute.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductAttr extends AbstractI18nAttribute
{
    /**
     * @var ProductAttrI18n[]
     * @Serializer\Type("array<jtl\Connector\Model\ProductAttrI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected $i18ns = [];

    /**
     * ProductAttr constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param ProductAttrI18n $i18n
     * @return ProductAttr
     */
    public function addI18n(ProductAttrI18n $i18n): ProductAttr
    {
        $this->i18ns[] = $i18n;
        
        return $this;
    }

    /**
     * @param ProductAttrI18n ...$i18ns
     * @return ProductAttr
     */
    public function setI18ns(ProductAttrI18n ...$i18ns): ProductAttr
    {
        $this->i18ns = $i18ns;
        
        return $this;
    }
    
    /**
     * @return ProductAttrI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }
    
    /**
     * @return ProductAttr
     */
    public function clearI18ns(): ProductAttr
    {
        $this->i18ns = [];
        
        return $this;
    }
}

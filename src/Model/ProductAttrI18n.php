<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;
use jtl\Connector\Model\Common\I18n;

/**
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductAttrI18n extends I18n
{
    /**
     * @var Identity
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("productAttrId")
     * @Serializer\Accessor(getter="getProductAttrId",setter="setProductAttrId")
     */
    protected $productAttrId = null;

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
        $this->productAttrId = new Identity();
    }
    
    /**
     * @param Identity $productAttrId
     * @return ProductAttrI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductAttrId(Identity $productAttrId): ProductAttrI18n
    {
        $this->productAttrId = $productAttrId;
        
        return $this;
    }
    
    /**
     * @return Identity
     */
    public function getProductAttrId(): Identity
    {
        return $this->productAttrId;
    }

    /**
     * @param string $name
     * @return ProductAttrI18n
     */
    public function setName(string $name): ProductAttrI18n
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
     * @param string $value
     * @return ProductAttrI18n
     */
    public function setValue(string $value): ProductAttrI18n
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

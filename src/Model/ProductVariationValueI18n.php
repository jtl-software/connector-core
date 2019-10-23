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
 * locale specifig productVariationValue name.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductVariationValueI18n extends AbstractI18n
{
    /**
     * @var string Locale specific variationValue name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';

    /**
     * @param string $name Locale specific variationValue name
     * @return ProductVariationValueI18n
     */
    public function setName(string $name): ProductVariationValueI18n
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return string Locale specific variationValue name
     */
    public function getName(): string
    {
        return $this->name;
    }
}

<?php

/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Locale specific product variation properties.
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductVariationI18n extends AbstractI18n
{
    /**
     * @var string Locale specific variation name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';

    /**
     * @param string $name Locale specific variation name
     * @return ProductVariationI18n
     */
    public function setName(string $name): ProductVariationI18n
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string Locale specific variation name
     */
    public function getName(): string
    {
        return $this->name;
    }
}

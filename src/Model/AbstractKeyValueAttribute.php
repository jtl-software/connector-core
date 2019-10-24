<?php
/**
 * @author    Patryk Gorol <patryk.gorol@jtl-software.com>
 * @copyright 2010-2019 JTL-Software GmbH
 */
namespace jtl\Connector\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class AbstractKeyValueAttribute
 * @access public
 * @package jtl\Connector\Model\Customer
 * @Serializer\AccessType("public_method")
 */
abstract class AbstractKeyValueAttribute extends DataModel
{
    /**
     * @var string Attribute value
     * @Serializer\Type("string")
     * @Serializer\SerializedName("value")
     * @Serializer\Accessor(getter="getValue",setter="setValue")
     */
    protected $value = '';

    /**
     * @var string Attribute key
     * @Serializer\Type("string")
     * @Serializer\SerializedName("key")
     * @Serializer\Accessor(getter="getKey",setter="setKey")
     */
    protected $key = '';

    /**
     * @return string Attribute value
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value Attribute value
     * @return AbstractKeyValueAttribute
     */
    public function setValue(string $value): AbstractKeyValueAttribute
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return string Attribute key
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key Attribute key
     * @return AbstractKeyValueAttribute
     */
    public function setKey(string $key): AbstractKeyValueAttribute
    {
        $this->key = $key;

        return $this;
    }
}
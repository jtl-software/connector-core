<?php
/**
 * @author    Patryk Gorol <patryk.gorol@jtl-software.com>
 * @copyright 2010-2019 JTL-Software GmbH
 */
namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class KeyValueAttribute
 * @access public
 * @package Jtl\Connector\Core\Model\Customer
 * @Serializer\AccessType("public_method")
 */
class KeyValueAttribute extends AbstractDataModel
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
     * @return KeyValueAttribute
     */
    public function setValue(string $value): KeyValueAttribute
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
     * @return KeyValueAttribute
     */
    public function setKey(string $key): KeyValueAttribute
    {
        $this->key = $key;

        return $this;
    }
}

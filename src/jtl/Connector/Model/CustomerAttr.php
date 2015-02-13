<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Monolingual customer attribute.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * 
 * @Serializer\AccessType("public_method")
 */
class CustomerAttr extends DataModel
{
    /**
     * @var Identity 
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getid",setter="setid")
     */
    protected $id = null;

    /**
     * @var string Attribute key
     * @Serializer\Type("string")
     * @Serializer\SerializedName("key")
     * @Serializer\Accessor(getter="getKey",setter="setKey")
     */
    protected $key = '';

    /**
     * @var string Attribute value
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
        $this->id = new Identity();
    }

    /**
     * @param Identity $id 
     * @return \jtl\Connector\Model\CustomerAttr
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setid(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity 
     */
    public function getid()
    {
        return $this->id;
    }

    /**
     * @param string $key Attribute key
     * @return \jtl\Connector\Model\CustomerAttr
     */
    public function setKey($key)
    {
        return $this->setProperty('key', $key, 'string');
    }

    /**
     * @return string Attribute key
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string $value Attribute value
     * @return \jtl\Connector\Model\CustomerAttr
     */
    public function setValue($value)
    {
        return $this->setProperty('value', $value, 'string');
    }

    /**
     * @return string Attribute value
     */
    public function getValue()
    {
        return $this->value;
    }
}

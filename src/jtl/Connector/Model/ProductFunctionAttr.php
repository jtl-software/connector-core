<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Monolingual product function attribute..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * 
 * @Serializer\AccessType("public_method")
 */
class ProductFunctionAttr extends DataModel
{
    /**
     * @var Identity Unique productFunctionAttr id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
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
     * @var int Reference to product
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("productId")
     * @Serializer\Accessor(getter="getProductId",setter="setProductId")
     */
    protected $productId = 0;

    /**
     * @var string Attribute value
     * @Serializer\Type("string")
     * @Serializer\SerializedName("value")
     * @Serializer\Accessor(getter="getValue",setter="setValue")
     */
    protected $value = '';


    public function __construct()
    {
        $this->id = new Identity;
    }

    /**
     * @param  Identity $id Unique productFunctionAttr id
     * @return \jtl\Connector\Model\ProductFunctionAttr
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity Unique productFunctionAttr id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  string $key Attribute key
     * @return \jtl\Connector\Model\ProductFunctionAttr
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  int $productId Reference to product
     * @return \jtl\Connector\Model\ProductFunctionAttr
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setProductId($productId)
    {
        return $this->setProperty('productId', $productId, 'int');
    }

    /**
     * @return int Reference to product
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param  string $value Attribute value
     * @return \jtl\Connector\Model\ProductFunctionAttr
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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

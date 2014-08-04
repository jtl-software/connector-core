<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Monolingual product function attribute..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ProductFunctionAttr extends DataModel
{
    /**
     * @var Identity Unique productFunctionAttr id
     */
    protected $id = null;

    /**
     * @var Identity Reference to product
     */
    protected $productId = null;

    /**
     * @var string Attribute key
     */
    protected $key = '';

    /**
     * @var string Attribute value
     */
    protected $value = '';

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
     * @param  Identity $productId Reference to product
     * @return \jtl\Connector\Model\ProductFunctionAttr
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('productId', $productId, 'Identity');
    }

    /**
     * @return Identity Reference to product
     */
    public function getProductId()
    {
        return $this->productId;
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

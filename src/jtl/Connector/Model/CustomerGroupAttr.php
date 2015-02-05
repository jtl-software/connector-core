
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
 * Monolingual customer group attribute.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * 
 * @Serializer\AccessType("public_method")
 */
class CustomerGroupAttr extends DataModel
{

    /**
     * @var string Reference to customerGroup
     * @Serializer\Type("string")
     * @Serializer\SerializedName("customerGroupId")
     * @Serializer\Accessor(getter="getCustomerGroupId",setter="setCustomerGroupId")
     */
    protected $customerGroupId = '';


    /**
     * @var string Unique customerGroupAttr id
     * @Serializer\Type("string")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = '';


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
     * @param string $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\CustomerGroupAttr
     */
    public function setCustomerGroupId($customerGroupId)
    {
        return $this->setProperty('customerGroupId', $customerGroupId, 'string');
    }

    /**
     * @return string Reference to customerGroup
     */
    public function getCustomerGroupId()
    {
        return $this->customerGroupId;
    }
	
 
    /**
     * @param string $id Unique customerGroupAttr id
     * @return \jtl\Connector\Model\CustomerGroupAttr
     */
    public function setId($id)
    {
        return $this->setProperty('id', $id, 'string');
    }

    /**
     * @return string Unique customerGroupAttr id
     */
    public function getId()
    {
        return $this->id;
    }
	
 
    /**
     * @param string $key Attribute key
     * @return \jtl\Connector\Model\CustomerGroupAttr
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
     * @return \jtl\Connector\Model\CustomerGroupAttr
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

<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Localized customer group name..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 * 
 * @Serializer\AccessType("public_method")
 */
class CustomerGroupI18n extends DataModel
{
    /**
     * @var Identity Reference to customerGroup
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("customerGroupId")
     * @Serializer\Accessor(getter="getCustomerGroupId",setter="setCustomerGroupId")
     */
    protected $customerGroupId = null;

    /**
     * @var Identity Locale
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("localeName")
     * @Serializer\Accessor(getter="getLocaleName",setter="setLocaleName")
     */
    protected $localeName = null;

    /**
     * @var string Localized customer group name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';


    public function __construct()
    {
        $this->customerGroupId = new Identity;
        $this->localeName = new Identity;
    }

    /**
     * @param  Identity $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\CustomerGroupI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerGroupId(Identity $customerGroupId)
    {
        return $this->setProperty('customerGroupId', $customerGroupId, 'Identity');
    }

    /**
     * @return Identity Reference to customerGroup
     */
    public function getCustomerGroupId()
    {
        return $this->customerGroupId;
    }

    /**
     * @param  Identity $localeName Locale
     * @return \jtl\Connector\Model\CustomerGroupI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setLocaleName(Identity $localeName)
    {
        return $this->setProperty('localeName', $localeName, 'Identity');
    }

    /**
     * @return Identity Locale
     */
    public function getLocaleName()
    {
        return $this->localeName;
    }

    /**
     * @param  string $name Localized customer group name
     * @return \jtl\Connector\Model\CustomerGroupI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }

    /**
     * @return string Localized customer group name
     */
    public function getName()
    {
        return $this->name;
    }

 
}

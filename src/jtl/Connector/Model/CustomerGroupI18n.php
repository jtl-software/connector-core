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
 */
class CustomerGroupI18n extends DataModel
{
    /**
     * @var Identity Reference to customerGroup
     * @Serializer\Type("jtl\Connector\Model\Identity")
     */
    protected $customerGroupId = null;

    /**
     * @var string Locale
     * @Serializer\Type("string")
     */
    protected $localeName = '';

    /**
     * @var string Localized customer group name
     * @Serializer\Type("string")
     */
    protected $name = '';

    /**
     * @var \jtl\Connector\Model\CustomerGroup[]
     * @Serializer\Type("array<jtl\Connector\Model\CustomerGroup>")
     */
    protected $customerGroup = array();

    public function __construct()
    {
        $this->customerGroupId = new Identity;
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
     * @param  string $localeName Locale
     * @return \jtl\Connector\Model\CustomerGroupI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setLocaleName($localeName)
    {
        return $this->setProperty('localeName', $localeName, 'string');
    }

    /**
     * @return string Locale
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

    /**
     * @param  \jtl\Connector\Model\CustomerGroup $customerGroup
     * @return \jtl\Connector\Model\CustomerGroupI18n
     */
    public function addCustomerGroup(\jtl\Connector\Model\CustomerGroup $customerGroup)
    {
        $this->customerGroup[] = $customerGroup;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\CustomerGroup[]
     */
    public function getCustomerGroup()
    {
        return $this->customerGroup;
    }

    /**
     * @return \jtl\Connector\Model\CustomerGroupI18n
     */
    public function clearCustomerGroup()
    {
        $this->customerGroup = array();
        return $this;
    }

 
}

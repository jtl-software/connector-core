<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Localized customer group name..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class CustomerGroupI18n extends DataModel
{
    /**
     * @type Identity Reference to customerGroup
     */
    protected $customerGroupId = null;

    /**
     * @type string Locale
     */
    protected $localeName = '';

    /**
     * @type string Localized customer group name
     */
    protected $name = '';

    /**
     * @type \jtl\Connector\Model\CustomerGroup[]
     */
    protected $customerGroup = array();

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'customerGroupId',
    );

    /**
     * @param  Identity $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\CustomerGroupI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerGroupId(Identity $customerGroupId)
    {
        return $this->setProperty('CustomerGroupId', $customerGroupId, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setLocaleName(Identity $localeName)
    {
        return $this->setProperty('LocaleName', $localeName, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setName(Identity $name)
    {
        return $this->setProperty('Name', $name, 'string');
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

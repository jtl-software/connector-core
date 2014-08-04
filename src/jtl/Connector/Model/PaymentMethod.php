<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Internal
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * PaymentMethod model..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Internal
 */
class PaymentMethod extends DataModel
{
    /**
     * @var Identity Unique paymentMethod id
     */
    protected $id = null;

    /**
     * @var Identity Payment module identifier
     */
    protected $moduleId = null;

    /**
     * @var bool Optional: Payment method active? Some payment methods have to be activated by validation or by vendor
     */
    protected $isActive = false;

    /**
     * @var bool Optional flag if system requirements and validation fit to use paymentMethod
     */
    protected $isUseable = false;

    /**
     * @var string Optional image (path or URL) for Paymentmethod
     */
    protected $picture = '';

    /**
     * @var int Sort number
     */
    protected $sort = 0;

    /**
     * @var bool Optional: Send mail on Payment confirmation to customer?
     */
    protected $useMail = false;

    /**
     * @var string Optional vendor name (e.g. "Paypal")
     */
    protected $vendor = '';

    /**
     * @param  Identity $id Unique paymentMethod id
     * @return \jtl\Connector\Model\PaymentMethod
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity Unique paymentMethod id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $moduleId Payment module identifier
     * @return \jtl\Connector\Model\PaymentMethod
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setModuleId(Identity $moduleId)
    {
        return $this->setProperty('moduleId', $moduleId, 'Identity');
    }

    /**
     * @return Identity Payment module identifier
     */
    public function getModuleId()
    {
        return $this->moduleId;
    }

    /**
     * @param  bool $isActive Optional: Payment method active? Some payment methods have to be activated by validation or by vendor
     * @return \jtl\Connector\Model\PaymentMethod
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setIsActive($isActive)
    {
        return $this->setProperty('isActive', $isActive, 'bool');
    }

    /**
     * @return bool Optional: Payment method active? Some payment methods have to be activated by validation or by vendor
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param  bool $isUseable Optional flag if system requirements and validation fit to use paymentMethod
     * @return \jtl\Connector\Model\PaymentMethod
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setIsUseable($isUseable)
    {
        return $this->setProperty('isUseable', $isUseable, 'bool');
    }

    /**
     * @return bool Optional flag if system requirements and validation fit to use paymentMethod
     */
    public function getIsUseable()
    {
        return $this->isUseable;
    }

    /**
     * @param  string $picture Optional image (path or URL) for Paymentmethod
     * @return \jtl\Connector\Model\PaymentMethod
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setPicture($picture)
    {
        return $this->setProperty('picture', $picture, 'string');
    }

    /**
     * @return string Optional image (path or URL) for Paymentmethod
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param  int $sort Sort number
     * @return \jtl\Connector\Model\PaymentMethod
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('sort', $sort, 'int');
    }

    /**
     * @return int Sort number
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param  bool $useMail Optional: Send mail on Payment confirmation to customer?
     * @return \jtl\Connector\Model\PaymentMethod
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setUseMail($useMail)
    {
        return $this->setProperty('useMail', $useMail, 'bool');
    }

    /**
     * @return bool Optional: Send mail on Payment confirmation to customer?
     */
    public function getUseMail()
    {
        return $this->useMail;
    }

    /**
     * @param  string $vendor Optional vendor name (e.g. "Paypal")
     * @return \jtl\Connector\Model\PaymentMethod
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setVendor($vendor)
    {
        return $this->setProperty('vendor', $vendor, 'string');
    }

    /**
     * @return string Optional vendor name (e.g. "Paypal")
     */
    public function getVendor()
    {
        return $this->vendor;
    }

 
}

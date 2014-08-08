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
 * Customer group model..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 * 
 * @Serializer\AccessType("public_method")
 */
class CustomerGroup extends DataModel
{
    /**
     * @var Identity Unique customerGroup id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;

    /**
     * @var bool Optional: Show net prices default instead of gross prices
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("applyNetPrice")
     * @Serializer\Accessor(getter="getApplyNetPrice",setter="setApplyNetPrice")
     */
    protected $applyNetPrice = false;

    /**
     * @var double Optional percentual discount on all products. Negative Value means surcharge. 
     * @Serializer\Type("double")
     * @Serializer\SerializedName("discount")
     * @Serializer\Accessor(getter="getDiscount",setter="setDiscount")
     */
    protected $discount = 0.0;

    /**
     * @var bool Optional: Flag default customer group
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isDefault")
     * @Serializer\Accessor(getter="getIsDefault",setter="setIsDefault")
     */
    protected $isDefault = false;

    /**
     * @var \jtl\Connector\Model\CustomerGroupI18n[]
     * @Serializer\Type("array<jtl\Connector\Model\CustomerGroupI18n>")
     * @Serializer\SerializedName("i18n")
     * @Serializer\AccessType("reflection")
     */
    protected $i18n = array();
    /**
     * @var \jtl\Connector\Model\CustomerGroupAttr[]
     * @Serializer\Type("array<jtl\Connector\Model\CustomerGroupAttr>")
     * @Serializer\SerializedName("attributes")
     * @Serializer\AccessType("reflection")
     */
    protected $attributes = array();

    public function __construct()
    {
        $this->id = new Identity;
    }

    /**
     * @param  Identity $id Unique customerGroup id
     * @return \jtl\Connector\Model\CustomerGroup
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity Unique customerGroup id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  bool $applyNetPrice Optional: Show net prices default instead of gross prices
     * @return \jtl\Connector\Model\CustomerGroup
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setApplyNetPrice($applyNetPrice)
    {
        return $this->setProperty('applyNetPrice', $applyNetPrice, 'bool');
    }

    /**
     * @return bool Optional: Show net prices default instead of gross prices
     */
    public function getApplyNetPrice()
    {
        return $this->applyNetPrice;
    }

    /**
     * @param  double $discount Optional percentual discount on all products. Negative Value means surcharge. 
     * @return \jtl\Connector\Model\CustomerGroup
     * @throws \InvalidArgumentException if the provided argument is not of type 'double'.
     */
    public function setDiscount($discount)
    {
        return $this->setProperty('discount', $discount, 'double');
    }

    /**
     * @return double Optional percentual discount on all products. Negative Value means surcharge. 
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param  bool $isDefault Optional: Flag default customer group
     * @return \jtl\Connector\Model\CustomerGroup
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setIsDefault($isDefault)
    {
        return $this->setProperty('isDefault', $isDefault, 'bool');
    }

    /**
     * @return bool Optional: Flag default customer group
     */
    public function getIsDefault()
    {
        return $this->isDefault;
    }

    /**
     * @param  \jtl\Connector\Model\CustomerGroupI18n $i18n
     * @return \jtl\Connector\Model\CustomerGroup
     */
    public function addI18n(\jtl\Connector\Model\CustomerGroupI18n $i18n)
    {
        $this->i18n[] = $i18n;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\CustomerGroupI18n[]
     */
    public function getI18n()
    {
        return $this->i18n;
    }

    /**
     * @return \jtl\Connector\Model\CustomerGroup
     */
    public function clearI18n()
    {
        $this->i18n = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\CustomerGroupAttr $attributes
     * @return \jtl\Connector\Model\CustomerGroup
     */
    public function addAttribute(\jtl\Connector\Model\CustomerGroupAttr $attribute)
    {
        $this->attributes[] = $attribute;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\CustomerGroupAttr[]
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @return \jtl\Connector\Model\CustomerGroup
     */
    public function clearAttributes()
    {
        $this->attributes = array();
        return $this;
    }

 
}

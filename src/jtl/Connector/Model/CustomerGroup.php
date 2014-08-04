<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Customer group model..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class CustomerGroup extends DataModel
{
    /**
     * @type Identity Unique customerGroup id
     */
    protected $id = null;

    /**
     * @type bool Optional: Show net prices default instead of gross prices
     */
    protected $applyNetPrice = false;

    /**
     * @type double Optional percentual discount on all products. Negative Value means surcharge. 
     */
    protected $discount = 0.0;

    /**
     * @type bool Optional: Flag default customer group
     */
    protected $isDefault = false;

    /**
     * @type \jtl\Connector\Model\CustomerGroupI18n[]
     */
    protected $i18n = array();

    /**
     * @type \jtl\Connector\Model\CustomerGroupAttr[]
     */
    protected $attributes = array();

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'id',
    );

    /**
     * @param  Identity $id Unique customerGroup id
     * @return \jtl\Connector\Model\CustomerGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setApplyNetPrice(Identity $applyNetPrice)
    {
        return $this->setProperty('ApplyNetPrice', $applyNetPrice, 'bool');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setDiscount(Identity $discount)
    {
        return $this->setProperty('Discount', $discount, 'double');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setIsDefault(Identity $isDefault)
    {
        return $this->setProperty('IsDefault', $isDefault, 'bool');
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

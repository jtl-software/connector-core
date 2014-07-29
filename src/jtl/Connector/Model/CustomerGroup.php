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
     * @type integer|null Optional: Show net prices default instead of gross prices
     */
    protected $applyNetPrice = 0;

    /**
     * @type float|null Optional percentual discount on all products. Negative Value means surcharge. 
     */
    protected $discount = 0.0;

    /**
     * @type boolean Optional: Flag default customer group
     */
    protected $isDefault = false;

    /**
     * @type integer|null 
     */
    protected $kKundenDrucktext = 0;

    /**
     * @type string 
     */
    protected $name = '';

    /**
     * Nav [CustomerGroup » One]
     *
     * @type \jtl\Connector\Model\CustomerGroupAttr[]
     */
    protected $attributes = array();

    /**
     * Nav [CustomerGroup » One]
     *
     * @type \jtl\Connector\Model\CustomerGroupI18n[]
     */
    protected $i18n = array();


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'id',
    );

    /**
     * @type array list of navigations
     */
    protected $navigations = array(
        'attributes' => '\jtl\Connector\Model\CustomerGroupAttr',
        'i18n' => '\jtl\Connector\Model\CustomerGroupI18n',
    );

    /**
     * @return array 
     */
    public function getIdentities()
    {
        return $this->identities;
    }

    /**
     * @return array 
     */
    public function getNavigations()
    {
        return $this->navigations;
    }

    /**
     * @param  string $name 
     * @return \jtl\Connector\Model\CustomerGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }
    
    /**
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param  integer $applyNetPrice Optional: Show net prices default instead of gross prices
     * @return \jtl\Connector\Model\CustomerGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setApplyNetPrice($applyNetPrice)
    {
        return $this->setProperty('applyNetPrice', $applyNetPrice, 'integer');
    }
    
    /**
     * @return integer Optional: Show net prices default instead of gross prices
     */
    public function getApplyNetPrice()
    {
        return $this->applyNetPrice;
    }

    /**
     * @param  float $discount Optional percentual discount on all products. Negative Value means surcharge. 
     * @return \jtl\Connector\Model\CustomerGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setDiscount($discount)
    {
        return $this->setProperty('discount', $discount, 'float');
    }
    
    /**
     * @return float Optional percentual discount on all products. Negative Value means surcharge. 
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param  integer $kKundenDrucktext 
     * @return \jtl\Connector\Model\CustomerGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setKKundenDrucktext($kKundenDrucktext)
    {
        return $this->setProperty('kKundenDrucktext', $kKundenDrucktext, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getKKundenDrucktext()
    {
        return $this->kKundenDrucktext;
    }

    /**
     * @param  Identity $id Unique customerGroup id
     * @return \jtl\Connector\Model\CustomerGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @param  boolean $isDefault Optional: Flag default customer group
     * @return \jtl\Connector\Model\CustomerGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsDefault($isDefault)
    {
        return $this->setProperty('isDefault', $isDefault, 'boolean');
    }
    
    /**
     * @return boolean Optional: Flag default customer group
     */
    public function getIsDefault()
    {
        return $this->isDefault;
    }

    /**
     * @param  \jtl\Connector\Model\CustomerGroupAttr $attribute
     * @return \jtl\Connector\Model\CustomerGroup
     */
    public function addAttribute(\jtl\Connector\Model\CustomerGroupAttr $attribute)
    {
        $this->attributes[] = $attribute;
        return $this;
    }

    /**
     * @param  array $attributes
     * @return \jtl\Connector\Model\CustomerGroup
     */
    public function addAttributes(array $attributes)
    {
		$this->attributes = array_merge($this->attributes, $attributes);
        return $this;
    }
    
    /**
     * @return CustomerGroupAttr
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
     * @param  array $i18n
     * @return \jtl\Connector\Model\CustomerGroup
     */
    public function addI18n(array $i18n)
    {
		$this->i18n = array_merge($this->i18n, $i18n);
        return $this;
    }
    
    /**
     * @return CustomerGroupI18n
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
}


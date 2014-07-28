<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * Customer group model..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class CustomerGroup extends DataModel
{
    /**
     * @type Identity Unique customerGroup id
     */
    public $_id = null;

    /**
     * @type integer|null Optional: Show net prices default instead of gross prices
     */
    public $_applyNetPrice = 0;

    /**
     * @type float|null Optional percentual discount on all products. Negative Value means surcharge. 
     */
    public $_discount = 0.0;

    /**
     * @type boolean Optional: Flag default customer group
     */
    public $_isDefault = false;

    /**
     * @type integer|null 
     */
    public $_kKundenDrucktext = 0;

    /**
     * @type string 
     */
    public $_name = '';

    /**
     * Nav [CustomerGroup » One]
     *
     * @type \jtl\Connector\Model\CustomerGroupAttr[]
     */
    public $_attributes = array();

    /**
     * Nav [CustomerGroup » One]
     *
     * @type \jtl\Connector\Model\CustomerGroupI18n[]
     */
    public $_i18n = array();


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_id',
    );

    /**
     * @type array list of navigations
     */
    public $_navigations = array(
        '_attributes' => '\jtl\Connector\Model\CustomerGroupAttr',
        '_i18n' => '\jtl\Connector\Model\CustomerGroupI18n',
    );

    /**
     * @return array 
     */
    public function getIdentities()
    {
        return $this->_identities;
    }

    /**
     * @return array 
     */
    public function getNavigations()
    {
        return $this->_navigations;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function setProperty($name, $value, $type)
    {
        if (!$this->validateType($value, $type)) {
            throw new InvalidArgumentException(sprintf("expected type %s, given value %s.", $type, gettype($value)));
        }
        $this->{$name} = $value;
        return $this;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function validateType($value, $type)
    {
        switch ($type)
        {
            case 'boolean':
                return is_bool($value);
            case 'integer':
                return is_integer($value);
            case 'float':
                return is_float($value);
            case 'string':
                return is_string($value);
            case 'array':
                return is_array($value);
            default:
                throw new InvalidArgumentException('type validator not found');
        }
    }

    /**
     * @param  string $name 
     * @return \jtl\Connector\Model\CustomerGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('_name', $name, 'string');
    }
    
    /**
     * @return string 
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param  integer $applyNetPrice Optional: Show net prices default instead of gross prices
     * @return \jtl\Connector\Model\CustomerGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setApplyNetPrice($applyNetPrice)
    {
        return $this->setProperty('_applyNetPrice', $applyNetPrice, 'integer');
    }
    
    /**
     * @return integer Optional: Show net prices default instead of gross prices
     */
    public function getApplyNetPrice()
    {
        return $this->_applyNetPrice;
    }

    /**
     * @param  float $discount Optional percentual discount on all products. Negative Value means surcharge. 
     * @return \jtl\Connector\Model\CustomerGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setDiscount($discount)
    {
        return $this->setProperty('_discount', $discount, 'float');
    }
    
    /**
     * @return float Optional percentual discount on all products. Negative Value means surcharge. 
     */
    public function getDiscount()
    {
        return $this->_discount;
    }

    /**
     * @param  integer $kKundenDrucktext 
     * @return \jtl\Connector\Model\CustomerGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setKKundenDrucktext($kKundenDrucktext)
    {
        return $this->setProperty('_kKundenDrucktext', $kKundenDrucktext, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getKKundenDrucktext()
    {
        return $this->_kKundenDrucktext;
    }

    /**
     * @param  Identity $id Unique customerGroup id
     * @return \jtl\Connector\Model\CustomerGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('_id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique customerGroup id
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param  boolean $isDefault Optional: Flag default customer group
     * @return \jtl\Connector\Model\CustomerGroup
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsDefault($isDefault)
    {
        return $this->setProperty('_isDefault', $isDefault, 'boolean');
    }
    
    /**
     * @return boolean Optional: Flag default customer group
     */
    public function getIsDefault()
    {
        return $this->_isDefault;
    }

    /**
     * @param  \jtl\Connector\Model\CustomerGroupAttr $attribute
     * @return \jtl\Connector\Model\CustomerGroup
     */
    public function addAttribute(\jtl\Connector\Model\CustomerGroupAttr $attribute)
    {
        $this->_attributes[] = $attribute;
        return $this;
    }
    
    /**
     * @return CustomerGroupAttr
     */
    public function getAttributes()
    {
        return $this->_attributes;
    }

    /**
     * @return \jtl\Connector\Model\CustomerGroup
     */
    public function clearAttributes()
    {
        $this->_attributes = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\CustomerGroupI18n $i18n
     * @return \jtl\Connector\Model\CustomerGroup
     */
    public function addI18n(\jtl\Connector\Model\CustomerGroupI18n $i18n)
    {
        $this->_i18n[] = $i18n;
        return $this;
    }
    
    /**
     * @return CustomerGroupI18n
     */
    public function getI18n()
    {
        return $this->_i18n;
    }

    /**
     * @return \jtl\Connector\Model\CustomerGroup
     */
    public function clearI18n()
    {
        $this->_i18n = array();
        return $this;
    }
}


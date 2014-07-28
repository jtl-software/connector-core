<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * ProductVariation Model. Each product defines its own variations, that means  variations are not global  in contrast to specifics. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ProductVariation extends DataModel
{
    /**
     * @type Identity Unique productVariation id
     */
    public $_id = null;

    /**
     * @type Identity Reference to product
     */
    public $_productId = null;

    /**
     * @type string 
     */
    public $_cName = '';

    /**
     * @type boolean 
     */
    public $_isActive = false;

    /**
     * @type boolean 
     */
    public $_isSelectable = false;

    /**
     * @type integer|null Optional sort number
     */
    public $_sort = 0;

    /**
     * @type string Variation type e.g. radio or select
     */
    public $_type = '';

    /**
     * Nav [ProductVariation » One]
     *
     * @type \jtl\Connector\Model\ProductVariationI18n[]
     */
    public $_i18ns = array();

    /**
     * Nav [ProductVariation » One]
     *
     * @type \jtl\Connector\Model\ProductVariationInvisibility[]
     */
    public $_invisibilities = array();

    /**
     * Nav [ProductVariation » One]
     *
     * @type \jtl\Connector\Model\ProductVariationValue[]
     */
    public $_values = array();


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_id',
        '_productId',
    );

    /**
     * @type array list of navigations
     */
    public $_navigations = array(
        '_i18ns' => '\jtl\Connector\Model\ProductVariationI18n',
        '_invisibilities' => '\jtl\Connector\Model\ProductVariationInvisibility',
        '_values' => '\jtl\Connector\Model\ProductVariationValue',
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
     * @param  integer $sort Optional sort number
     * @return \jtl\Connector\Model\ProductVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('_sort', $sort, 'integer');
    }
    
    /**
     * @return integer Optional sort number
     */
    public function getSort()
    {
        return $this->_sort;
    }

    /**
     * @param  string $type Variation type e.g. radio or select
     * @return \jtl\Connector\Model\ProductVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setType($type)
    {
        return $this->setProperty('_type', $type, 'string');
    }
    
    /**
     * @return string Variation type e.g. radio or select
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @param  string $cName 
     * @return \jtl\Connector\Model\ProductVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCName($cName)
    {
        return $this->setProperty('_cName', $cName, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCName()
    {
        return $this->_cName;
    }

    /**
     * @param  Identity $id Unique productVariation id
     * @return \jtl\Connector\Model\ProductVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('_id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique productVariation id
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param  Identity $productId Reference to product
     * @return \jtl\Connector\Model\ProductVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('_productId', $productId, 'Identity');
    }
    
    /**
     * @return Identity Reference to product
     */
    public function getProductId()
    {
        return $this->_productId;
    }

    /**
     * @param  boolean $isSelectable 
     * @return \jtl\Connector\Model\ProductVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsSelectable($isSelectable)
    {
        return $this->setProperty('_isSelectable', $isSelectable, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getIsSelectable()
    {
        return $this->_isSelectable;
    }

    /**
     * @param  boolean $isActive 
     * @return \jtl\Connector\Model\ProductVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsActive($isActive)
    {
        return $this->setProperty('_isActive', $isActive, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->_isActive;
    }

    /**
     * @param  \jtl\Connector\Model\ProductVariationI18n $i18ns
     * @return \jtl\Connector\Model\ProductVariation
     */
    public function addI18ns(\jtl\Connector\Model\ProductVariationI18n $i18ns)
    {
        $this->_i18ns[] = $i18ns;
        return $this;
    }
    
    /**
     * @return ProductVariationI18n
     */
    public function getI18ns()
    {
        return $this->_i18ns;
    }

    /**
     * @return \jtl\Connector\Model\ProductVariation
     */
    public function clearI18ns()
    {
        $this->_i18ns = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ProductVariationInvisibility $invisibility
     * @return \jtl\Connector\Model\ProductVariation
     */
    public function addInvisibility(\jtl\Connector\Model\ProductVariationInvisibility $invisibility)
    {
        $this->_invisibilities[] = $invisibility;
        return $this;
    }
    
    /**
     * @return ProductVariationInvisibility
     */
    public function getInvisibilities()
    {
        return $this->_invisibilities;
    }

    /**
     * @return \jtl\Connector\Model\ProductVariation
     */
    public function clearInvisibilities()
    {
        $this->_invisibilities = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ProductVariationValue $value
     * @return \jtl\Connector\Model\ProductVariation
     */
    public function addValue(\jtl\Connector\Model\ProductVariationValue $value)
    {
        $this->_values[] = $value;
        return $this;
    }
    
    /**
     * @return ProductVariationValue
     */
    public function getValues()
    {
        return $this->_values;
    }

    /**
     * @return \jtl\Connector\Model\ProductVariation
     */
    public function clearValues()
    {
        $this->_values = array();
        return $this;
    }
}


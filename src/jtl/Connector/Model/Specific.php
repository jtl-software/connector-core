<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * Specific is defined as a characteristic product attribute Like "color". Specifics can be used for after-search-filtering. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class Specific extends DataModel
{
    /**
     * @type Identity Unique specific id
     */
    public $_id = null;

    /**
     * @type boolean 
     */
    public $_isGlobal = false;

    /**
     * @type string 
     */
    public $_name = '';

    /**
     * @type integer|null Optional sort number
     */
    public $_sort = 0;

    /**
     * @type string Specific type (radio, dropdown, image...)
     */
    public $_type = '';

    /**
     * Nav [Specific » One]
     *
     * @type \jtl\Connector\Model\SpecificI18n[]
     */
    public $_i18ns = array();

    /**
     * Nav [Specific » ZeroOrOne]
     *
     * @type \jtl\Connector\Model\SpecificValue[]
     */
    public $_values = array();


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
        '_i18ns' => '\jtl\Connector\Model\SpecificI18n',
        '_values' => '\jtl\Connector\Model\SpecificValue',
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
     * @return \jtl\Connector\Model\Specific
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
     * @param  string $name 
     * @return \jtl\Connector\Model\Specific
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
     * @param  string $type Specific type (radio, dropdown, image...)
     * @return \jtl\Connector\Model\Specific
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setType($type)
    {
        return $this->setProperty('_type', $type, 'string');
    }
    
    /**
     * @return string Specific type (radio, dropdown, image...)
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @param  Identity $id Unique specific id
     * @return \jtl\Connector\Model\Specific
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('_id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique specific id
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param  boolean $isGlobal 
     * @return \jtl\Connector\Model\Specific
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsGlobal($isGlobal)
    {
        return $this->setProperty('_isGlobal', $isGlobal, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getIsGlobal()
    {
        return $this->_isGlobal;
    }

    /**
     * @param  \jtl\Connector\Model\SpecificI18n $i18ns
     * @return \jtl\Connector\Model\Specific
     */
    public function addI18ns(\jtl\Connector\Model\SpecificI18n $i18ns)
    {
        $this->_i18ns[] = $i18ns;
        return $this;
    }
    
    /**
     * @return SpecificI18n
     */
    public function getI18ns()
    {
        return $this->_i18ns;
    }

    /**
     * @return \jtl\Connector\Model\Specific
     */
    public function clearI18ns()
    {
        $this->_i18ns = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\SpecificValue $value
     * @return \jtl\Connector\Model\Specific
     */
    public function addValue(\jtl\Connector\Model\SpecificValue $value)
    {
        $this->_values[] = $value;
        return $this;
    }
    
    /**
     * @return SpecificValue
     */
    public function getValues()
    {
        return $this->_values;
    }

    /**
     * @return \jtl\Connector\Model\Specific
     */
    public function clearValues()
    {
        $this->_values = array();
        return $this;
    }
}


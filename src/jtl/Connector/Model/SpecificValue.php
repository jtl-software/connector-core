<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * Specific value properties to define a new specificValue with a sort number. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class SpecificValue extends DataModel
{
    /**
     * @type Identity Unique specificValue id
     */
    public $_id = null;

    /**
     * @type Identity Reference to specificId
     */
    public $_specificId = null;

    /**
     * @type integer|null Optional sort number
     */
    public $_sort = 0;

    /**
     * Nav [SpecificValue » One]
     *
     * @type \jtl\Connector\Model\SpecificValueI18n[]
     */
    public $_i18ns = array();


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_id',
        '_specificId',
    );

    /**
     * @type array list of navigations
     */
    public $_navigations = array(
        '_i18ns' => '\jtl\Connector\Model\SpecificValueI18n',
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
     * @return \jtl\Connector\Model\SpecificValue
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
     * @param  Identity $id Unique specificValue id
     * @return \jtl\Connector\Model\SpecificValue
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('_id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique specificValue id
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param  Identity $specificId Reference to specificId
     * @return \jtl\Connector\Model\SpecificValue
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSpecificId(Identity $specificId)
    {
        return $this->setProperty('_specificId', $specificId, 'Identity');
    }
    
    /**
     * @return Identity Reference to specificId
     */
    public function getSpecificId()
    {
        return $this->_specificId;
    }

    /**
     * @param  \jtl\Connector\Model\SpecificValueI18n $i18ns
     * @return \jtl\Connector\Model\SpecificValue
     */
    public function addI18ns(\jtl\Connector\Model\SpecificValueI18n $i18ns)
    {
        $this->_i18ns[] = $i18ns;
        return $this;
    }
    
    /**
     * @return SpecificValueI18n
     */
    public function getI18ns()
    {
        return $this->_i18ns;
    }

    /**
     * @return \jtl\Connector\Model\SpecificValue
     */
    public function clearI18ns()
    {
        $this->_i18ns = array();
        return $this;
    }
}


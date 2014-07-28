<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class SpecificValueImage extends DataModel
{
    /**
     * @type Identity 
     */
    public $_foreignKey = null;

    /**
     * @type Identity 
     */
    public $_id = null;

    /**
     * @type integer|null 
     */
    public $_connectorId = 0;

    /**
     * @type Byte[] 
     */
    public $_data = null;

    /**
     * @type boolean 
     */
    public $_flagUpdate = false;

    /**
     * @type integer|null 
     */
    public $_size = 0;

    /**
     * @type integer|null 
     */
    public $_sort = 0;


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_id',
        '_foreignKey',
    );

    /**
     * @type array list of navigations
     */
    public $_navigations = array(
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
     * @param  integer $connectorId 
     * @return \jtl\Connector\Model\SpecificValueImage
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setConnectorId($connectorId)
    {
        return $this->setProperty('_connectorId', $connectorId, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getConnectorId()
    {
        return $this->_connectorId;
    }

    /**
     * @param  Byte[] $data 
     * @return \jtl\Connector\Model\SpecificValueImage
     * @throws InvalidArgumentException if the provided argument is not of type 'Byte[]'.
     */
    public function setData(Byte[] $data)
    {
        return $this->setProperty('_data', $data, 'Byte[]');
    }
    
    /**
     * @return Byte[] 
     */
    public function getData()
    {
        return $this->_data;
    }

    /**
     * @param  integer $size 
     * @return \jtl\Connector\Model\SpecificValueImage
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setSize($size)
    {
        return $this->setProperty('_size', $size, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getSize()
    {
        return $this->_size;
    }

    /**
     * @param  integer $sort 
     * @return \jtl\Connector\Model\SpecificValueImage
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('_sort', $sort, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getSort()
    {
        return $this->_sort;
    }

    /**
     * @param  Identity $id 
     * @return \jtl\Connector\Model\SpecificValueImage
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('_id', $id, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param  Identity $foreignKey 
     * @return \jtl\Connector\Model\SpecificValueImage
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setForeignKey(Identity $foreignKey)
    {
        return $this->setProperty('_foreignKey', $foreignKey, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getForeignKey()
    {
        return $this->_foreignKey;
    }

    /**
     * @param  boolean $flagUpdate 
     * @return \jtl\Connector\Model\SpecificValueImage
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setFlagUpdate($flagUpdate)
    {
        return $this->setProperty('_flagUpdate', $flagUpdate, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getFlagUpdate()
    {
        return $this->_flagUpdate;
    }
}


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
class Image extends DataModel
{
    /**
     * @type string 
     */
    public $_filename = '';

    /**
     * @type Identity 
     */
    public $_foreignKey = null;

    /**
     * @type Identity 
     */
    public $_id = null;

    /**
     * @type Identity 
     */
    public $_masterImageId = null;

    /**
     * @type integer 
     */
    public $_relationType = 0;

    /**
     * @type integer 
     */
    public $_sort = 0;


    /**
     * @type array list of identities
     */
    public $_identities = array(
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
     * @param  Identity $id 
     * @return \jtl\Connector\Model\Image
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
     * @return \jtl\Connector\Model\Image
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
     * @param  Identity $masterImageId 
     * @return \jtl\Connector\Model\Image
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMasterImageId(Identity $masterImageId)
    {
        return $this->setProperty('_masterImageId', $masterImageId, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getMasterImageId()
    {
        return $this->_masterImageId;
    }

    /**
     * @param  integer $relationType 
     * @return \jtl\Connector\Model\Image
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setRelationType($relationType)
    {
        return $this->setProperty('_relationType', $relationType, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getRelationType()
    {
        return $this->_relationType;
    }

    /**
     * @param  string $filename 
     * @return \jtl\Connector\Model\Image
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setFilename($filename)
    {
        return $this->setProperty('_filename', $filename, 'string');
    }
    
    /**
     * @return string 
     */
    public function getFilename()
    {
        return $this->_filename;
    }

    /**
     * @param  integer $sort 
     * @return \jtl\Connector\Model\Image
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
}


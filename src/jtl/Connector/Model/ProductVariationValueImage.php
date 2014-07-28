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
class ProductVariationValueImage extends DataModel
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
     * @type Byte[] 
     */
    public $_data = null;

    /**
     * @type boolean 
     */
    public $_flagDelete = false;

    /**
     * @type boolean 
     */
    public $_flagUpdate = false;

    /**
     * @type string 
     */
    public $_modified = '';

    /**
     * @type integer|null 
     */
    public $_size = 0;


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
     * @param  Byte[] $data 
     * @return \jtl\Connector\Model\ProductVariationValueImage
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
     * @return \jtl\Connector\Model\ProductVariationValueImage
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
     * @param  string $modified 
     * @return \jtl\Connector\Model\ProductVariationValueImage
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setModified($modified)
    {
        return $this->setProperty('_modified', $modified, 'string');
    }
    
    /**
     * @return string 
     */
    public function getModified()
    {
        return $this->_modified;
    }

    /**
     * @param  Identity $id 
     * @return \jtl\Connector\Model\ProductVariationValueImage
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
     * @return \jtl\Connector\Model\ProductVariationValueImage
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
     * @param  boolean $flagDelete 
     * @return \jtl\Connector\Model\ProductVariationValueImage
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setFlagDelete($flagDelete)
    {
        return $this->setProperty('_flagDelete', $flagDelete, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getFlagDelete()
    {
        return $this->_flagDelete;
    }

    /**
     * @param  boolean $flagUpdate 
     * @return \jtl\Connector\Model\ProductVariationValueImage
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


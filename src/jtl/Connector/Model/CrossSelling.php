<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * Link 2 products that are in a common crossSellingGroup..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class CrossSelling extends DataModel
{
    /**
     * @type Identity Reference to crossSellingGroup
     */
    public $_crossSellingGroupId = null;

    /**
     * @type Identity Reference to product (main product)
     */
    public $_crossSellingProductId = null;

    /**
     * @type Identity Unique crossSelling id
     */
    public $_id = null;

    /**
     * @type Identity Reference to product (cross selling product)
     */
    public $_productId = null;

    /**
     * @type integer|null 
     */
    public $_nEigenesFeld = 0;


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_id',
        '_productId',
        '_crossSellingProductId',
        '_crossSellingGroupId',
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
     * @param  integer $nEigenesFeld 
     * @return \jtl\Connector\Model\CrossSelling
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNEigenesFeld($nEigenesFeld)
    {
        return $this->setProperty('_nEigenesFeld', $nEigenesFeld, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNEigenesFeld()
    {
        return $this->_nEigenesFeld;
    }

    /**
     * @param  Identity $id Unique crossSelling id
     * @return \jtl\Connector\Model\CrossSelling
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('_id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique crossSelling id
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param  Identity $productId Reference to product (cross selling product)
     * @return \jtl\Connector\Model\CrossSelling
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('_productId', $productId, 'Identity');
    }
    
    /**
     * @return Identity Reference to product (cross selling product)
     */
    public function getProductId()
    {
        return $this->_productId;
    }

    /**
     * @param  Identity $crossSellingProductId Reference to product (main product)
     * @return \jtl\Connector\Model\CrossSelling
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCrossSellingProductId(Identity $crossSellingProductId)
    {
        return $this->setProperty('_crossSellingProductId', $crossSellingProductId, 'Identity');
    }
    
    /**
     * @return Identity Reference to product (main product)
     */
    public function getCrossSellingProductId()
    {
        return $this->_crossSellingProductId;
    }

    /**
     * @param  Identity $crossSellingGroupId Reference to crossSellingGroup
     * @return \jtl\Connector\Model\CrossSelling
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCrossSellingGroupId(Identity $crossSellingGroupId)
    {
        return $this->setProperty('_crossSellingGroupId', $crossSellingGroupId, 'Identity');
    }
    
    /**
     * @return Identity Reference to crossSellingGroup
     */
    public function getCrossSellingGroupId()
    {
        return $this->_crossSellingGroupId;
    }
}


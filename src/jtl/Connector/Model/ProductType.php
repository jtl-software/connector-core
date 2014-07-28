<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * ProductType model to classify and group products..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ProductType extends DataModel
{
    /**
     * @type Identity Unique productType id
     */
    protected $id = null;

    /**
     * @type string Optional (internal) product type name
     */
    protected $name = '';


    /**
     * @type array list of identities
     */
    public $identities = array(
        'id',
    );

    /**
     * @type array list of navigations
     */
    public $navigations = array(
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
     * @param  string $name Optional (internal) product type name
     * @return \jtl\Connector\Model\ProductType
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }
    
    /**
     * @return string Optional (internal) product type name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param  Identity $id Unique productType id
     * @return \jtl\Connector\Model\ProductType
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique productType id
     */
    public function getId()
    {
        return $this->id;
    }
}


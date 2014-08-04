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
     protected $identities = array(
        'id',
    );

    /**
     * @param  Identity $id Unique productType id
     * @return \jtl\Connector\Model\ProductType
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
    }

    /**
     * @return Identity Unique productType id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  string $name Optional (internal) product type name
     * @return \jtl\Connector\Model\ProductType
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setName(Identity $name)
    {
        return $this->setProperty('Name', $name, 'string');
    }

    /**
     * @return string Optional (internal) product type name
     */
    public function getName()
    {
        return $this->name;
    }

 
}

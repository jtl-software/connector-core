<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Shipping classes are usually defined in JTL-Wawi ERP..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ShippingClass extends DataModel
{
    /**
     * @type Identity Unique shippingClass id
     */
    protected $id = null;

    /**
     * @type string Optional (internal) Shipping class name
     */
    protected $name = '';


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'id',
    );

    /**
     * @type array list of propertyInfo
     */
    protected $propertyInfos = array(
        'name' => 'string',
        'id' => '\jtl\Connector\Model\Identity',
    );


    /**
     * @param  string $name Optional (internal) Shipping class name
     * @return \jtl\Connector\Model\ShippingClass
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }
    
    /**
     * @return string Optional (internal) Shipping class name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param  Identity $id Unique shippingClass id
     * @return \jtl\Connector\Model\ShippingClass
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique shippingClass id
     */
    public function getId()
    {
        return $this->id;
    }
}


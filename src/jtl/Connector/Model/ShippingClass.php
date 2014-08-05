<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Shipping classes are usually defined in JTL-Wawi ERP..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 * @JMS\AccessType("public_method")
 */
class ShippingClass extends DataModel
{
    /**
     * @var Identity Unique shippingClass id
	 * @JMS\Type("\jtl\Connector\Model\Identity")
     */
    protected $id = null;

    /**
     * @var string Optional (internal) Shipping class name
	 * @JMS\Type("string")
     */
    protected $name = '';

    /**
     * @param  Identity $id Unique shippingClass id
     * @return \jtl\Connector\Model\ShippingClass
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
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

    /**
     * @param  string $name Optional (internal) Shipping class name
     * @return \jtl\Connector\Model\ShippingClass
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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

 
}

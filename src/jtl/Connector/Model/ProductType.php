<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * ProductType model to classify and group products..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */
class ProductType extends DataModel
{
    /**
     * @var Identity Unique productType id
     */
    protected $id = null;

    /**
     * @var string Optional (internal) product type name
     */
    protected $name = '';

    /**
     * @param  Identity $id Unique productType id
     * @return \jtl\Connector\Model\ProductType
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
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

    /**
     * @param  string $name Optional (internal) product type name
     * @return \jtl\Connector\Model\ProductType
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
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

 
}

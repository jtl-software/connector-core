<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Tax zone model (set in JTL-Wawi ERP)..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class TaxZone extends DataModel
{
    /**
     * @var Identity Unique taxZone id
     */
    protected $id = null;

    /**
     * @var string Optional tax zone name e.g. "EU Zone"
     */
    protected $name = '';

    /**
     * @param  Identity $id Unique taxZone id
     * @return \jtl\Connector\Model\TaxZone
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity Unique taxZone id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  string $name Optional tax zone name e.g. "EU Zone"
     * @return \jtl\Connector\Model\TaxZone
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }

    /**
     * @return string Optional tax zone name e.g. "EU Zone"
     */
    public function getName()
    {
        return $this->name;
    }

 
}

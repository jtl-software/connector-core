<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * warehouse model (set in JTL-Wawi ERP)..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class Warehouse extends DataModel
{
    /**
     * @type Identity Unique warehouse id
     */
    protected $id = null;

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'id',
    );

    /**
     * @param  Identity $id Unique warehouse id
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
    }

    /**
     * @return Identity Unique warehouse id
     */
    public function getId()
    {
        return $this->id;
    }

 
}

<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * warehouse model (set in JTL-Wawi ERP)..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */
class Warehouse extends DataModel
{
    /**
     * @var Identity Unique warehouse id
     */
    protected $id = null;

    /**
     * @param  Identity $id Unique warehouse id
     * @return \jtl\Connector\Model\Warehouse
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity Unique warehouse id
     */
    public function getId()
    {
        return $this->id;
    }

 
}

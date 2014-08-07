<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Specifies product units like "piece", "bottle", "package"..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */
class Unit extends DataModel
{
    /**
     * @var Identity Unit id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     */
    protected $id = null;


    public function __construct()
    {
        $this->id = new Identity;
    }

    /**
     * @param  Identity $id Unit id
     * @return \jtl\Connector\Model\Unit
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity Unit id
     */
    public function getId()
    {
        return $this->id;
    }

 
}

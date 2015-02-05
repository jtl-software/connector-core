<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Ack
 */

namespace jtl\Connector\Model;

use \jtl\Connector\Core\Model\Model;
use JMS\Serializer\Annotation as Serializer;
use \Doctrine\Common\Collections\ArrayCollection;

/**
 * Ack
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Internal
 * @Serializer\AccessType("public_method")
 */
class Ack extends Model
{
    /**
     * @var Identity list
     * @Serializer\Type("ArrayCollection<string, ArrayCollection<jtl\Connector\Model\Identity>>")
     * @Serializer\SerializedName("identities")
     * @Serializer\Accessor(getter="getIdentities",setter="setIdentities")
     */
    protected $identities = null;

    /**
     * Identities getter
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getIdentities()
    {
        return $this->identities;
    }

    /**
     * Identities getter
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $identities
     * @return \jtl\Connector\Model\Ack
     */
    public function setIdentities(ArrayCollection $identities)
    {
        $this->identities = $identities;
        return $this;
    }
}
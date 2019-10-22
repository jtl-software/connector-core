<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Ack
 */

namespace jtl\Connector\Model;

use JMS\Serializer\Annotation as Serializer;
use \Doctrine\Common\Collections\ArrayCollection;
use jtl\Connector\Checksum\IChecksum;

/**
 * Ack
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Internal
 * @Serializer\AccessType("public_method")
 */
class Ack extends DataModel
{
    /**
     * @var ArrayCollection list
     * @Serializer\Type("ArrayCollection<string, ArrayCollection<jtl\Connector\Model\Identity>>")
     * @Serializer\SerializedName("identities")
     * @Serializer\Accessor(getter="getIdentities",setter="setIdentities")
     */
    protected $identities = null;
    
    /**
     * @var Checksum[]
     * @Serializer\Type("array<jtl\Connector\Model\Checksum>")
     * @Serializer\SerializedName("checksums")
     * @Serializer\AccessType("reflection")
     */
    protected $checksums = [];
    
    /**
     * Identities getter
     *
     * @return ArrayCollection
     */
    public function getIdentities(): ?ArrayCollection
    {
        return $this->identities;
    }
    
    /**
     * Identities getter
     *
     * @param ArrayCollection $identities
     * @return Ack
     */
    public function setIdentities(ArrayCollection $identities): Ack
    {
        $this->identities = $identities;
        
        return $this;
    }
    
    /**
     * @param Checksum $checksum
     * @return Ack
     */
    public function addChecksum(Checksum $checksum): Ack
    {
        $this->checksums[] = $checksum;
        
        return $this;
    }
    
    /**
     * @return IChecksum[]
     */
    public function getChecksums(): array
    {
        return $this->checksums;
    }
    
    /**
     * @return Ack
     */
    public function clearChecksums(): Ack
    {
        $this->checksums = [];
        
        return $this;
    }
}

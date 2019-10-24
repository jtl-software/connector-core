<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Ack
 */

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;
use \Doctrine\Common\Collections\ArrayCollection;
use Jtl\Connector\Core\Checksum\IChecksum;

/**
 * Ack
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Internal
 * @Serializer\AccessType("public_method")
 */
class Ack extends DataModel
{
    /**
     * @var ArrayCollection list
     * @Serializer\Type("ArrayCollection<string, ArrayCollection<Jtl\Connector\Core\Model\Identity>>")
     * @Serializer\SerializedName("identities")
     * @Serializer\Accessor(getter="getIdentities",setter="setIdentities")
     */
    protected $identities = null;
    
    /**
     * @var Checksum[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\Checksum>")
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

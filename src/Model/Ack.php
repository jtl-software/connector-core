<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Ack
 */

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;
use \Doctrine\Common\Collections\ArrayCollection;
use Jtl\Connector\Core\Checksum\ChecksumInterface;

/**
 * Ack
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Internal
 * @Serializer\AccessType("public_method")
 */
class Ack extends Identities
{
    /**
     * @var Checksum[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\Checksum>")
     * @Serializer\SerializedName("checksums")
     * @Serializer\AccessType("reflection")
     */
    protected $checksums = [];

    /**
     * @param ChecksumInterface $checksum
     * @return Ack
     */
    public function addChecksum(ChecksumInterface $checksum): Ack
    {
        $this->checksums[] = $checksum;
        
        return $this;
    }
    
    /**
     * @return Checksum[]
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

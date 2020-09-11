<?php
namespace Jtl\Connector\Core\Model;

/**
 * Class Identities
 * @package Jtl\Connector\Core\Model
 *
 * @Serializer\AccessType("public_method")
 */
class Identities extends AbstractModel
{
    /**
     * @var Identity[]
     * @Serializer\Type("array<string, array<Jtl\Connector\Core\Model\Identity>>")
     * @Serializer\SerializedName("identities")
     * @Serializer\Accessor(getter="getIdentities",setter="setIdentities")
     */
    protected $identities = [];

    /**
     * Identities getter
     *
     * @return Identity[]
     */
    public function getIdentities(): array
    {
        return $this->identities;
    }

    /**
     * Identities getter
     *
     * @param Identity[] $identities
     * @return Ack
     */
    public function setIdentities(array $identities): self
    {
        $this->identities = $identities;

        return $this;
    }
}

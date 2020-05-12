<?php
namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

abstract class AbstractIdentity extends AbstractDataModel implements IdentityInterface
{
    /**
     * @var Identity Unique id
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;

    /**
     * AbstractIdentity constructor.
     * @param string $endpoint
     * @param int $host
     */
    public function __construct(string $endpoint = '', int $host = 0)
    {
        $this->id = new Identity($endpoint, $host);
    }

    /**
     * @param Identity $id Unique id
     * @return self
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Identity Unique id
     */
    public function getId(): Identity
    {
        return $this->id;
    }
}

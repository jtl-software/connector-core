<?php
namespace Jtl\Connector\Core\Model;


class AbstractIdentity extends AbstractDataModel implements IdentityInterface
{
    /**
     * @var Identity Unique id
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
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
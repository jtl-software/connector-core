<?php

namespace Jtl\Connector\Core\Event;

use Jtl\Connector\Core\Model\Identities;
use Symfony\Contracts\EventDispatcher\Event;

class IdentitiesEvent extends Event
{
    /**
     * @var Identities
     */
    protected $identities;

    /**
     * IdentitiesEvent constructor.
     * @param Identities $identities
     */
    public function __construct(Identities $identities)
    {
        $this->identities = $identities;
    }

    /**
     * @return Identities
     */
    public function getIdentities(): Identities
    {
        return $this->identities;
    }
}

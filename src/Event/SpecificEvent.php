<?php
namespace Jtl\Connector\Core\Event;

use Jtl\Connector\Core\Model\Specific;
use Symfony\Contracts\EventDispatcher\Event;

class SpecificEvent extends Event
{
    /**
     * @var Specific
     */
    protected $specific;

    /**
     * SpecificEvent constructor.
     * @param Specific $specific
     */
    public function __construct(Specific $specific)
    {
        $this->specific = $specific;
    }

    /**
     * @return Specific
     */
    public function getSpecific(): Specific
    {
        return $this->specific;
    }
}

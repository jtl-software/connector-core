<?php
namespace Jtl\Connector\Core\Event\CrossSelling;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\CrossSelling;

class CrossSellingBeforeDeleteEvent extends Event
{
    const EVENT_NAME = 'crossselling.before.delete';

    protected $crossSelling;

    public function __construct(CrossSelling &$crossSelling)
    {
        $this->crossSelling = $crossSelling;
    }

    public function getCrossSelling()
    {
        return $this->crossSelling;
    }
}

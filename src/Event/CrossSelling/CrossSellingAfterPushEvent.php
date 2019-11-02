<?php
namespace Jtl\Connector\Core\Event\CrossSelling;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\CrossSelling;

class CrossSellingAfterPushEvent extends Event
{
    const EVENT_NAME = 'crossselling.after.push';

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

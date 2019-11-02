<?php
namespace Jtl\Connector\Core\Event\Manufacturer;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\Manufacturer;

class ManufacturerAfterPushEvent extends Event
{
    const EVENT_NAME = 'manufacturer.after.push';

    protected $manufacturer;

    public function __construct(Manufacturer &$manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    public function getManufacturer()
    {
        return $this->manufacturer;
    }
}

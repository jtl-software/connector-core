<?php

namespace Jtl\Connector\Core\Event;

use Jtl\Connector\Core\Model\Manufacturer;
use Symfony\Contracts\EventDispatcher\Event;

class ManufacturerEvent extends Event
{
    /**
     * @var Manufacturer
     */
    protected $manufacturer;

    /**
     * ManufacturerEvent constructor.
     * @param Manufacturer $manufacturer
     */
    public function __construct(Manufacturer $manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @return Manufacturer
     */
    public function getManufacturer(): Manufacturer
    {
        return $this->manufacturer;
    }
}

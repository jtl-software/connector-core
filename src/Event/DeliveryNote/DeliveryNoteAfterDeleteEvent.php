<?php
namespace Jtl\Connector\Core\Event\DeliveryNote;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\DeliveryNote;

class DeliveryNoteAfterDeleteEvent extends Event
{
    const EVENT_NAME = 'deliverynote.after.delete';

    protected $deliveryNote;

    public function __construct(DeliveryNote &$deliveryNote)
    {
        $this->deliveryNote = $deliveryNote;
    }

    public function getDeliveryNote()
    {
        return $this->deliveryNote;
    }
}

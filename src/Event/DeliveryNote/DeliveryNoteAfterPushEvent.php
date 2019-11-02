<?php
namespace Jtl\Connector\Core\Event\DeliveryNote;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\DeliveryNote;

class DeliveryNoteAfterPushEvent extends Event
{
    const EVENT_NAME = 'deliverynote.after.push';

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

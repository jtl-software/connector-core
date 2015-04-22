<?php
namespace jtl\Connector\Event\DeliveryNote;

use \Symfony\Component\EventDispatcher\Event;
use \jtl\Connector\Core\Model\QueryFilter;

class DeliveryNoteAfterPullEvent extends Event
{
    const EVENT_NAME = 'deliveryNote.after.pull';

    protected $filter;
    
    public function __construct(QueryFilter &$filter)
    {
        $this->filter = $filter;    
    }

    public function getFilter()
    {
        return $this->filter;    
    }
}

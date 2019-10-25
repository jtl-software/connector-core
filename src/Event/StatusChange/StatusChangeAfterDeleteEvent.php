<?php
namespace Jtl\Connector\Core\Event\StatusChange;

use Symfony\Component\EventDispatcher\Event;
use Jtl\Connector\Core\Model\StatusChange;


class StatusChangeAfterDeleteEvent extends Event
{
    const EVENT_NAME = 'statuschange.after.delete';

	protected $statusChange;

    public function __construct(StatusChange &$statusChange)
    {
		$this->statusChange = $statusChange;
    }

    public function getStatusChange()
    {
        return $this->statusChange;
	}
	
}

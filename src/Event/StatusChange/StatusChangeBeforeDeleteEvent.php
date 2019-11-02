<?php
namespace Jtl\Connector\Core\Event\StatusChange;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\StatusChange;


class StatusChangeBeforeDeleteEvent extends Event
{
    const EVENT_NAME = 'statuschange.before.delete';

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

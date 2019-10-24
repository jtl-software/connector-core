<?php
namespace Jtl\Connector\Core\Event\Specific;

use Symfony\Component\EventDispatcher\Event;
use Jtl\Connector\Core\Model\Specific;


class SpecificAfterDeleteEvent extends Event
{
    const EVENT_NAME = 'specific.after.delete';

	protected $specific;

    public function __construct(Specific &$specific)
    {
		$this->specific = $specific;
    }

    public function getSpecific()
    {
        return $this->specific;
	}
	
}

<?php
namespace Jtl\Connector\Core\Event\Payment;

use Symfony\Component\EventDispatcher\Event;
use Jtl\Connector\Core\Model\QueryFilter;


class PaymentBeforePullEvent extends Event
{
    const EVENT_NAME = 'payment.before.pull';

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

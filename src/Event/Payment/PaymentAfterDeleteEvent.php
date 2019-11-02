<?php
namespace Jtl\Connector\Core\Event\Payment;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\Payment;

class PaymentAfterDeleteEvent extends Event
{
    const EVENT_NAME = 'payment.after.delete';

    protected $payment;

    public function __construct(Payment &$payment)
    {
        $this->payment = $payment;
    }

    public function getPayment()
    {
        return $this->payment;
    }
}

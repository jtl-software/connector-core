<?php
namespace Jtl\Connector\Core\Event;

use Jtl\Connector\Core\Model\Payment;
use Symfony\Contracts\EventDispatcher\Event;

class PaymentEvent extends Event
{
    /**
     * @var Payment
     */
    protected $payment;

    /**
     * PaymentEvent constructor.
     * @param Payment $payment
     */
    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
    }

    /**
     * @return Payment
     */
    public function getPayment(): Payment
    {
        return $this->payment;
    }
}
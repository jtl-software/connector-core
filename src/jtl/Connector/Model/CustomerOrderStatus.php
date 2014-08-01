<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Customer order status
 *
 * @access public
 * @package jtl\Connector\Model
 */
class CustomerOrderStatus
{
    /**
     * @var string - Initial status for new customerOrder, when customer finished order and order has not yet been payed or fetched
     */
    const STATUS_NEW = 'new';

    /**
     * @var string - Customer order in process
     */   
    const STATUS_PROCESSING = 'processing';

    /**
     * @var string - Status when order is payed completely
     */
    const STATUS_PAYMENT_COMPLETED = 'payment_completed';

    /**
     * @var string - Order payed and shipped completely
     */
    const STATUS_COMPLETED = 'completed';

    /**
     * @var string - Order has been shipped partially
     */
    const STATUS_PARTIALLY_SHIPPED = 'partially_shipped';

    /**
     * @var string - Cancelled by merchant or customer
     */
    const STATUS_CANCELLED = 'cancelled';

    /**
     * @var string - New status, when changes have been made to customerOrder (e.g. item quantity change) 
     */
    const STATUS_UPDATED = 'updated';
}
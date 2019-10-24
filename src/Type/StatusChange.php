<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package Jtl\Connector\Core\Type
 */

namespace Jtl\Connector\Core\Type;

use \Jtl\Connector\Core\Type\PropertyInfo;

/**
 * @access public
 * @package Jtl\Connector\Core\Type
 */
class StatusChange extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('customerOrderId', 'Identity', null, false, true, false),
            new PropertyInfo('orderStatus', 'OrderStatus', '', false, false, false),
            new PropertyInfo('paymentStatus', 'PaymentStatus', '', false, false, false),
        );
    }

    public function isMain()
    {
        return false;
    }
}

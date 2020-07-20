<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package Jtl\Connector\Core\Type
 */

namespace Jtl\Connector\Core\Type;

use Jtl\Connector\Core\Type\PropertyInfo;

/**
 * @access public
 * @package Jtl\Connector\Core\Type
 */
class CustomerOrder extends AbstractDataType
{
    protected function loadProperties()
    {
        return [
            new PropertyInfo('customerId', 'Identity', null, false, true, false),
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('billingAddress', 'Jtl\Connector\Core\Model\CustomerOrderBillingAddress', null, false, false, true),
            new PropertyInfo('carrierName', 'string', '', false, false, false),
            new PropertyInfo('creationDate', 'DateTime', null, false, false, false),
            new PropertyInfo('currencyIso', 'string', '', false, false, false),
            new PropertyInfo('customerNote', 'string', '', false, false, false),
            new PropertyInfo('estimatedDeliveryDate', 'DateTime', null, false, false, false),
            new PropertyInfo('note', 'string', '', false, false, false),
            new PropertyInfo('orderNumber', 'string', '', false, false, false),
            new PropertyInfo('paymentDate', 'DateTime', null, false, false, false),
            new PropertyInfo('paymentInfo', 'Jtl\Connector\Core\Model\CustomerOrderPaymentInfo', null, false, false, true),
            new PropertyInfo('paymentModuleCode', 'string', '', false, false, false),
            new PropertyInfo('paymentStatus', 'string', '', false, false, false),
            new PropertyInfo('pui', 'string', '', false, false, false),
            new PropertyInfo('shippingAddress', 'Jtl\Connector\Core\Model\CustomerOrderShippingAddress', null, false, false, true),
            new PropertyInfo('shippingDate', 'DateTime', null, false, false, false),
            new PropertyInfo('shippingInfo', 'string', '', false, false, false),
            new PropertyInfo('shippingMethodId', 'Identity', null, false, true, false),
            new PropertyInfo('shippingMethodName', 'string', '', false, false, false),
            new PropertyInfo('status', 'string', '', false, false, false),
            new PropertyInfo('totalSum', 'double', 0.0, false, false, false),
            new PropertyInfo('totalSumGross', 'double', 0.0, false, false, false),
            new PropertyInfo('attributes', 'Jtl\Connector\Core\Model\KeyValueAttribute', null, false, false, true),
            new PropertyInfo('items', 'Jtl\Connector\Core\Model\CustomerOrderItem', null, false, false, true),
        ];
    }

    public function isMain()
    {
        return true;
    }
}

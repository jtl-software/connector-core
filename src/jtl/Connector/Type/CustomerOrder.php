<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Type;

use \jtl\Connector\Type\PropertyInfo;

/**
 * @access public
 * @package jtl\Connector\Type
 */
class CustomerOrder extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('billingAddressId', 'Identity', null, False, false, false),
            new PropertyInfo('customerId', 'Identity', null, False, false, false),
            new PropertyInfo('id', 'Identity', null, True, false, false),
            new PropertyInfo('shippingAddressId', 'Identity', null, False, false, false),
            new PropertyInfo('carrierName', 'string', null, False, false, false),
            new PropertyInfo('created', 'string', null, False, false, false),
            new PropertyInfo('credit', 'double', null, False, false, false),
            new PropertyInfo('currencyIso', 'string', null, False, false, false),
            new PropertyInfo('estimatedDeliveryDate', 'string', null, False, false, false),
            new PropertyInfo('ip', 'string', null, False, false, false),
            new PropertyInfo('isFetched', 'bool', null, False, false, false),
            new PropertyInfo('localeName', 'string', null, False, false, false),
            new PropertyInfo('note', 'string', null, False, false, false),
            new PropertyInfo('orderNumber', 'string', null, False, false, false),
            new PropertyInfo('paymentDate', 'string', null, False, false, false),
            new PropertyInfo('paymentModuleCode', 'string', null, False, false, false),
            new PropertyInfo('ratingNotificationDate', 'string', null, False, false, false),
            new PropertyInfo('session', 'string', null, False, false, false),
            new PropertyInfo('shippingDate', 'string', null, False, false, false),
            new PropertyInfo('shippingInfo', 'string', null, False, false, false),
            new PropertyInfo('shippingMethodCode', 'string', null, False, false, false),
            new PropertyInfo('shippingMethodName', 'string', null, False, false, false),
            new PropertyInfo('status', 'string', null, False, false, false),
            new PropertyInfo('totalSum', 'double', null, False, false, false),
            new PropertyInfo('tracking', 'string', null, False, false, false),
            new PropertyInfo('trackingURL', 'string', null, False, false, false),
            new PropertyInfo('positions', '\jtl\Connector\Model\CustomerOrderPosition', null, false, false, true),
            new PropertyInfo('attributes', '\jtl\Connector\Model\CustomerOrderAttr', null, false, false, true),
            new PropertyInfo('billingAddress', '\jtl\Connector\Model\CustomerOrderBillingAddress', null, false, false, true),
            new PropertyInfo('shippingAddress', '\jtl\Connector\Model\CustomerOrderShippingAddress', null, false, false, true),
            new PropertyInfo('paymentInfo', '\jtl\Connector\Model\CustomerOrderPaymentInfo', null, false, false, true),
        );
    }
}

<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Type
 */

namespace jtl\Connector\Type;

use jtl\Connector\Type\PropertyInfo;

/**
 * @access public
 * @package jtl\Connector\Type
 */
class Product extends DataModel
{
    protected function loadProperties()
    {
        return array(
			new PropertyInfo('billingAddressId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('companyId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('customerId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('id', '\jtl\Connector\Model\IdentityKeyPair', null, true, true, false),
			new PropertyInfo('shippingAddressId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('attributes', '\jtl\Connector\Model\CustomerOrderAttr', null, false, false, true),
			new PropertyInfo('billingAddress', '\jtl\Connector\Model\CustomerOrderBillingAddress', null, false, false, true),
			new PropertyInfo('created', '\jtl\Connector\Model\DateTime', null, false, false, false),
			new PropertyInfo('currencyIso', 'string', '', false, false, false),
			new PropertyInfo('estimatedDeliveryDate', '\jtl\Connector\Model\DateTime', null, false, false, false),
			new PropertyInfo('factor', 'float', 0.0, false, false, false),
			new PropertyInfo('isFullyDelivered', 'boolean', false, false, false, false),
			new PropertyInfo('isPlatform', 'boolean', false, false, false, false),
			new PropertyInfo('languageId', 'integer', 0, false, false, false),
			new PropertyInfo('nGesperrt', 'integer', 0, false, false, false),
			new PropertyInfo('orderNumber', 'string', '', false, false, false),
			new PropertyInfo('paymentDate', '\jtl\Connector\Model\DateTime', null, false, false, false),
			new PropertyInfo('paymentInfo', '\jtl\Connector\Model\CustomerOrderPaymentInfo', null, false, false, true),
			new PropertyInfo('paymentModuleCode', 'string', '', false, false, false),
			new PropertyInfo('positions', '\jtl\Connector\Model\CustomerOrderItem', null, false, false, true),
			new PropertyInfo('shippingAddress', '\jtl\Connector\Model\CustomerOrderShippingAddress', null, false, false, true),
			new PropertyInfo('shippingDate', '\jtl\Connector\Model\DateTime', null, false, false, false),
			new PropertyInfo('shippingInfo', 'string', '', false, false, false),
			new PropertyInfo('status', 'string', '', false, false, false),
        );
    }
}

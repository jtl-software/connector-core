<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Type
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
            new PropertyInfo('billingAddressId', 'Identity', null, false, true, false),
            new PropertyInfo('customerId', 'Identity', null, false, true, false),
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('shippingAddressId', 'Identity', null, false, true, false),
            new PropertyInfo('billingAddress', 'string', '', false, false, false),
            new PropertyInfo('creationDate', 'DateTime', null, false, false, false),
            new PropertyInfo('languageISO', 'string', '', false, false, false),
            new PropertyInfo('orderNumber', 'string', '', false, false, false),
            new PropertyInfo('paymentDate', 'DateTime', null, false, false, false),
            new PropertyInfo('paymentInfo', 'string', '', false, false, false),
            new PropertyInfo('shippingAddress', 'string', '', false, false, false),
            new PropertyInfo('shippingDate', 'DateTime', null, false, false, false),
            new PropertyInfo('shippingInfo', 'string', '', false, false, false),
            new PropertyInfo('shippingMethodCode', 'integer', 0, false, false, false),
            new PropertyInfo('status', 'string', '', false, false, false),
            new PropertyInfo('attributes', '\jtl\Connector\Model\CustomerOrderAttr', null, false, false, true),
            new PropertyInfo('items', '\jtl\Connector\Model\CustomerOrderItem', null, false, false, true),
        );
    }

    public function isMain()
    {
        return true;
    }
}

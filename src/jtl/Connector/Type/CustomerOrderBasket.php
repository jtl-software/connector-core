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
class CustomerOrderBasket extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('customerId', 'int', null, false, true, false),
            new PropertyInfo('customerOrderPaymentInfoId', 'int', null, false, true, false),
            new PropertyInfo('id', 'int', null, true, true, false),
            new PropertyInfo('shippingAddressId', 'int', null, false, true, false),
        );
    }

	public function isMain()
	{
		return false;
	}
}

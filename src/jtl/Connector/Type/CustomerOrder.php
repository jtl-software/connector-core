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
class CustomerOrder extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'475D59EA' => new PropertyInfo('billingAddressId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'7A6CE769' => new PropertyInfo('companyId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'070C00D5' => new PropertyInfo('customerId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'CDE6B7C7' => new PropertyInfo('id', '\jtl\Connector\Model\Identity', null, true, true, true),
			'CD2D081A' => new PropertyInfo('shippingAddressId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'E92960DA' => new PropertyInfo('created', '\jtl\Connector\Model\DateTime', null, false, false, false),
			'D9F6B1C1' => new PropertyInfo('currencyIso', 'string', '', false, false, false),
			'F3016221' => new PropertyInfo('estimatedDeliveryDate', '\jtl\Connector\Model\DateTime', null, false, false, false),
			'CE87900C' => new PropertyInfo('factor', 'float', 0.0, false, false, false),
			'C3D7CA49' => new PropertyInfo('isFullyDelivered', 'boolean', false, false, false, false),
			'39704D58' => new PropertyInfo('isPlatform', 'boolean', false, false, false, false),
			'5FB1F040' => new PropertyInfo('languageId', 'integer', 0, false, false, false),
			'75D26A5B' => new PropertyInfo('nGesperrt', 'integer', 0, false, false, false),
			'C8733F0F' => new PropertyInfo('orderNumber', 'string', '', false, false, false),
			'5ED1D85C' => new PropertyInfo('paymentDate', '\jtl\Connector\Model\DateTime', null, false, false, false),
			'E9AAE2C2' => new PropertyInfo('paymentModuleCode', 'string', '', false, false, false),
			'34D9DABF' => new PropertyInfo('shippingDate', '\jtl\Connector\Model\DateTime', null, false, false, false),
			'0968A7E4' => new PropertyInfo('shippingInfo', 'string', '', false, false, false),
			'8A82A95D' => new PropertyInfo('status', 'string', '', false, false, false),
        );
    }
}



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
class CustomerOrderItemVariation extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'F674B959' => new PropertyInfo('customerOrderItemId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'CDE6B7C7' => new PropertyInfo('id', '\jtl\Connector\Model\Identity', null, true, true, true),
			'46FFEF34' => new PropertyInfo('productId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'81B11883' => new PropertyInfo('productVariationId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'D57AFDF2' => new PropertyInfo('productVariationValueId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'32676CB0' => new PropertyInfo('productVariationName', 'string', '', false, false, false),
			'A51BAFC7' => new PropertyInfo('productVariationValueName', 'string', '', false, false, false),
			'65A440F2' => new PropertyInfo('surcharge', 'float', 0.0, false, false, false),
        );
    }
}



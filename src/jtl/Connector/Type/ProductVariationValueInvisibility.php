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
class ProductVariationValueInvisibility extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'C5988257' => new PropertyInfo('customerGroupId', '\jtl\Connector\Model\Identity', null, true, true, true),
			'D57AFDF2' => new PropertyInfo('productVariationValueId', '\jtl\Connector\Model\Identity', null, true, true, true),
			'569E932A' => new PropertyInfo('connectorId', 'integer', 0, true, true, true),
        );
    }
}



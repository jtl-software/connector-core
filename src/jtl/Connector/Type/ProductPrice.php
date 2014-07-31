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
class ProductPrice extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'C5988257' => new PropertyInfo('customerGroupId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'46FFEF34' => new PropertyInfo('productId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'9ADBE9DF' => new PropertyInfo('netPrice', 'float', 0.0, false, false, false),
			'14A73220' => new PropertyInfo('quantity', 'integer', 0, false, false, false),
        );
    }
}



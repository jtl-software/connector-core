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
class CustomerOrderItem extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'E84CBC37' => new PropertyInfo('configItemId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'EB8CC998' => new PropertyInfo('customerOrderId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'CDE6B7C7' => new PropertyInfo('id', '\jtl\Connector\Model\Identity', null, true, true, true),
			'46FFEF34' => new PropertyInfo('productId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'414DA08C' => new PropertyInfo('grossPrice', 'float', 0.0, false, false, false),
			'71323432' => new PropertyInfo('kBestellStueckliste', 'integer', 0, false, false, false),
			'03BD1C7B' => new PropertyInfo('name', 'string', '', false, false, false),
			'4AAF050E' => new PropertyInfo('price', 'float', 0.0, false, false, false),
			'14A73220' => new PropertyInfo('quantity', 'float', 0.0, false, false, false),
			'3AE077AE' => new PropertyInfo('sku', 'string', '', false, false, false),
			'484219DD' => new PropertyInfo('sort', 'integer', 0, false, false, false),
			'C15430A6' => new PropertyInfo('type', 'string', '', false, false, false),
			'16A204C3' => new PropertyInfo('unique', 'string', '', false, false, false),
			'98330310' => new PropertyInfo('vat', 'float', 0.0, false, false, false),
        );
    }
}



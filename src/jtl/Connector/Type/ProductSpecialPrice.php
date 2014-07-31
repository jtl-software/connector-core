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
class ProductSpecialPrice extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'CDE6B7C7' => new PropertyInfo('id', '\jtl\Connector\Model\Identity', null, true, true, true),
			'46FFEF34' => new PropertyInfo('productId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'4994D003' => new PropertyInfo('activeFrom', '\jtl\Connector\Model\DateTime', null, false, false, false),
			'C683ADFC' => new PropertyInfo('activeUntil', '\jtl\Connector\Model\DateTime', null, false, false, false),
			'085434D8' => new PropertyInfo('considerDateLimit', 'integer', 0, false, false, false),
			'2CFEC7A7' => new PropertyInfo('considerStockLimit', 'integer', 0, false, false, false),
			'597AD442' => new PropertyInfo('isActive', 'boolean', false, false, false, false),
			'AF30EBF9' => new PropertyInfo('stockLimit', 'integer', 0, false, false, false),
        );
    }
}



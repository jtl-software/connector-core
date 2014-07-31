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
class ProductVariation extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'CDE6B7C7' => new PropertyInfo('id', '\jtl\Connector\Model\Identity', null, true, true, true),
			'46FFEF34' => new PropertyInfo('productId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'A6DCA77D' => new PropertyInfo('cName', 'string', '', false, false, false),
			'597AD442' => new PropertyInfo('isActive', 'boolean', false, false, false, false),
			'47FD1719' => new PropertyInfo('isSelectable', 'boolean', false, false, false, false),
			'484219DD' => new PropertyInfo('sort', 'integer', 0, false, false, false),
			'C15430A6' => new PropertyInfo('type', 'string', '', false, false, false),
        );
    }
}



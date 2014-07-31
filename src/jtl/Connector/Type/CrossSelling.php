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
class CrossSelling extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'E8914145' => new PropertyInfo('crossSellingGroupId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'63482FD0' => new PropertyInfo('crossSellingProductId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'CDE6B7C7' => new PropertyInfo('id', '\jtl\Connector\Model\Identity', null, true, true, true),
			'46FFEF34' => new PropertyInfo('productId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'11C23EF8' => new PropertyInfo('nEigenesFeld', 'integer', 0, false, false, false),
        );
    }
}



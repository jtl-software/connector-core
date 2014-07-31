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
class CustomerAttr extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'070C00D5' => new PropertyInfo('customerId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'CDE6B7C7' => new PropertyInfo('id', '\jtl\Connector\Model\Identity', null, true, true, true),
			'9AFD0062' => new PropertyInfo('key', 'string', '', false, false, false),
			'D03C6199' => new PropertyInfo('value', 'string', '', false, false, false),
        );
    }
}



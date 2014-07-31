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
class SpecificValue extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'CDE6B7C7' => new PropertyInfo('id', '\jtl\Connector\Model\Identity', null, true, true, true),
			'FC6B6A0D' => new PropertyInfo('specificId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'484219DD' => new PropertyInfo('sort', 'integer', 0, false, false, false),
        );
    }
}



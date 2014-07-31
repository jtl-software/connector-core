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
class CategoryAttr extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'E479F72A' => new PropertyInfo('categoryId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'CDE6B7C7' => new PropertyInfo('id', '\jtl\Connector\Model\Identity', null, true, true, true),
			'03BD1C7B' => new PropertyInfo('name', 'string', '', false, false, false),
			'484219DD' => new PropertyInfo('sort', 'integer', 0, false, false, false),
			'D03C6199' => new PropertyInfo('value', 'string', '', false, false, false),
        );
    }
}



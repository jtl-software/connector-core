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
class Category extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'CDE6B7C7' => new PropertyInfo('id', '\jtl\Connector\Model\Identity', null, true, true, true),
			'F7792ECF' => new PropertyInfo('parentCategoryId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'A8E50D9E' => new PropertyInfo('description', 'string', '', false, false, false),
			'23183CC4' => new PropertyInfo('flagDelete', 'boolean', false, false, false, false),
			'3CE59533' => new PropertyInfo('flagUpdate', 'boolean', false, false, false, false),
			'597AD442' => new PropertyInfo('isActive', 'boolean', false, false, false, false),
			'497BA5C2' => new PropertyInfo('level', 'integer', 0, false, false, false),
			'03BD1C7B' => new PropertyInfo('name', 'string', '', false, false, false),
			'484219DD' => new PropertyInfo('sort', 'integer', 0, false, false, false),
			'AD7DA7E9' => new PropertyInfo('url', 'string', '', false, false, false),
        );
    }
}



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
class CategoryImage extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'E1D00EE7' => new PropertyInfo('foreignKey', '\jtl\Connector\Model\Identity', null, false, false, false),
			'CDE6B7C7' => new PropertyInfo('id', '\jtl\Connector\Model\Identity', null, true, true, true),
			'796E0302' => new PropertyInfo('data', '\jtl\Connector\Model\Byte[]', null, false, false, false),
			'23183CC4' => new PropertyInfo('flagDelete', 'boolean', false, false, false, false),
			'3CE59533' => new PropertyInfo('flagUpdate', 'boolean', false, false, false, false),
			'93A45A52' => new PropertyInfo('modified', 'string', '', false, false, false),
			'F1577505' => new PropertyInfo('size', 'integer', 0, false, false, false),
        );
    }
}



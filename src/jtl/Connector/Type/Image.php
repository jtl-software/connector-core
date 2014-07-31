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
class Image extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'756A9AB5' => new PropertyInfo('filename', 'string', '', false, false, false),
			'E1D00EE7' => new PropertyInfo('foreignKey', '\jtl\Connector\Model\Identity', null, false, false, false),
			'CDE6B7C7' => new PropertyInfo('id', '\jtl\Connector\Model\Identity', null, false, false, false),
			'2D38FE9C' => new PropertyInfo('masterImageId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'9713D48F' => new PropertyInfo('relationType', 'integer', 0, false, false, false),
			'484219DD' => new PropertyInfo('sort', 'integer', 0, false, false, false),
        );
    }
}



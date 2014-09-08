<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Type
 */

namespace jtl\Connector\Type;

use \jtl\Connector\Type\PropertyInfo;

/**
 * @access public
 * @package jtl\Connector\Type
 */
class MediaFile extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('id', 'int', null, true, true, false),
            new PropertyInfo('mediaFileCategory', 'string', null, false, false, false),
            new PropertyInfo('path', 'string', null, false, false, false),
            new PropertyInfo('productId', 'int', null, true, true, false),
            new PropertyInfo('sort', 'int', null, false, false, false),
            new PropertyInfo('type', 'string', null, false, false, false),
            new PropertyInfo('url', 'string', null, false, false, false),
            new PropertyInfo('i18ns', '\jtl\Connector\Model\MediaFileI18n', null, false, false, true),
            new PropertyInfo('attributes', '\jtl\Connector\Model\MediaFileAttr', null, false, false, true),
        );
    }

	public function isMain()
	{
		return false;
	}
}

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
class CategoryI18n extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('categoryId', 'int', null, true, true, false),
            new PropertyInfo('description', 'string', null, false, false, false),
            new PropertyInfo('localeName', 'string', null, false, false, false),
            new PropertyInfo('metaDescription', 'string', null, false, false, false),
            new PropertyInfo('metaKeywords', 'string', null, false, false, false),
            new PropertyInfo('name', 'string', null, false, false, false),
            new PropertyInfo('titleTag', 'string', null, false, false, false),
            new PropertyInfo('urlPath', 'string', null, false, false, false),
        );
    }

	public function isMain()
	{
		return false;
	}
}

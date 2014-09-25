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
class Category extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('id', 'int', null, true, true, false),
            new PropertyInfo('isActive', 'bool', null, false, false, false),
            new PropertyInfo('level', 'int', null, false, false, false),
            new PropertyInfo('parentCategoryId', 'int', null, false, true, false),
            new PropertyInfo('sort', 'int', null, false, false, false),
            new PropertyInfo('parent', '\jtl\Connector\Model\Category', null, false, false, true),
            new PropertyInfo('invisibilities', '\jtl\Connector\Model\CategoryInvisibility', null, false, false, true),
            new PropertyInfo('i18ns', '\jtl\Connector\Model\CategoryI18n', null, false, false, true),
            new PropertyInfo('customerGroups', '\jtl\Connector\Model\CategoryCustomerGroup', null, false, false, true),
            new PropertyInfo('children', '\jtl\Connector\Model\Category', null, false, false, true),
        );
    }

	public function isMain()
	{
		return true;
	}
}

<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
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
            new PropertyInfo('id', 'Identity', null, True, false, false),
            new PropertyInfo('parentCategoryId', 'Identity', null, False, false, false),
            new PropertyInfo('level', 'int', null, False, false, false),
            new PropertyInfo('sort', 'int', null, False, false, false),
            new PropertyInfo('children', '\jtl\Connector\Model\ChildCategory', null, false, false, true),
            new PropertyInfo('parent', '\jtl\Connector\Model\ParentCategory', null, false, false, true),
            new PropertyInfo('i18ns', '\jtl\Connector\Model\CategoryI18n', null, false, false, true),
            new PropertyInfo('invisibilities', '\jtl\Connector\Model\CategoryInvisibility', null, false, false, true),
            new PropertyInfo('customerGroups', '\jtl\Connector\Model\CategoryCustomerGroup', null, false, false, true),
            new PropertyInfo('attributes', '\jtl\Connector\Model\CategoryAttr', null, false, false, true),
        );
    }
}

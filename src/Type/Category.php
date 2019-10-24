<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package Jtl\Connector\Core\Type
 */

namespace Jtl\Connector\Core\Type;

/**
 * @access public
 * @package Jtl\Connector\Core\Type
 */
class Category extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('parentCategoryId', 'Identity', null, false, true, false),
            new PropertyInfo('isActive', 'boolean', false, false, false, false),
            new PropertyInfo('level', 'integer', 0, false, false, false),
            new PropertyInfo('sort', 'integer', 0, false, false, false),
            new PropertyInfo('attributes', '\Jtl\Connector\Core\Model\CategoryAttr', null, false, false, true),
            new PropertyInfo('customerGroups', '\Jtl\Connector\Core\Model\CategoryCustomerGroup', null, false, false, true),
            new PropertyInfo('i18ns', '\Jtl\Connector\Core\Model\CategoryI18n', null, false, false, true),
            new PropertyInfo('invisibilities', '\Jtl\Connector\Core\Model\CategoryInvisibility', null, false, false, true),
        );
    }

    public function isMain()
    {
        return true;
    }
}

<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package Jtl\Connector\Core\Type
 */

namespace Jtl\Connector\Core\Type;

use \Jtl\Connector\Core\Type\PropertyInfo;

/**
 * @access public
 * @package Jtl\Connector\Core\Type
 */
class CategoryAttr extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('categoryId', 'Identity', null, false, true, false),
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('isCustomProperty', 'boolean', false, false, false, false),
            new PropertyInfo('isTranslated', 'boolean', false, false, false, false),
            new PropertyInfo('i18ns', '\Jtl\Connector\Core\Model\CategoryAttrI18n', null, false, false, true),
        );
    }

    public function isMain()
    {
        return false;
    }
}

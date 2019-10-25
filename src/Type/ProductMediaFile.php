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
class ProductMediaFile extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('mediaFileCategory', 'string', '', false, false, false),
            new PropertyInfo('path', 'string', '', false, false, false),
            new PropertyInfo('sort', 'integer', '', false, false, false),
            new PropertyInfo('type', 'string', '', false, false, false),
            new PropertyInfo('url', 'string', '', false, false, false),
            new PropertyInfo('attributes', '\Jtl\Connector\Core\Model\ProductMediaFileAttr', null, false, false, true),
            new PropertyInfo('i18ns', '\Jtl\Connector\Core\Model\ProductMediaFileI18n', null, false, false, true),
        );
    }

    public function isMain()
    {
        return false;
    }
}

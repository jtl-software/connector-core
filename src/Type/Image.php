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
class Image extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('foreignKey', 'Identity', null, false, true, false),
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('filename', 'string', '', false, false, false),
            new PropertyInfo('relationType', 'ImageRelationType', '', false, false, false),
            new PropertyInfo('remoteUrl', 'string', '', false, false, false),
            new PropertyInfo('name', 'string', '', false, false, false),
            new PropertyInfo('sort', 'integer', 0, false, false, false),
            new PropertyInfo('i18ns', '\Jtl\Connector\Core\Model\ImageI18n', null, false, false, true),
        );
    }

    public function isMain()
    {
        return true;
    }
}

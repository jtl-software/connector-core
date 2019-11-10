<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package Jtl\Connector\Core\Type
 */

namespace Jtl\Connector\Core\Type;

use Jtl\Connector\Core\Type\PropertyInfo;

/**
 * @access public
 * @package Jtl\Connector\Core\Type
 */
class ConfigGroup extends AbstractDataType
{
    protected function loadProperties()
    {
        return [
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('comment', 'string', '', false, false, false),
            new PropertyInfo('imagePath', 'string', '', false, false, false),
            new PropertyInfo('maximumSelection', 'integer', 0, false, false, false),
            new PropertyInfo('minimumSelection', 'integer', 0, false, false, false),
            new PropertyInfo('sort', 'integer', 0, false, false, false),
            new PropertyInfo('type', 'integer', 0, false, false, false),
            new PropertyInfo('i18ns', 'Jtl\Connector\Core\Model\ConfigGroupI18n', null, false, false, true),
        ];
    }

    public function isMain()
    {
        return false;
    }
}

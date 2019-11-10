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
class Checksum extends AbstractDataType
{
    protected function loadProperties()
    {
        return [
            new PropertyInfo('foreignKey', 'Identity', null, false, true, false),
            new PropertyInfo('endpoint', 'string', '', false, false, false),
            new PropertyInfo('hasChanged', 'boolean', false, false, false, false),
            new PropertyInfo('host', 'string', '', false, false, false),
            new PropertyInfo('type', 'integer', '', false, false, false),
        ];
    }

    public function isMain()
    {
        return false;
    }
}

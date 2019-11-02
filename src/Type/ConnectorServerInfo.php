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
class ConnectorServerInfo extends DataType
{
    protected function loadProperties()
    {
        return [
            new PropertyInfo('memoryLimit', 'integer', '', false, false, false),
            new PropertyInfo('executionTime', 'integer', '', false, false, false),
            new PropertyInfo('postMaxSize', 'integer', '', false, false, false),
            new PropertyInfo('uploadMaxFilesize', 'integer', '', false, false, false),
        ];
    }

    public function isMain()
    {
        return false;
    }
}

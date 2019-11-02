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
class Statistic extends DataType
{
    protected function loadProperties()
    {
        return [
            new PropertyInfo('available', 'integer', null, false, false, false),
            new PropertyInfo('controllerName', 'string', false, false, false, false)
        ];
    }

    public function isMain()
    {
        return false;
    }
}

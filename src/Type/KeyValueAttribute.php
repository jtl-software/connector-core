<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package Jtl\Connector\Core\Type
 */

namespace Jtl\Connector\Core\Type;

use \Jtl\Connector\Core\Type\PropertyInfo;

/**
 * Class KeyValueAttribute
 * @access public
 * @package Jtl\Connector\Core\Type
 */
class KeyValueAttribute extends DataType
{
    /**
     * @return array|PropertyInfo[]
     */
    protected function loadProperties()
    {
        return [
            new PropertyInfo('value', 'string', '', false, false, false),
            new PropertyInfo('key', 'string', '', false, false, false),
        ];
    }

    /**
     * @return bool
     */
    public function isMain()
    {
        return false;
    }
}
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
class BoolResult extends DataType
{
    protected function loadProperties()
    {
        return [
            new PropertyInfo('result', 'boolean', false, false, false, false)
        ];
    }
    
    public function isMain()
    {
        return false;
    }
}

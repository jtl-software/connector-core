<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Type
 */

namespace jtl\Connector\Type;


/**
 * @access public
 * @package jtl\Connector\Type
 */
class BoolResult extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('result', 'boolean', false, false, false, false)
        );
    }
    
    public function isMain()
    {
        return false;
    }
}

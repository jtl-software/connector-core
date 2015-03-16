<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Type
 */

namespace jtl\Connector\Type;

use \jtl\Connector\Type\PropertyInfo;

/**
 * @access public
 * @package jtl\Connector\Type
 */
class StatusChange extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('customerOrderId', 'Identity', null, true, true, false),
            new PropertyInfo('paymentStatus', 'string', '', false, false, false),
            new PropertyInfo('orderStatus', 'string', '', false, false, false)
        );
    }

    public function isMain()
    {
        return true;
    }
}

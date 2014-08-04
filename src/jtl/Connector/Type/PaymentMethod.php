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
class PaymentMethod extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('moduleId', 'Identity', null, false, true, false),
            new PropertyInfo('isActive', 'bool', null, false, false, false),
            new PropertyInfo('isUseable', 'bool', null, false, false, false),
            new PropertyInfo('picture', 'string', null, false, false, false),
            new PropertyInfo('sort', 'int', null, false, false, false),
            new PropertyInfo('useMail', 'bool', null, false, false, false),
            new PropertyInfo('vendor', 'string', null, false, false, false),
        );
    }
}

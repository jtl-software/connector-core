<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
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
            new PropertyInfo('id', 'Identity', null, True, false, false),
            new PropertyInfo('moduleId', 'Identity', null, False, false, false),
            new PropertyInfo('isActive', 'bool', null, False, false, false),
            new PropertyInfo('isUseable', 'bool', null, False, false, false),
            new PropertyInfo('picture', 'string', null, False, false, false),
            new PropertyInfo('sort', 'int', null, False, false, false),
            new PropertyInfo('useMail', 'bool', null, False, false, false),
            new PropertyInfo('vendor', 'string', null, False, false, false),
        );
    }
}

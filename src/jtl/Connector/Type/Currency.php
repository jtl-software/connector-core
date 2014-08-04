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
class Currency extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('id', 'Identity', null, True, false, false),
            new PropertyInfo('delimiterCent', 'string', null, False, false, false),
            new PropertyInfo('delimiterThousand', 'string', null, False, false, false),
            new PropertyInfo('factor', 'double', null, False, false, false),
            new PropertyInfo('hasCurrencySignBeforeValue', 'bool', null, False, false, false),
            new PropertyInfo('isDefault', 'bool', null, False, false, false),
            new PropertyInfo('iso', 'string', null, False, false, false),
            new PropertyInfo('name', 'string', null, False, false, false),
            new PropertyInfo('nameHtml', 'string', null, False, false, false),
        );
    }
}

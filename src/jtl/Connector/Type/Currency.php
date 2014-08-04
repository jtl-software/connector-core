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
class Currency extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('delimiterCent', 'string', null, false, false, false),
            new PropertyInfo('delimiterThousand', 'string', null, false, false, false),
            new PropertyInfo('factor', 'double', null, false, false, false),
            new PropertyInfo('hasCurrencySignBeforeValue', 'bool', null, false, false, false),
            new PropertyInfo('isDefault', 'bool', null, false, false, false),
            new PropertyInfo('iso', 'string', null, false, false, false),
            new PropertyInfo('name', 'string', null, false, false, false),
            new PropertyInfo('nameHtml', 'string', null, false, false, false),
        );
    }
}

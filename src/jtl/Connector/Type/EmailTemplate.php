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
class EmailTemplate extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('description', 'string', null, false, false, false),
            new PropertyInfo('emailType', 'string', null, false, false, false),
            new PropertyInfo('error', 'int', null, false, false, false),
            new PropertyInfo('filename', 'string', null, false, false, false),
            new PropertyInfo('isActive', 'bool', null, false, false, false),
            new PropertyInfo('isAgb', 'bool', null, false, false, false),
            new PropertyInfo('isOii', 'bool', null, false, false, false),
            new PropertyInfo('isWrb', 'bool', null, false, false, false),
            new PropertyInfo('moduleId', 'string', null, false, false, false),
            new PropertyInfo('name', 'string', null, false, false, false),
        );
    }
}

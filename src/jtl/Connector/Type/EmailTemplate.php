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
class EmailTemplate extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('id', 'Identity', null, True, false, false),
            new PropertyInfo('description', 'string', null, False, false, false),
            new PropertyInfo('emailType', 'string', null, False, false, false),
            new PropertyInfo('error', 'int', null, False, false, false),
            new PropertyInfo('filename', 'string', null, False, false, false),
            new PropertyInfo('isActive', 'bool', null, False, false, false),
            new PropertyInfo('isAgb', 'bool', null, False, false, false),
            new PropertyInfo('isOii', 'bool', null, False, false, false),
            new PropertyInfo('isWrb', 'bool', null, False, false, false),
            new PropertyInfo('moduleId', 'string', null, False, false, false),
            new PropertyInfo('name', 'string', null, False, false, false),
        );
    }
}

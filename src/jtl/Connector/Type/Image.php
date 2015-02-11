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
class Image extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('foreignKey', 'Identity', null, false, true, false),
            new PropertyInfo('id', 'Identity', null, false, true, false),
            new PropertyInfo('filename', 'string', '', false, false, false),
            new PropertyInfo('relationType', 'string', '', false, false, false),
        );
    }

    public function isMain()
    {
        return false;
    }
}

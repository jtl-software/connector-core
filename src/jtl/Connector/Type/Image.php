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
class Image extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('foreignKey', 'Identity', null, False, false, false),
            new PropertyInfo('id', 'Identity', null, False, false, false),
            new PropertyInfo('masterImageId', 'Identity', null, False, false, false),
            new PropertyInfo('filename', 'string', null, False, false, false),
            new PropertyInfo('relationType', 'string', null, False, false, false),
            new PropertyInfo('sort', 'int', null, False, false, false),
        );
    }
}

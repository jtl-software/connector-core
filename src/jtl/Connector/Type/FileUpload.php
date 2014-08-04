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
class FileUpload extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('id', 'Identity', null, false, true, false),
            new PropertyInfo('productId', 'Identity', null, false, true, false),
            new PropertyInfo('description', 'string', null, false, false, false),
            new PropertyInfo('fileType', 'string', null, false, false, false),
            new PropertyInfo('isRequired', 'bool', null, false, false, false),
            new PropertyInfo('name', 'string', null, false, false, false),
        );
    }
}

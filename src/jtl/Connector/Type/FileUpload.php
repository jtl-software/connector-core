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
class FileUpload extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('id', 'Identity', null, False, false, false),
            new PropertyInfo('productId', 'Identity', null, False, false, false),
            new PropertyInfo('description', 'string', null, False, false, false),
            new PropertyInfo('fileType', 'string', null, False, false, false),
            new PropertyInfo('isRequired', 'bool', null, False, false, false),
            new PropertyInfo('name', 'string', null, False, false, false),
        );
    }
}

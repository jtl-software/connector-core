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
class MediaFile extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('productId', 'Identity', null, false, true, false),
            new PropertyInfo('mediaFileCategory', 'string', '', false, false, false),
            new PropertyInfo('path', 'string', '', false, false, false),
            new PropertyInfo('sort', 'string', '', false, false, false),
            new PropertyInfo('type', 'string', '', false, false, false),
            new PropertyInfo('url', 'string', '', false, false, false),
        );
    }

    public function isMain()
    {
        return false;
    }
}

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
class ProductFileDownload extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('fileDownloadId', 'int', null, true, true, false),
            new PropertyInfo('productId', 'int', null, true, true, false),
        );
    }
}

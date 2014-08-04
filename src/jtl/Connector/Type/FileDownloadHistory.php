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
class FileDownloadHistory extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('customerId', 'Identity', null, false, true, false),
            new PropertyInfo('customerOrderId', 'Identity', null, false, true, false),
            new PropertyInfo('fileDownloadId', 'Identity', null, false, true, false),
            new PropertyInfo('id', 'Identity', null, false, true, false),
            new PropertyInfo('created', 'DateTime', null, false, false, false),
        );
    }
}

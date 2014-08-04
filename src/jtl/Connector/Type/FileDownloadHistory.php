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
class FileDownloadHistory extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('customerId', 'Identity', null, False, false, false),
            new PropertyInfo('customerOrderId', 'Identity', null, False, false, false),
            new PropertyInfo('fileDownloadId', 'Identity', null, False, false, false),
            new PropertyInfo('id', 'Identity', null, False, false, false),
            new PropertyInfo('created', 'string', null, False, false, false),
        );
    }
}

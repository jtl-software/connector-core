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
class Shipment extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('carrierName', 'string', null, false, false, false),
            new PropertyInfo('created', 'DateTime', null, false, false, false),
            new PropertyInfo('deliveryNoteId', 'int', null, false, true, false),
            new PropertyInfo('id', 'int', null, true, true, false),
            new PropertyInfo('identCode', 'string', null, false, false, false),
            new PropertyInfo('note', 'string', null, false, false, false),
            new PropertyInfo('trackingURL', 'string', null, false, false, false),
        );
    }
}

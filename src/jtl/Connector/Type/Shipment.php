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
class Shipment extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('deliveryNoteId', 'Identity', null, False, false, false),
            new PropertyInfo('id', 'Identity', null, True, false, false),
            new PropertyInfo('carrierName', 'string', null, False, false, false),
            new PropertyInfo('created', 'string', null, False, false, false),
            new PropertyInfo('identCode', 'string', null, False, false, false),
            new PropertyInfo('note', 'string', null, False, false, false),
            new PropertyInfo('trackingURL', 'string', null, False, false, false),
        );
    }
}

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
class DeliveryNote extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('customerOrderId', 'Identity', null, false, true, false),
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('created', 'DateTime', null, false, false, false),
            new PropertyInfo('isFulfillment', 'bool', null, false, false, false),
            new PropertyInfo('note', 'string', null, false, false, false),
            new PropertyInfo('status', 'int', null, false, false, false),
            new PropertyInfo('items', '\jtl\Connector\Model\DeliveryNoteItem', null, false, false, true),
        );
    }
}

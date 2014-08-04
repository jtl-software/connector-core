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
class DeliveryNote extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('customerOrderId', 'Identity', null, False, false, false),
            new PropertyInfo('id', 'Identity', null, True, false, false),
            new PropertyInfo('created', 'string', null, False, false, false),
            new PropertyInfo('isFulfillment', 'bool', null, False, false, false),
            new PropertyInfo('note', 'string', null, False, false, false),
            new PropertyInfo('status', 'int', null, False, false, false),
            new PropertyInfo('items', '\jtl\Connector\Model\DeliveryNoteItem', null, false, false, true),
        );
    }
}

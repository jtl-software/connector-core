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
class DeliveryNoteItem extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('customerOrderItemId', 'Identity', null, false, true, false),
            new PropertyInfo('deliveryNoteId', 'Identity', null, false, true, false),
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('warehouseId', 'Identity', null, false, true, false),
            new PropertyInfo('batchNumber', 'string', null, false, false, false),
            new PropertyInfo('bestBefore', 'DateTime', null, false, false, false),
            new PropertyInfo('quantity', 'double', null, false, false, false),
            new PropertyInfo('serialNumber', 'string', null, false, false, false),
        );
    }
}

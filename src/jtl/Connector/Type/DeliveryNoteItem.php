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
class DeliveryNoteItem extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('customerOrderItemId', 'Identity', null, False, false, false),
            new PropertyInfo('deliveryNoteId', 'Identity', null, False, false, false),
            new PropertyInfo('id', 'Identity', null, True, false, false),
            new PropertyInfo('warehouseId', 'Identity', null, False, false, false),
            new PropertyInfo('batchNumber', 'string', null, False, false, false),
            new PropertyInfo('bestBefore', 'string', null, False, false, false),
            new PropertyInfo('quantity', 'double', null, False, false, false),
            new PropertyInfo('serialNumber', 'string', null, False, false, false),
        );
    }
}

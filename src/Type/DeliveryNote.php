<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package Jtl\Connector\Core\Type
 */

namespace Jtl\Connector\Core\Type;

use Jtl\Connector\Core\Type\PropertyInfo;

/**
 * @access public
 * @package Jtl\Connector\Core\Type
 */
class DeliveryNote extends AbstractDataType
{
    protected function loadProperties()
    {
        return [
            new PropertyInfo('customerOrderId', 'Identity', null, false, true, false),
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('creationDate', 'DateTime', null, false, false, false),
            new PropertyInfo('isFulfillment', 'boolean', false, false, false, false),
            new PropertyInfo('note', 'string', '', false, false, false),
            new PropertyInfo('items', 'Jtl\Connector\Core\Model\DeliveryNoteItem', null, false, false, true),
            new PropertyInfo('trackingLists', 'Jtl\Connector\Core\Model\DeliveryNoteTrackingList', null, false, false, true),
        ];
    }

    public function isMain()
    {
        return true;
    }
}

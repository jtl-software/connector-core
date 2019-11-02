<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package Jtl\Connector\Core\Type
 */

namespace Jtl\Connector\Core\Type;

use \Jtl\Connector\Core\Type\PropertyInfo;

/**
 * @access public
 * @package Jtl\Connector\Core\Type
 */
class DeliveryNoteItem extends DataType
{
    protected function loadProperties()
    {
        return [
            new PropertyInfo('customerOrderItemId', 'Identity', null, false, true, false),
            new PropertyInfo('productId', 'Identity', null, false, true, false),
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('quantity', 'double', 0.0, false, false, false),
            new PropertyInfo('info', 'Jtl\Connector\Core\Model\DeliveryNoteItemInfo', null, false, false, true),
        ];
    }

    public function isMain()
    {
        return false;
    }
}

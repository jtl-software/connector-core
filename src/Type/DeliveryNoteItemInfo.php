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
class DeliveryNoteItemInfo extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('batch', 'string', '', false, false, false),
            new PropertyInfo('bestBefore', 'DateTime', null, false, false, false),
            new PropertyInfo('quantity', 'double', 0.0, false, false, false),
            new PropertyInfo('warehouseId', 'integer', 0, false, false, false),
        );
    }

    public function isMain()
    {
        return false;
    }
}

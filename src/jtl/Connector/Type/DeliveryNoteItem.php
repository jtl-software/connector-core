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
			new PropertyInfo('customerOrderItemId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('deliveryNoteId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('cHinweis', 'string', '', false, false, false),
			new PropertyInfo('quantity', 'float', 0.0, false, false, false),
        );
    }
}

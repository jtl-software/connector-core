<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Type
 */

namespace jtl\Connector\Type;

use jtl\Connector\Type\PropertyInfo;

/**
 * @access public
 * @package jtl\Connector\Type
 */
class Product extends DataType
{
    protected function loadProperties()
    {
        return array(
			new PropertyInfo('customerOrderId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('cLieferscheinNr', 'string', '', false, false, false),
			new PropertyInfo('created', '\jtl\Connector\Model\DateTime', null, false, false, false),
			new PropertyInfo('dGedruckt', '\jtl\Connector\Model\DateTime', null, false, false, false),
			new PropertyInfo('dMailVersand', '\jtl\Connector\Model\DateTime', null, false, false, false),
			new PropertyInfo('isFulfillment', 'boolean', false, false, false, false),
			new PropertyInfo('items', '\jtl\Connector\Model\DeliveryNoteItem', null, false, false, true),
			new PropertyInfo('kBenutzer', 'integer', 0, false, false, false),
			new PropertyInfo('kLieferantenBestellung', 'integer', 0, false, false, false),
			new PropertyInfo('note', 'string', '', false, false, false),
        );
    }
}

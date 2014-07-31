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
class Shipment extends DataType
{
    protected function loadProperties()
    {
        return array(
			new PropertyInfo('deliveryNoteId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('cFulfillmentCenter', 'string', '', false, false, false),
			new PropertyInfo('created', '\jtl\Connector\Model\DateTime', null, false, false, false),
			new PropertyInfo('dAnkunftszeit', '\jtl\Connector\Model\DateTime', null, false, false, false),
			new PropertyInfo('dVersendet', '\jtl\Connector\Model\DateTime', null, false, false, false),
			new PropertyInfo('fGewicht', 'float', 0.0, false, false, false),
			new PropertyInfo('identCode', 'string', '', false, false, false),
			new PropertyInfo('kBenutzer', 'integer', 0, false, false, false),
			new PropertyInfo('kLogistik', 'integer', 0, false, false, false),
			new PropertyInfo('kVersandArt', 'integer', 0, false, false, false),
			new PropertyInfo('logistic', 'string', '', false, false, false),
			new PropertyInfo('note', 'string', '', false, false, false),
			new PropertyInfo('nVerpackZeitSek', 'integer', 0, false, false, false),
        );
    }
}

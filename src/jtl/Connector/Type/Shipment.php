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
class Shipment extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'D80BDE14' => new PropertyInfo('deliveryNoteId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'827BC620' => new PropertyInfo('cFulfillmentCenter', 'string', '', false, false, false),
			'E92960DA' => new PropertyInfo('created', '\jtl\Connector\Model\DateTime', null, false, false, false),
			'3F203A85' => new PropertyInfo('dAnkunftszeit', '\jtl\Connector\Model\DateTime', null, false, false, false),
			'E652EA0B' => new PropertyInfo('dVersendet', '\jtl\Connector\Model\DateTime', null, false, false, false),
			'7CBBD78E' => new PropertyInfo('fGewicht', 'float', 0.0, false, false, false),
			'3EAFA72B' => new PropertyInfo('identCode', 'string', '', false, false, false),
			'B42020A1' => new PropertyInfo('kBenutzer', 'integer', 0, false, false, false),
			'FEF8B8A4' => new PropertyInfo('kLogistik', 'integer', 0, false, false, false),
			'7808AB6E' => new PropertyInfo('kVersandArt', 'integer', 0, false, false, false),
			'0D44DD4D' => new PropertyInfo('logistic', 'string', '', false, false, false),
			'4BDC0308' => new PropertyInfo('note', 'string', '', false, false, false),
			'50F5D3D7' => new PropertyInfo('nVerpackZeitSek', 'integer', 0, false, false, false),
        );
    }
}



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
class DeliveryNote extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'EB8CC998' => new PropertyInfo('customerOrderId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'03D9BB08' => new PropertyInfo('cLieferscheinNr', 'string', '', false, false, false),
			'E92960DA' => new PropertyInfo('created', '\jtl\Connector\Model\DateTime', null, false, false, false),
			'5ABBA2D4' => new PropertyInfo('dGedruckt', '\jtl\Connector\Model\DateTime', null, false, false, false),
			'DB6D5A18' => new PropertyInfo('dMailVersand', '\jtl\Connector\Model\DateTime', null, false, false, false),
			'DB89FF29' => new PropertyInfo('isFulfillment', 'boolean', false, false, false, false),
			'B42020A1' => new PropertyInfo('kBenutzer', 'integer', 0, false, false, false),
			'9D34D053' => new PropertyInfo('kLieferantenBestellung', 'integer', 0, false, false, false),
			'4BDC0308' => new PropertyInfo('note', 'string', '', false, false, false),
        );
    }
}



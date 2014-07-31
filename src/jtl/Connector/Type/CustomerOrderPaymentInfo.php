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
class CustomerOrderPaymentInfo extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'EB8CC998' => new PropertyInfo('customerOrderId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'CDE6B7C7' => new PropertyInfo('id', '\jtl\Connector\Model\Identity', null, true, true, true),
			'E7DF8FF7' => new PropertyInfo('platformId', '\jtl\Connector\Model\Identity', null, true, true, true),
			'11405928' => new PropertyInfo('accountHolder', 'string', '', false, false, false),
			'37AE1298' => new PropertyInfo('accountNumber', 'string', '', false, false, false),
			'2D9B0623' => new PropertyInfo('bankAccount', 'string', '', false, false, false),
			'B9E3A6DF' => new PropertyInfo('bankCode', 'string', '', false, false, false),
			'A7B9B6AA' => new PropertyInfo('cBIC', 'string', '', false, false, false),
			'344688CD' => new PropertyInfo('cIBAN', 'string', '', false, false, false),
			'4EC55DD0' => new PropertyInfo('creditCardNumber', 'string', '', false, false, false),
			'DD8CEC39' => new PropertyInfo('cvv', 'string', '', false, false, false),
        );
    }
}



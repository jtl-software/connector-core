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
			new PropertyInfo('id', '\jtl\Connector\Model\IdentityKeyPair', null, true, true, false),
			new PropertyInfo('platformId', '\jtl\Connector\Model\IdentityKeyPair', null, true, true, false),
			new PropertyInfo('accountHolder', 'string', '', false, false, false),
			new PropertyInfo('accountNumber', 'string', '', false, false, false),
			new PropertyInfo('bankAccount', 'string', '', false, false, false),
			new PropertyInfo('bankCode', 'string', '', false, false, false),
			new PropertyInfo('cBIC', 'string', '', false, false, false),
			new PropertyInfo('cIBAN', 'string', '', false, false, false),
			new PropertyInfo('creditCardNumber', 'string', '', false, false, false),
			new PropertyInfo('cvv', 'string', '', false, false, false),
        );
    }
}

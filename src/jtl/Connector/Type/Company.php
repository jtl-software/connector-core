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
			new PropertyInfo('id', '\jtl\Connector\Model\IdentityKeyPair', null, true, true, false),
			new PropertyInfo('accountHolder', 'string', '', false, false, false),
			new PropertyInfo('accountNumber', 'string', '', false, false, false),
			new PropertyInfo('bankCode', 'string', '', false, false, false),
			new PropertyInfo('bankName', 'string', '', false, false, false),
			new PropertyInfo('bic', 'string', '', false, false, false),
			new PropertyInfo('businessman', 'string', '', false, false, false),
			new PropertyInfo('city', 'string', '', false, false, false),
			new PropertyInfo('countryIso', 'string', '', false, false, false),
			new PropertyInfo('eMail', 'string', '', false, false, false),
			new PropertyInfo('fax', 'string', '', false, false, false),
			new PropertyInfo('flagUpdate', 'boolean', false, false, false, false),
			new PropertyInfo('footer', 'string', '', false, false, false),
			new PropertyInfo('headerLogo', 'string', '', false, false, false),
			new PropertyInfo('iban', 'string', '', false, false, false),
			new PropertyInfo('intrashipNumber', 'string', '', false, false, false),
			new PropertyInfo('isActive', 'boolean', false, false, false, false),
			new PropertyInfo('name', 'string', '', false, false, false),
			new PropertyInfo('phone', 'string', '', false, false, false),
			new PropertyInfo('street', 'string', '', false, false, false),
			new PropertyInfo('taxIdNumber', 'string', '', false, false, false),
			new PropertyInfo('upsNumber', 'string', '', false, false, false),
			new PropertyInfo('vatNumber', 'string', '', false, false, false),
			new PropertyInfo('www', 'string', '', false, false, false),
			new PropertyInfo('zipCode', 'string', '', false, false, false),
        );
    }
}

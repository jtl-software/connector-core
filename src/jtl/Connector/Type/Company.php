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
class Company extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('accountHolder', 'string', null, false, false, false),
            new PropertyInfo('accountNumber', 'string', null, false, false, false),
            new PropertyInfo('bankCode', 'string', null, false, false, false),
            new PropertyInfo('bankName', 'string', null, false, false, false),
            new PropertyInfo('bic', 'string', null, false, false, false),
            new PropertyInfo('businessman', 'string', null, false, false, false),
            new PropertyInfo('city', 'string', null, false, false, false),
            new PropertyInfo('countryIso', 'string', null, false, false, false),
            new PropertyInfo('eMail', 'string', null, false, false, false),
            new PropertyInfo('fax', 'string', null, false, false, false),
            new PropertyInfo('iban', 'string', null, false, false, false),
            new PropertyInfo('id', 'int', null, true, true, false),
            new PropertyInfo('name', 'string', null, false, false, false),
            new PropertyInfo('phone', 'string', null, false, false, false),
            new PropertyInfo('street', 'string', null, false, false, false),
            new PropertyInfo('streetNumber', 'string', null, false, false, false),
            new PropertyInfo('taxIdNumber', 'string', null, false, false, false),
            new PropertyInfo('vatNumber', 'string', null, false, false, false),
            new PropertyInfo('websiteUrl', 'string', null, false, false, false),
            new PropertyInfo('zipCode', 'string', null, false, false, false),
        );
    }

	public function isMain()
	{
		return false;
	}
}

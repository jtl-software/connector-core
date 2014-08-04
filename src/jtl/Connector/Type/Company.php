<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
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
            new PropertyInfo('accountHolder', 'string', null, False, false, false),
            new PropertyInfo('accountNumber', 'string', null, False, false, false),
            new PropertyInfo('bankCode', 'string', null, False, false, false),
            new PropertyInfo('bankName', 'string', null, False, false, false),
            new PropertyInfo('bic', 'string', null, False, false, false),
            new PropertyInfo('businessman', 'string', null, False, false, false),
            new PropertyInfo('city', 'string', null, False, false, false),
            new PropertyInfo('countryIso', 'string', null, False, false, false),
            new PropertyInfo('eMail', 'string', null, False, false, false),
            new PropertyInfo('fax', 'string', null, False, false, false),
            new PropertyInfo('iban', 'string', null, False, false, false),
            new PropertyInfo('name', 'string', null, False, false, false),
            new PropertyInfo('phone', 'string', null, False, false, false),
            new PropertyInfo('street', 'string', null, False, false, false),
            new PropertyInfo('streetNumber', 'string', null, False, false, false),
            new PropertyInfo('taxIdNumber', 'string', null, False, false, false),
            new PropertyInfo('vatNumber', 'string', null, False, false, false),
            new PropertyInfo('www', 'string', null, False, false, false),
            new PropertyInfo('zipCode', 'string', null, False, false, false),
        );
    }
}

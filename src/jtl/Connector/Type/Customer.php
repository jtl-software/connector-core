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
class Customer extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('customerGroupId', 'Identity', null, false, true, false),
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('accountCredit', 'double', null, false, false, false),
            new PropertyInfo('birthday', 'string', null, false, false, false),
            new PropertyInfo('city', 'string', null, false, false, false),
            new PropertyInfo('company', 'string', null, false, false, false),
            new PropertyInfo('countryIso', 'string', null, false, false, false),
            new PropertyInfo('created', 'DateTime', null, false, false, false),
            new PropertyInfo('customerNumber', 'string', null, false, false, false),
            new PropertyInfo('deliveryInstruction', 'string', null, false, false, false),
            new PropertyInfo('discount', 'double', null, false, false, false),
            new PropertyInfo('eMail', 'string', null, false, false, false),
            new PropertyInfo('extraAddressLine', 'string', null, false, false, false),
            new PropertyInfo('fax', 'string', null, false, false, false),
            new PropertyInfo('firstName', 'string', null, false, false, false),
            new PropertyInfo('hasCustomerAccount', 'bool', null, false, false, false),
            new PropertyInfo('hasNewsletterSubscription', 'bool', null, false, false, false),
            new PropertyInfo('isActive', 'bool', null, false, false, false),
            new PropertyInfo('isFetched', 'bool', null, false, false, false),
            new PropertyInfo('lastName', 'string', null, false, false, false),
            new PropertyInfo('localeName', 'string', null, false, false, false),
            new PropertyInfo('mobile', 'string', null, false, false, false),
            new PropertyInfo('modified', 'DateTime', null, false, false, false),
            new PropertyInfo('origin', 'string', null, false, false, false),
            new PropertyInfo('password', 'string', null, false, false, false),
            new PropertyInfo('phone', 'string', null, false, false, false),
            new PropertyInfo('salutation', 'string', null, false, false, false),
            new PropertyInfo('state', 'string', null, false, false, false),
            new PropertyInfo('street', 'string', null, false, false, false),
            new PropertyInfo('title', 'string', null, false, false, false),
            new PropertyInfo('vatNumber', 'string', null, false, false, false),
            new PropertyInfo('www', 'string', null, false, false, false),
            new PropertyInfo('zipCode', 'string', null, false, false, false),
            new PropertyInfo('attributes', '\jtl\Connector\Model\CustomerAttr', null, false, false, true),
        );
    }
}

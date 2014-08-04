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
class CustomerOrderShippingAddress extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('customerId', 'Identity', null, False, false, false),
            new PropertyInfo('id', 'Identity', null, True, false, false),
            new PropertyInfo('city', 'string', null, False, false, false),
            new PropertyInfo('company', 'string', null, False, false, false),
            new PropertyInfo('countryIso', 'string', null, False, false, false),
            new PropertyInfo('deliveryInstruction', 'string', null, False, false, false),
            new PropertyInfo('eMail', 'string', null, False, false, false),
            new PropertyInfo('extraAddressLine', 'string', null, False, false, false),
            new PropertyInfo('fax', 'string', null, False, false, false),
            new PropertyInfo('firstName', 'string', null, False, false, false),
            new PropertyInfo('lastName', 'string', null, False, false, false),
            new PropertyInfo('mobile', 'string', null, False, false, false),
            new PropertyInfo('phone', 'string', null, False, false, false),
            new PropertyInfo('salutation', 'string', null, False, false, false),
            new PropertyInfo('state', 'string', null, False, false, false),
            new PropertyInfo('street', 'string', null, False, false, false),
            new PropertyInfo('title', 'string', null, False, false, false),
            new PropertyInfo('zipCode', 'string', null, False, false, false),
        );
    }
}

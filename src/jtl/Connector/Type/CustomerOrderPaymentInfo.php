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
class CustomerOrderPaymentInfo extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('customerOrderId', 'Identity', null, False, false, false),
            new PropertyInfo('id', 'Identity', null, True, false, false),
            new PropertyInfo('accountHolder', 'string', null, False, false, false),
            new PropertyInfo('accountNumber', 'string', null, False, false, false),
            new PropertyInfo('bankCode', 'string', null, False, false, false),
            new PropertyInfo('bankName', 'string', null, False, false, false),
            new PropertyInfo('bic', 'string', null, False, false, false),
            new PropertyInfo('creditCardExpiration', 'string', null, False, false, false),
            new PropertyInfo('creditCardHolder', 'string', null, False, false, false),
            new PropertyInfo('creditCardNumber', 'string', null, False, false, false),
            new PropertyInfo('creditCardType', 'string', null, False, false, false),
            new PropertyInfo('creditCardVerificationNumber', 'string', null, False, false, false),
            new PropertyInfo('iban', 'string', null, False, false, false),
        );
    }
}

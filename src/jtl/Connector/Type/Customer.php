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
class Customer extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'07ACA6A9' => new PropertyInfo('customerCategoryId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'C5988257' => new PropertyInfo('customerGroupId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'CDE6B7C7' => new PropertyInfo('id', '\jtl\Connector\Model\Identity', null, true, true, true),
			'8AEE0303' => new PropertyInfo('city', 'string', '', false, false, false),
			'4D421C18' => new PropertyInfo('company', 'string', '', false, false, false),
			'C012EFFD' => new PropertyInfo('countryIso', 'string', '', false, false, false),
			'E92960DA' => new PropertyInfo('created', '\jtl\Connector\Model\DateTime', null, false, false, false),
			'C22DECC9' => new PropertyInfo('customerNumber', 'string', '', false, false, false),
			'1CBC5660' => new PropertyInfo('deliveryInstruction', 'string', '', false, false, false),
			'4ACB38AA' => new PropertyInfo('discount', 'float', 0.0, false, false, false),
			'D491A6B2' => new PropertyInfo('eMail', 'string', '', false, false, false),
			'0107CF18' => new PropertyInfo('extraAddressLine', 'string', '', false, false, false),
			'F8598BBC' => new PropertyInfo('fax', 'string', '', false, false, false),
			'4428C467' => new PropertyInfo('firstName', 'string', '', false, false, false),
			'5BEEF940' => new PropertyInfo('hasNewsletterSubscription', 'boolean', false, false, false, false),
			'597AD442' => new PropertyInfo('isActive', 'boolean', false, false, false, false),
			'5FB1F040' => new PropertyInfo('languageId', 'integer', 0, false, false, false),
			'2C00DBD2' => new PropertyInfo('lastName', 'string', '', false, false, false),
			'72B21D25' => new PropertyInfo('mobile', 'string', '', false, false, false),
			'1D71031D' => new PropertyInfo('origin', 'string', '', false, false, false),
			'D2CEC0B0' => new PropertyInfo('phone', 'string', '', false, false, false),
			'BAFB8BED' => new PropertyInfo('salutation', 'string', '', false, false, false),
			'8A93A94D' => new PropertyInfo('state', 'string', '', false, false, false),
			'C102D438' => new PropertyInfo('street', 'string', '', false, false, false),
			'EC45BD8B' => new PropertyInfo('title', 'string', '', false, false, false),
			'54246844' => new PropertyInfo('vatNumber', 'string', '', false, false, false),
			'803360E0' => new PropertyInfo('www', 'string', '', false, false, false),
			'0D718804' => new PropertyInfo('zipCode', 'string', '', false, false, false),
        );
    }
}



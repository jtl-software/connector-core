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
class Company extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'CDE6B7C7' => new PropertyInfo('id', '\jtl\Connector\Model\Identity', null, true, true, true),
			'11405928' => new PropertyInfo('accountHolder', 'string', '', false, false, false),
			'37AE1298' => new PropertyInfo('accountNumber', 'string', '', false, false, false),
			'B9E3A6DF' => new PropertyInfo('bankCode', 'string', '', false, false, false),
			'71D0C04F' => new PropertyInfo('bankName', 'string', '', false, false, false),
			'200AD819' => new PropertyInfo('bic', 'string', '', false, false, false),
			'ABFF82B6' => new PropertyInfo('businessman', 'string', '', false, false, false),
			'8AEE0303' => new PropertyInfo('city', 'string', '', false, false, false),
			'C012EFFD' => new PropertyInfo('countryIso', 'string', '', false, false, false),
			'D491A6B2' => new PropertyInfo('eMail', 'string', '', false, false, false),
			'F8598BBC' => new PropertyInfo('fax', 'string', '', false, false, false),
			'3CE59533' => new PropertyInfo('flagUpdate', 'boolean', false, false, false, false),
			'43A7BD9A' => new PropertyInfo('footer', 'string', '', false, false, false),
			'76BEF09A' => new PropertyInfo('headerLogo', 'string', '', false, false, false),
			'5E1CEEEC' => new PropertyInfo('iban', 'string', '', false, false, false),
			'688999CC' => new PropertyInfo('intrashipNumber', 'string', '', false, false, false),
			'597AD442' => new PropertyInfo('isActive', 'boolean', false, false, false, false),
			'03BD1C7B' => new PropertyInfo('name', 'string', '', false, false, false),
			'D2CEC0B0' => new PropertyInfo('phone', 'string', '', false, false, false),
			'C102D438' => new PropertyInfo('street', 'string', '', false, false, false),
			'EBFE84C4' => new PropertyInfo('taxIdNumber', 'string', '', false, false, false),
			'C91C7821' => new PropertyInfo('upsNumber', 'string', '', false, false, false),
			'54246844' => new PropertyInfo('vatNumber', 'string', '', false, false, false),
			'803360E0' => new PropertyInfo('www', 'string', '', false, false, false),
			'0D718804' => new PropertyInfo('zipCode', 'string', '', false, false, false),
        );
    }
}



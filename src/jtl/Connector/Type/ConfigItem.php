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
class ConfigItem extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'EC5FEEFC' => new PropertyInfo('configGroupId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'46FFEF34' => new PropertyInfo('productId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'A71AADEF' => new PropertyInfo('fStandardpreis', 'float', 0.0, false, false, false),
			'B64B4BA6' => new PropertyInfo('ignoreMultiplier', 'integer', 0, false, false, false),
			'11262799' => new PropertyInfo('inheritProductName', 'integer', 0, false, false, false),
			'AB85A8CA' => new PropertyInfo('inheritProductPrice', 'integer', 0, false, false, false),
			'CCD533AE' => new PropertyInfo('initialQuantity', 'float', 0.0, false, false, false),
			'96452966' => new PropertyInfo('isPreSelected', 'integer', 0, false, false, false),
			'7266C9AD' => new PropertyInfo('isRecommended', 'integer', 0, false, false, false),
			'C4EEC23B' => new PropertyInfo('maxQuantity', 'float', 0.0, false, false, false),
			'93BA95C9' => new PropertyInfo('minQuantity', 'float', 0.0, false, false, false),
			'0245BD98' => new PropertyInfo('showDiscount', 'integer', 0, false, false, false),
			'588BAA96' => new PropertyInfo('showSurcharge', 'integer', 0, false, false, false),
			'484219DD' => new PropertyInfo('sort', 'integer', 0, false, false, false),
			'C15430A6' => new PropertyInfo('type', 'integer', 0, false, false, false),
        );
    }
}



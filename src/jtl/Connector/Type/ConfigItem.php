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
class ConfigItem extends DataType
{
    protected function loadProperties()
    {
        return array(
			new PropertyInfo('configGroupId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('productId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('fStandardpreis', 'float', 0.0, false, false, false),
			new PropertyInfo('i18n', '\jtl\Connector\Model\ConfigItemI18n', null, false, false, true),
			new PropertyInfo('ignoreMultiplier', 'integer', 0, false, false, false),
			new PropertyInfo('inheritProductName', 'integer', 0, false, false, false),
			new PropertyInfo('inheritProductPrice', 'integer', 0, false, false, false),
			new PropertyInfo('initialQuantity', 'float', 0.0, false, false, false),
			new PropertyInfo('isPreSelected', 'integer', 0, false, false, false),
			new PropertyInfo('isRecommended', 'integer', 0, false, false, false),
			new PropertyInfo('maxQuantity', 'float', 0.0, false, false, false),
			new PropertyInfo('minQuantity', 'float', 0.0, false, false, false),
			new PropertyInfo('prices', '\jtl\Connector\Model\ConfigItemPrice', null, false, false, true),
			new PropertyInfo('showDiscount', 'integer', 0, false, false, false),
			new PropertyInfo('showSurcharge', 'integer', 0, false, false, false),
			new PropertyInfo('sort', 'integer', 0, false, false, false),
			new PropertyInfo('type', 'integer', 0, false, false, false),
        );
    }
}

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
            new PropertyInfo('configGroupId', 'string', '', false, false, false),
            new PropertyInfo('id', 'string', '', false, false, false),
            new PropertyInfo('ignoreMultiplier', 'string', '', false, false, false),
            new PropertyInfo('inheritProductName', 'string', '', false, false, false),
            new PropertyInfo('inheritProductPrice', 'string', '', false, false, false),
            new PropertyInfo('initialQuantity', 'double', 0.0, false, false, false),
            new PropertyInfo('isPreSelected', 'string', '', false, false, false),
            new PropertyInfo('isRecommended', 'string', '', false, false, false),
            new PropertyInfo('maxQuantity', 'double', 0.0, false, false, false),
            new PropertyInfo('minQuantity', 'double', 0.0, false, false, false),
            new PropertyInfo('productId', 'string', '', false, false, false),
            new PropertyInfo('showDiscount', 'string', '', false, false, false),
            new PropertyInfo('showSurcharge', 'string', '', false, false, false),
            new PropertyInfo('sort', 'string', '', false, false, false),
            new PropertyInfo('type', 'string', '', false, false, false),
            new PropertyInfo('i18ns', '\jtl\Connector\Model\ConfigItemI18n', null, false, false, true),
            new PropertyInfo('prices', '\jtl\Connector\Model\ConfigItemPrice', null, false, false, true),
		);
    }

	public function isMain()
	{
		return false;
	}
}

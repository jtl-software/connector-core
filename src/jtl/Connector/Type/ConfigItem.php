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
            new PropertyInfo('configGroupId', 'int', null, false, true, false),
            new PropertyInfo('id', 'int', null, true, true, false),
            new PropertyInfo('ignoreMultiplier', 'bool', null, false, false, false),
            new PropertyInfo('inheritProductName', 'bool', null, false, false, false),
            new PropertyInfo('inheritProductPrice', 'bool', null, false, false, false),
            new PropertyInfo('initialQuantity', 'double', null, false, false, false),
            new PropertyInfo('isPreSelected', 'bool', null, false, false, false),
            new PropertyInfo('isRecommended', 'bool', null, false, false, false),
            new PropertyInfo('maxQuantity', 'double', null, false, false, false),
            new PropertyInfo('minQuantity', 'double', null, false, false, false),
            new PropertyInfo('productId', 'int', null, false, true, false),
            new PropertyInfo('showDiscount', 'bool', null, false, false, false),
            new PropertyInfo('showSurcharge', 'bool', null, false, false, false),
            new PropertyInfo('sort', 'int', null, false, false, false),
            new PropertyInfo('type', 'int', null, false, false, false),
            new PropertyInfo('vat', 'double', null, false, false, false),
            new PropertyInfo('prices', '\jtl\Connector\Model\ConfigItemPrice', null, false, false, true),
            new PropertyInfo('i18n', '\jtl\Connector\Model\ConfigItemI18n', null, false, false, true),
        );
    }

	public function isMain()
	{
		return false;
	}
}

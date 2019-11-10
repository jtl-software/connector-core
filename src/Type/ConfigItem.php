<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package Jtl\Connector\Core\Type
 */

namespace Jtl\Connector\Core\Type;

use Jtl\Connector\Core\Type\PropertyInfo;

/**
 * @access public
 * @package Jtl\Connector\Core\Type
 */
class ConfigItem extends AbstractDataType
{
    protected function loadProperties()
    {
        return [
            new PropertyInfo('configGroupId', 'Identity', null, false, true, false),
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('productId', 'Identity', null, false, true, false),
            new PropertyInfo('ignoreMultiplier', 'integer', 0, false, false, false),
            new PropertyInfo('inheritProductName', 'boolean', false, false, false, false),
            new PropertyInfo('inheritProductPrice', 'boolean', false, false, false, false),
            new PropertyInfo('initialQuantity', 'double', 0.0, false, false, false),
            new PropertyInfo('isPreSelected', 'boolean', false, false, false, false),
            new PropertyInfo('isRecommended', 'boolean', false, false, false, false),
            new PropertyInfo('maxQuantity', 'double', 0.0, false, false, false),
            new PropertyInfo('minQuantity', 'double', 0.0, false, false, false),
            new PropertyInfo('showDiscount', 'boolean', false, false, false, false),
            new PropertyInfo('showSurcharge', 'boolean', false, false, false, false),
            new PropertyInfo('sort', 'integer', 0, false, false, false),
            new PropertyInfo('type', 'integer', 0, false, false, false),
            new PropertyInfo('i18ns', 'Jtl\Connector\Core\Model\ConfigItemI18n', null, false, false, true),
            new PropertyInfo('prices', 'Jtl\Connector\Core\Model\ConfigItemPrice', null, false, false, true),
        ];
    }

    public function isMain()
    {
        return false;
    }
}

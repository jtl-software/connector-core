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
class ConfigItem extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('configGroupId', 'Identity', null, False, false, false),
            new PropertyInfo('id', 'Identity', null, False, false, false),
            new PropertyInfo('productId', 'Identity', null, False, false, false),
            new PropertyInfo('ignoreMultiplier', 'bool', null, False, false, false),
            new PropertyInfo('inheritProductName', 'bool', null, False, false, false),
            new PropertyInfo('inheritProductPrice', 'bool', null, False, false, false),
            new PropertyInfo('initialQuantity', 'double', null, False, false, false),
            new PropertyInfo('isPreSelected', 'bool', null, False, false, false),
            new PropertyInfo('isRecommended', 'bool', null, False, false, false),
            new PropertyInfo('maxQuantity', 'double', null, False, false, false),
            new PropertyInfo('minQuantity', 'double', null, False, false, false),
            new PropertyInfo('showDiscount', 'bool', null, False, false, false),
            new PropertyInfo('showSurcharge', 'bool', null, False, false, false),
            new PropertyInfo('sort', 'int', null, False, false, false),
            new PropertyInfo('type', 'int', null, False, false, false),
            new PropertyInfo('vat', 'double', null, False, false, false),
            new PropertyInfo('prices', '\jtl\Connector\Model\ConfigItemPrice', null, false, false, true),
            new PropertyInfo('i18n', '\jtl\Connector\Model\ConfigItemI18n', null, false, false, true),
        );
    }
}
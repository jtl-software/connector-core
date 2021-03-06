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
class ProductI18n extends AbstractDataType
{
    protected function loadProperties()
    {
        return [
            new PropertyInfo('deliveryStatus', 'string', '', false, false, false),
            new PropertyInfo('description', 'string', '', false, false, false),
            new PropertyInfo('measurementUnitName', 'string', '', false, false, false),
            new PropertyInfo('metaDescription', 'string', '', false, false, false),
            new PropertyInfo('metaKeywords', 'string', '', false, false, false),
            new PropertyInfo('name', 'string', '', false, false, false),
            new PropertyInfo('shortDescription', 'string', '', false, false, false),
            new PropertyInfo('titleTag', 'string', '', false, false, false),
            new PropertyInfo('unitName', 'string', '', false, false, false),
            new PropertyInfo('urlPath', 'string', '', false, false, false),
            new PropertyInfo('languageIso', 'string', '', false, false, false)
        ];
    }

    public function isMain()
    {
        return false;
    }
}

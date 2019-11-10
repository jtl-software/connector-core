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
class ProductVarCombination extends AbstractDataType
{
    protected function loadProperties()
    {
        return [
            new PropertyInfo('productVariationId', 'Identity', null, true, true, false),
            new PropertyInfo('productVariationValueId', 'Identity', null, false, true, false),
        ];
    }

    public function isMain()
    {
        return false;
    }
}

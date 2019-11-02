<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package Jtl\Connector\Core\Type
 */

namespace Jtl\Connector\Core\Type;

use \Jtl\Connector\Core\Type\PropertyInfo;

/**
 * @access public
 * @package Jtl\Connector\Core\Type
 */
class GlobalData extends DataType
{
    protected function loadProperties()
    {
        return [
            new PropertyInfo('configGroups', 'Jtl\Connector\Core\Model\ConfigGroup', null, false, false, true),
            new PropertyInfo('configItems', 'Jtl\Connector\Core\Model\ConfigItem', null, false, false, true),
            new PropertyInfo('crossSellingGroups', 'Jtl\Connector\Core\Model\CrossSellingGroup', null, false, false, true),
            new PropertyInfo('currencies', 'Jtl\Connector\Core\Model\Currency', null, false, false, true),
            new PropertyInfo('customerGroups', 'Jtl\Connector\Core\Model\CustomerGroup', null, false, false, true),
            new PropertyInfo('languages', 'Jtl\Connector\Core\Model\Language', null, false, false, true),
            new PropertyInfo('measurementUnits', 'Jtl\Connector\Core\Model\MeasurementUnit', null, false, false, true),
            new PropertyInfo('productTypes', 'Jtl\Connector\Core\Model\ProductType', null, false, false, true),
            new PropertyInfo('shippingClasses', 'Jtl\Connector\Core\Model\ShippingClass', null, false, false, true),
            new PropertyInfo('shippingMethods', 'Jtl\Connector\Core\Model\ShippingMethod', null, false, false, true),
            new PropertyInfo('taxRates', 'Jtl\Connector\Core\Model\TaxRate', null, false, false, true),
            new PropertyInfo('units', 'Jtl\Connector\Core\Model\Unit', null, false, false, true),
            new PropertyInfo('warehouses', 'Jtl\Connector\Core\Model\Warehouse', null, false, false, true),
        ];
    }

    public function isMain()
    {
        return true;
    }
}

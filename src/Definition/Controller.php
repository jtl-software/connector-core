<?php

namespace Jtl\Connector\Core\Definition;

final class Controller
{
    const CATEGORY = 'Category';
    const CONNECTOR = 'Connector';
    const CROSSSELLING = 'CrossSelling';
    const CUSTOMER = 'Customer';
    const CUSTOMER_ORDER = 'CustomerOrder';
    const DELIVERY_NOTE = 'DeliveryNote';
    const GLOBAL_DATA = 'GlobalData';
    const IMAGE = 'Image';
    const MANUFACTURER = 'Manufacturer';
    const PAYMENT = 'Payment';
    const PRODUCT = 'Product';
    const PRODUCT_PRICE = 'ProductPrice';
    const PRODUCT_STOCK_LEVEL = 'ProductStockLevel';
    const SPECIFIC = 'Specific';
    const STATUS_CHANGE = 'StatusChange';

    const LINKER = 'Linker';

    /**
     * @var string[]|null
     */
    protected static $controllers = null;

    /**
     * @return integer[]
     * @throws \ReflectionException
     */
    public static function getControllers(): array
    {
        if (is_null(self::$controllers)) {
            self::$controllers = (new \ReflectionClass(self::class))->getConstants();
        }

        return self::$controllers;
    }

    /**
     * @param integer $controllerName
     * @return boolean
     * @throws \ReflectionException
     */
    public static function isController(string $controllerName): bool
    {
        return in_array($controllerName, self::getControllers(), true);
    }
}

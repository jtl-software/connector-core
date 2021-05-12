<?php

namespace Jtl\Connector\Core\Definition;

final class Controller
{
    public const
        CATEGORY = 'Category',
        CONNECTOR = 'Connector',
        CROSSSELLING = 'CrossSelling',
        CUSTOMER = 'Customer',
        CUSTOMER_ORDER = 'CustomerOrder',
        DELIVERY_NOTE = 'DeliveryNote',
        GLOBAL_DATA = 'GlobalData',
        IMAGE = 'Image',
        MANUFACTURER = 'Manufacturer',
        PAYMENT = 'Payment',
        PRODUCT = 'Product',
        PRODUCT_PRICE = 'ProductPrice',
        PRODUCT_STOCK_LEVEL = 'ProductStockLevel',
        SPECIFIC = 'Specific',
        STATUS_CHANGE = 'StatusChange';

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

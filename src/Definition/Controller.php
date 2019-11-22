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


    /**
     * @return integer[]
     * @throws \ReflectionException
     */
    public static function getControllers(): array
    {
        if(is_null(static::$types)) {
            $reflection = new \ReflectionClass(static::class);
            static::$types = $reflection->getConstants();
        }

        return static::$types;
    }

    /**
     * @param integer $controllerName
     * @return boolean
     * @throws \ReflectionException
     */
    public static function isController(int $controllerName): bool
    {
        return in_array($controllerName, self::getControllers());
    }
}
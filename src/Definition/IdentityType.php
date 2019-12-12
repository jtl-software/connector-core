<?php

namespace Jtl\Connector\Core\Definition;

class IdentityType
{
    const CATEGORY = 1;
    const CUSTOMER = 2;
    const CUSTOMER_ORDER = 4;
    const DELIVERY_NOTE = 8;
    const MANUFACTURER = 32;
    const PRODUCT = 64;
    const SPECIFIC = 128;
    const SPECIFIC_VALUE = 256;
    const PAYMENT = 512;
    const CROSSSELLING = 1024;
    const CROSSSELLING_GROUP = 2048;
    const SHIPPING_CLASS = 4096;
    const CONFIG_GROUP = 6;
    const CONFIG_ITEM = 10;
    const CURRENCY = 12;
    const CUSTOMER_GROUP = 14;
    const LANGUAGE = 18;
    const UNIT = 20;
    const MEASUREMENT_UNIT = 22;
    const PRODUCT_TYPE = 24;
    const SHIPPING_METHOD = 26;
    const TAX_RATE = 28;
    const WAREHOUSE = 30;
    const CATEGORY_ATTRIBUTE = 34;
    const PRODUCT_ATTRIBUTE = 36;
    const PRODUCT_VARIATION = 38;
    const PRODUCT_VARIATION_VALUE = 40;
    const PRODUCT_IMAGE = 42;
    const CATEGORY_IMAGE = 44;
    const MANUFACTURER_IMAGE = 46;
    const PRODUCT_VARIATION_VALUE_IMAGE = 48;
    const SPECIFIC_IMAGE = 50;
    const SPECIFIC_VALUE_IMAGE = 52;
    const CONFIG_GROUP_IMAGE = 54;
    const PRODUCT_WAREHOUSE_INFO = 56;
    const PRODUCT_STOCK_LEVEL = 58;
    const PRODUCT_TO_CATEGORY = 60;
    const PRODUCT_PRICE = 62;
    const PRODUCT_SPECIFIC = 66;
    const CUSTOMER_ORDER_ITEM = 68;

    protected static $types = null;

    /**
     * @return integer[]
     * @throws \ReflectionException
     */
    public static function getTypes(): array
    {
        if (is_null(self::$types)) {
            self::$types = (new \ReflectionClass(self::class))->getConstants();
        }

        return self::$types;
    }

    /**
     * @param integer $type
     * @return boolean
     * @throws \ReflectionException
     */
    public static function isType(int $type): bool
    {
        return in_array($type, self::getTypes(), true);
    }
}

<?php
namespace Jtl\Connector\Core\Definition;

class IdentityType
{
    const CATEGORY = 1;
    const CUSTOMER = 2;
    const CUSTOMER_ORDER = 4;
    const DELIVERY_NOTE = 8;
    const IMAGE = 16;
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

    /**
     * @var string[]
     */
    protected static $types = [
        self::CATEGORY,
        self::CUSTOMER,
        self::CUSTOMER_ORDER,
        self::DELIVERY_NOTE,
        self::IMAGE,
        self::MANUFACTURER,
        self::PRODUCT,
        self::SPECIFIC,
        self::SPECIFIC_VALUE,
        self::PAYMENT,
        self::CROSSSELLING,
        self::CROSSSELLING_GROUP,
        self::SHIPPING_CLASS,
        self::CONFIG_GROUP,
        self::CONFIG_ITEM,
        self::CURRENCY,
        self::CUSTOMER_GROUP,
        self::LANGUAGE,
        self::UNIT,
        self::MEASUREMENT_UNIT,
        self::PRODUCT_TYPE,
        self::SHIPPING_METHOD,
        self::TAX_RATE,
        self::WAREHOUSE,
        self::CATEGORY_ATTRIBUTE,
        self::PRODUCT_ATTRIBUTE,
        self::PRODUCT_VARIATION,
        self::PRODUCT_VARIATION_VALUE,
        self::PRODUCT_IMAGE,
        self::CATEGORY_IMAGE,
        self::MANUFACTURER_IMAGE,
        self::PRODUCT_VARIATION_VALUE_IMAGE,
        self::SPECIFIC_IMAGE,
        self::SPECIFIC_VALUE_IMAGE,
        self::CONFIG_GROUP_IMAGE,
    ];

    /**
     * @return array
     */
    public static function getTypes(): array
    {
        return self::$types;
    }

    /**
     * @param int $type
     * @return boolean
     */
    public static function isType(int $type): bool
    {
        return in_array($type, self::$types);
    }
}
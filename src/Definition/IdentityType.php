<?php
namespace Jtl\Connector\Core\Definition;

class IdentityType
{
    const TYPE_CATEGORY = 1;
    const TYPE_CUSTOMER = 2;
    const TYPE_CUSTOMER_ORDER = 4;
    const TYPE_DELIVERY_NOTE = 8;
    const TYPE_IMAGE = 16;
    const TYPE_MANUFACTURER = 32;
    const TYPE_PRODUCT = 64;
    const TYPE_SPECIFIC = 128;
    const TYPE_SPECIFIC_VALUE = 256;
    const TYPE_PAYMENT = 512;
    const TYPE_CROSSSELLING = 1024;
    const TYPE_CROSSSELLING_GROUP = 2048;
    const TYPE_SHIPPING_CLASS = 4096;
    const TYPE_CONFIG_GROUP = 6;
    const TYPE_CONFIG_ITEM = 10;
    const TYPE_CURRENCY = 12;
    const TYPE_CUSTOMER_GROUP = 14;
    const TYPE_LANGUAGE = 18;
    const TYPE_UNIT = 20;
    const TYPE_MEASUREMENT_UNIT = 22;
    const TYPE_PRODUCT_TYPE = 24;
    const TYPE_SHIPPING_METHOD = 26;
    const TYPE_TAX_RATE = 28;
    const TYPE_WAREHOUSE = 30;
    const TYPE_CATEGORY_ATTRIBUTE = 34;
    const TYPE_PRODUCT_ATTRIBUTE = 36;
    const TYPE_PRODUCT_VARIATION = 38;
    const TYPE_PRODUCT_VARIATION_VALUE = 40;

    /**
     * @var string[]
     */
    protected static $types = [
        self::TYPE_CATEGORY,
        self::TYPE_CUSTOMER,
        self::TYPE_CUSTOMER_ORDER,
        self::TYPE_DELIVERY_NOTE,
        self::TYPE_IMAGE,
        self::TYPE_MANUFACTURER,
        self::TYPE_PRODUCT,
        self::TYPE_SPECIFIC,
        self::TYPE_SPECIFIC_VALUE,
        self::TYPE_PAYMENT,
        self::TYPE_CROSSSELLING,
        self::TYPE_CROSSSELLING_GROUP,
        self::TYPE_SHIPPING_CLASS,
        self::TYPE_CONFIG_GROUP,
        self::TYPE_CONFIG_ITEM,
        self::TYPE_CURRENCY,
        self::TYPE_CUSTOMER_GROUP,
        self::TYPE_LANGUAGE,
        self::TYPE_UNIT,
        self::TYPE_MEASUREMENT_UNIT,
        self::TYPE_PRODUCT_TYPE,
        self::TYPE_SHIPPING_METHOD,
        self::TYPE_TAX_RATE,
        self::TYPE_WAREHOUSE,
        self::TYPE_CATEGORY_ATTRIBUTE,
        self::TYPE_PRODUCT_ATTRIBUTE,
        self::TYPE_PRODUCT_VARIATION,
        self::TYPE_PRODUCT_VARIATION_VALUE,
    ];

    /**
     * @return array
     */
    public static function getIdentityTypes(): array
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
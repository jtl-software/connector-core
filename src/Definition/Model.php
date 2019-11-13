<?php
namespace Jtl\Connector\Core\Definition;

final class ModelName
{
    const CATEGORY = 'Category';
    const CATEGORY_ATTRIBUTE = 'CategoryAttr';
    const CONFIG_GROUP = 'ConfigGroup';
    const CONFIG_ITEM = 'ConfigItem';
    const CROSSSELLING = 'CrossSelling';
    const CROSSSELLING_GROUP = 'CrossSellingGroup';
    const CROSSSELLING_ITEM = 'CrossSellingItem';
    const CURRENCY = 'Currency';
    const CUSTOMER = 'Customer';
    const CUSTOMER_GROUP = 'CustomerGroup';
    const CUSTOMER_ORDER = 'CustomerOrder';
    const DELIVERY_NOTE = 'DeliveryNote';
    const IMAGE = 'Image';
    const PRODUCT_IMAGE = 'ProductImage';
    const CATEGORY_IMAGE = 'CategoryImage';
    const PRODUCT_VARIATION_VALUE_IMAGE = 'ProductVariationValueImage';
    const SPECIFIC_IMAGE = 'SpecificImage';
    const SPECIFIC_VALUE_IMAGE = 'SpecificValueImage';
    const MANUFACTURER_IMAGE = 'ManufacturerImage';
    const CONFIG_GROUP_IMAGE = 'ConfigGroupImage';
    const LANGUAGE = 'Language';
    const MANUFACTURER = 'Manufacturer';
    const MEASUREMENT_UNIT = 'MeasurementUnit';
    const PAYMENT = 'Payment';
    const PRODUCT = 'Product';
    const PRODUCT_ATTRIBUTE = 'ProductAttr';
    const PRODUCT_TYPE = 'ProductType';
    const PRODUCT_VARIATION = 'ProductVariation';
    const PRODUCT_VARIATION_VALUE = 'ProductVariationValue';
    const SHIPPING_CLASS = 'ShippingClass';
    const SHIPPING_METHOD = 'ShippingMethod';
    const SPECIFIC = 'Specific';
    const SPECIFIC_VALUE = 'SpecificValue';
    const TAX_RATE = 'TaxRate';
    const UNIT = 'Unit';
    const WAREHOUSE = 'Warehouse';

    protected static $mappings = [
        self::CATEGORY => IdentityType::TYPE_CATEGORY,
        self::CATEGORY_ATTRIBUTE => IdentityType::TYPE_CATEGORY_ATTRIBUTE,
        self::CONFIG_GROUP => IdentityType::TYPE_CONFIG_GROUP,
        self::CONFIG_ITEM => IdentityType::TYPE_CONFIG_ITEM,
        self::CROSSSELLING => IdentityType::TYPE_CROSSSELLING,
        self::CROSSSELLING_GROUP => IdentityType::TYPE_CROSSSELLING_GROUP,
        self::CROSSSELLING_ITEM => IdentityType::TYPE_CROSSSELLING,
        self::CURRENCY => IdentityType::TYPE_CURRENCY,
        self::CUSTOMER => IdentityType::TYPE_CUSTOMER,
        self::CUSTOMER_GROUP => IdentityType::TYPE_CUSTOMER_GROUP,
        self::CUSTOMER_ORDER => IdentityType::TYPE_CUSTOMER_ORDER,
        self::DELIVERY_NOTE => IdentityType::TYPE_DELIVERY_NOTE,
        self::IMAGE => IdentityType::TYPE_IMAGE,
        self::PRODUCT_IMAGE => IdentityType::TYPE_IMAGE,
        self::CATEGORY_IMAGE => IdentityType::TYPE_IMAGE,
        self::PRODUCT_VARIATION_VALUE_IMAGE => IdentityType::TYPE_IMAGE,
        self::SPECIFIC_IMAGE => IdentityType::TYPE_IMAGE,
        self::SPECIFIC_VALUE_IMAGE => IdentityType::TYPE_IMAGE,
        self::MANUFACTURER_IMAGE => IdentityType::TYPE_IMAGE,
        self::CONFIG_GROUP_IMAGE => IdentityType::TYPE_IMAGE,
        self::LANGUAGE => IdentityType::TYPE_LANGUAGE,
        self::MANUFACTURER => IdentityType::TYPE_MANUFACTURER,
        self::MEASUREMENT_UNIT => IdentityType::TYPE_MEASUREMENT_UNIT,
        self::PAYMENT => IdentityType::TYPE_PAYMENT,
        self::PRODUCT => IdentityType::TYPE_PRODUCT,
        self::PRODUCT_ATTRIBUTE => IdentityType::TYPE_PRODUCT_ATTRIBUTE,
        self::PRODUCT_TYPE => IdentityType::TYPE_PRODUCT_TYPE,
        self::PRODUCT_VARIATION => IdentityType::TYPE_PRODUCT_VARIATION,
        self::PRODUCT_VARIATION_VALUE => IdentityType::TYPE_PRODUCT_VARIATION_VALUE,
        self::SHIPPING_CLASS => IdentityType::TYPE_SHIPPING_CLASS,
        self::SHIPPING_METHOD => IdentityType::TYPE_SHIPPING_METHOD,
        self::SPECIFIC => IdentityType::TYPE_SPECIFIC,
        self::SPECIFIC_VALUE => IdentityType::TYPE_SPECIFIC_VALUE,
        self::TAX_RATE => IdentityType::TYPE_TAX_RATE,
        self::UNIT => IdentityType::TYPE_UNIT,
        self::WAREHOUSE => IdentityType::TYPE_WAREHOUSE,
    ];

    /**
     * @param string $modelName
     * @return boolean
     */
    public static function hasIdentityType(string $modelName): bool
    {
        return isset(self::$mappings[$modelName]);
    }

    /**
     * @param string $modelName
     * @return string
     */
    public static function getIdentityType(string $modelName): string
    {
        return self::hasIdentityType($modelName) ? self::$mappings[$modelName] : null;
    }

    /**
     * @return string[]
     */
    public static function getModelNames(): array
    {
        return array_keys(self::$mappings);
    }

    /**
     * @param string $modelName
     * @return boolean
     */
    public static function isModelName(string $modelName): bool
    {
        return in_array($modelName, self::getModelNames());
    }
}
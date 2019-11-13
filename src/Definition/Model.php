<?php

namespace Jtl\Connector\Core\Definition;

final class Model
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
        self::CATEGORY => IdentityType::CATEGORY,
        self::CATEGORY_ATTRIBUTE => IdentityType::CATEGORY_ATTRIBUTE,
        self::CONFIG_GROUP => IdentityType::CONFIG_GROUP,
        self::CONFIG_ITEM => IdentityType::CONFIG_ITEM,
        self::CROSSSELLING => IdentityType::CROSSSELLING,
        self::CROSSSELLING_GROUP => IdentityType::CROSSSELLING_GROUP,
        self::CROSSSELLING_ITEM => IdentityType::CROSSSELLING,
        self::CURRENCY => IdentityType::CURRENCY,
        self::CUSTOMER => IdentityType::CUSTOMER,
        self::CUSTOMER_GROUP => IdentityType::CUSTOMER_GROUP,
        self::CUSTOMER_ORDER => IdentityType::CUSTOMER_ORDER,
        self::DELIVERY_NOTE => IdentityType::DELIVERY_NOTE,
        self::IMAGE => IdentityType::IMAGE,
        self::PRODUCT_IMAGE => IdentityType::PRODUCT_IMAGE,
        self::CATEGORY_IMAGE => IdentityType::CATEGORY_IMAGE,
        self::PRODUCT_VARIATION_VALUE_IMAGE => IdentityType::PRODUCT_VARIATION_VALUE_IMAGE,
        self::SPECIFIC_IMAGE => IdentityType::SPECIFIC_IMAGE,
        self::SPECIFIC_VALUE_IMAGE => IdentityType::SPECIFIC_VALUE_IMAGE,
        self::MANUFACTURER_IMAGE => IdentityType::MANUFACTURER_IMAGE,
        self::CONFIG_GROUP_IMAGE => IdentityType::CONFIG_GROUP_IMAGE,
        self::LANGUAGE => IdentityType::LANGUAGE,
        self::MANUFACTURER => IdentityType::MANUFACTURER,
        self::MEASUREMENT_UNIT => IdentityType::MEASUREMENT_UNIT,
        self::PAYMENT => IdentityType::PAYMENT,
        self::PRODUCT => IdentityType::PRODUCT,
        self::PRODUCT_ATTRIBUTE => IdentityType::PRODUCT_ATTRIBUTE,
        self::PRODUCT_TYPE => IdentityType::PRODUCT_TYPE,
        self::PRODUCT_VARIATION => IdentityType::PRODUCT_VARIATION,
        self::PRODUCT_VARIATION_VALUE => IdentityType::PRODUCT_VARIATION_VALUE,
        self::SHIPPING_CLASS => IdentityType::SHIPPING_CLASS,
        self::SHIPPING_METHOD => IdentityType::SHIPPING_METHOD,
        self::SPECIFIC => IdentityType::SPECIFIC,
        self::SPECIFIC_VALUE => IdentityType::SPECIFIC_VALUE,
        self::TAX_RATE => IdentityType::TAX_RATE,
        self::UNIT => IdentityType::UNIT,
        self::WAREHOUSE => IdentityType::WAREHOUSE,
    ];

    protected static $propertyMappings = [
        self::CATEGORY => [
            'id' => IdentityType::CATEGORY,
            'parentCategoryId' => IdentityType::CATEGORY
        ],
        self::CONFIG_GROUP => [
            'id' => IdentityType::CONFIG_GROUP
        ],
        self::CONFIG_ITEM => [
            'id' => IdentityType::CONFIG_ITEM,
            'productId' => IdentityType::PRODUCT,
        ],
        self::CROSSSELLING => [
            'id' => IdentityType::CROSSSELLING,
            'productId' => IdentityType::PRODUCT
        ],
        self::CROSSSELLING_ITEM => [
            'crossSellingGroupId' => IdentityType::CROSSSELLING_GROUP,
            'productIds' => IdentityType::PRODUCT  // List of Product identities
        ],
        self::CROSSSELLING_GROUP => [
            'id' => IdentityType::CROSSSELLING_GROUP
        ],
        self::CURRENCY => [
            'id' => IdentityType::CURRENCY,
        ],
        self::CUSTOMER => [
            'id' => IdentityType::CUSTOMER,
            'customerGroupId' => IdentityType::CUSTOMER_GROUP
        ],
        self::CUSTOMER_GROUP => [
            'id' => IdentityType::CUSTOMER_GROUP,
        ],
        self::CUSTOMER_ORDER => [
            'id' => IdentityType::CUSTOMER_ORDER,
            'customerId' => IdentityType::CUSTOMER,
            'shippingMethodId' => IdentityType::SHIPPING_METHOD
        ],
        'CustomerOrderItem' => [
            'productId' => IdentityType::PRODUCT
        ],
        self::DELIVERY_NOTE => [
            'id' => IdentityType::DELIVERY_NOTE,
            'customerOrderId' => IdentityType::CUSTOMER_ORDER
        ],
        'DeliveryNoteItem' => [
            'productId' => IdentityType::PRODUCT
        ],
        'FileUpload' => [
            'productId' => IdentityType::PRODUCT
        ],
        self::IMAGE => [
            'id' => IdentityType::IMAGE,
            'foreignKey' => IdentityType::IMAGE
        ],
        self::PRODUCT_IMAGE => [
            'id' => IdentityType::PRODUCT_IMAGE,
            'foreignKey' => IdentityType::PRODUCT
        ],
        self::CATEGORY_IMAGE => [
            'id' => IdentityType::CATEGORY_IMAGE,
            'foreignKey' => IdentityType::CATEGORY
        ],
        self::PRODUCT_VARIATION_VALUE_IMAGE => [
            'id' => IdentityType::PRODUCT_VARIATION_VALUE_IMAGE,
            'foreignKey' => IdentityType::PRODUCT_VARIATION_VALUE
        ],
        self::SPECIFIC_IMAGE => [
            'id' => IdentityType::SPECIFIC_IMAGE,
            'foreignKey' => IdentityType::SPECIFIC
        ],
        self::SPECIFIC_VALUE_IMAGE => [
            'id' => IdentityType::SPECIFIC_VALUE_IMAGE,
            'foreignKey' => IdentityType::SPECIFIC_VALUE
        ],
        self::MANUFACTURER_IMAGE => [
            'id' => IdentityType::MANUFACTURER_IMAGE,
            'foreignKey' => IdentityType::MANUFACTURER
        ],
        self::CONFIG_GROUP_IMAGE => [
            'id' => IdentityType::CONFIG_GROUP_IMAGE,
            'foreignKey' => IdentityType::CONFIG_GROUP
        ],
        self::LANGUAGE => [
            'id' => IdentityType::LANGUAGE
        ],
        self::MANUFACTURER => [
            'id' => IdentityType::MANUFACTURER
        ],
        self::MEASUREMENT_UNIT => [
            'id' => IdentityType::MEASUREMENT_UNIT
        ],
        self::PAYMENT => [
            'id' => IdentityType::PAYMENT,
            'customerOrderId' => IdentityType::CUSTOMER_ORDER
        ],
        self::PRODUCT => [
            'id' => IdentityType::PRODUCT,
            'masterProductId' => IdentityType::PRODUCT,
            'manufacturerId' => IdentityType::MANUFACTURER,
            'measurementUnitId' => IdentityType::MEASUREMENT_UNIT,
            'productTypeId' => IdentityType::PRODUCT_TYPE,
            'shippingClassId' => IdentityType::SHIPPING_CLASS,
            'unitId' => IdentityType::UNIT,
        ],
        'ProductPrice' => [
            'productId' => IdentityType::PRODUCT
        ],
        'ProductStockLevel' => [
            'productId' => IdentityType::PRODUCT
        ],
        'Product2Category' => [
            'categoryId' => IdentityType::CATEGORY
        ],
        'ProductAttr' => [
            'id' => IdentityType::PRODUCT_ATTRIBUTE
        ],
        'ProductConfigGroup' => [
            'configGroupId' => IdentityType::CONFIG_GROUP
        ],
        'ProductSpecific' => [
            'id' => IdentityType::SPECIFIC,
            'specificValueId' => IdentityType::SPECIFIC_VALUE
        ],
        self::PRODUCT_TYPE => [
            'id' => IdentityType::PRODUCT_TYPE
        ],
        self::PRODUCT_VARIATION => [
            'id' => IdentityType::PRODUCT_VARIATION
        ],
        self::PRODUCT_VARIATION_VALUE => [
            'id' => IdentityType::PRODUCT_VARIATION_VALUE
        ],
        'ProductVariationValueExtraCharge' => [
            'customerGroupId' => IdentityType::CUSTOMER_GROUP
        ],
        'ProductVariationValueInvisibility' => [
            'customerGroupId' => IdentityType::CUSTOMER_GROUP
        ],
        'ProductWarehouseInfo' => [
            'productId' => IdentityType::PRODUCT,
            'warehouseId' => IdentityType::WAREHOUSE,
        ],
        self::SHIPPING_CLASS => [
            'id' => IdentityType::SHIPPING_CLASS,
        ],
        self::SHIPPING_METHOD => [
            'id' => IdentityType::SHIPPING_METHOD,
        ],
        'Shipment' => [
            'deliveryNoteId' => IdentityType::DELIVERY_NOTE
        ],
        self::SPECIFIC => [
            'id' => IdentityType::SPECIFIC
        ],
        self::SPECIFIC_VALUE => [
            'id' => IdentityType::SPECIFIC_VALUE
        ],
        'StatusChange' => [
            'customerOrderId' => IdentityType::CUSTOMER_ORDER
        ],
        self::TAX_RATE => [
            'id' => IdentityType::TAX_RATE,
        ],
        self::UNIT => [
            'id' => IdentityType::UNIT,
        ],
        self::WAREHOUSE => [
            'id' => IdentityType::WAREHOUSE,
        ],
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
     * @param string $modelName
     * @param string $propertyName
     * @return boolean
     */
    public static function isIdentityProperty(string $modelName, string $propertyName): bool
    {
        return isset(self::$propertyMappings[$modelName][$propertyName]);
    }

    /**
     * @param string $modelName
     * @param string $propertyName
     * @return int
     */
    public static function getPropertyIdentityType(string $modelName, string $propertyName): int
    {
        return self::isIdentityProperty($modelName, $propertyName) ? self::$propertyMappings[$modelName][$propertyName] : null;
    }

    /**
     * @param int $type
     * @return string
     */
    public static function getModelByType(int $type): string
    {
        return array_search($type, self::$mappings, true);
    }

    /**
     * @return string[]
     */
    public static function getModels(): array
    {
        return array_keys(self::$mappings);
    }

    /**
     * @param string $modelName
     * @return boolean
     */
    public static function isModel(string $modelName): bool
    {
        return in_array($modelName, self::getModels());
    }
}
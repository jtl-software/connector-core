<?php
/**
 * @copyright JTL-Software GmbH
 * @package jtl\Connector\ModelContainer
 */

namespace jtl\Connector\ModelContainer;

/**
 * Main Container Class
 */
final class MainContainer
{
    const TYPE_RCPMETHOD = 0;
    const TYPE_CONTROLLER = 1;

    /**
     * Container Mappings
     * 
     * @var multiple:string
     */
    public static $mappings = array(
        'global_data' => array('global_data', 'GlobalData'),
        'company' => array('global_data', 'GlobalData'),
        'language' => array('global_data', 'GlobalData'),
        'currency' => array('global_data', 'GlobalData'),
        'customer_group' => array('global_data', 'GlobalData'),
        'customer_group_i18n' => array('global_data', 'GlobalData'),
        'customer_group_attr' => array('global_data', 'GlobalData'),
        'delivery_status' => array('global_data', 'GlobalData'),
        'cross_selling_group' => array('global_data', 'GlobalData'),
        'unit' => array('global_data', 'GlobalData'),
        'tax_zone' => array('global_data', 'GlobalData'),
        'tax_zone_country' => array('global_data', 'GlobalData'),
        'tax_class' => array('global_data', 'GlobalData'),
        'tax_rate' => array('global_data', 'GlobalData'),
        'shipping_class' => array('global_data', 'GlobalData'),
        'warehouse' => array('global_data', 'GlobalData'),
        'warehouse_i18n' => array('global_data', 'GlobalData'),
        'product_type' => array('global_data', 'GlobalData'),
        'config_group' => array('global_data', 'GlobalData'),
        'config_group_i18n' => array('global_data', 'GlobalData'),
        'config_item' => array('global_data', 'GlobalData'),
        'config_item_i18n' => array('global_data', 'GlobalData'),
        'config_item_price' => array('global_data', 'GlobalData'),
        'file_download' => array('global_data', 'GlobalData'),
        'file_download_i18n' => array('global_data', 'GlobalData'),
        'product_file_download' => array('product', 'Product'),
        'product' => array('product', 'Product'),
        'product_i18n' => array('product', 'Product'),
        'product_price' => array('product', 'Product'),
        'product_special_price' => array('product', 'Product'),
        'special_price' => array('product', 'Product'),
        'product2_category' => array('product', 'Product'),
        'product_attr' => array('product', 'Product'),
        'product_attr_i18n' => array('product', 'Product'),
        'product_invisibility' => array('product', 'Product'),
        'product_function_attr' => array('product', 'Product'),
        'product_variation' => array('product', 'Product'),
        'product_variation_i18n' => array('product', 'Product'),
        'product_variation_invisibility' => array('product', 'Product'),
        'product_variation_value' => array('product', 'Product'),
        'product_variation_value_i18n' => array('product', 'Product'),
        'product_variation_value_extra_charge' => array('product', 'Product'),
        'product_variation_value_invisibility' => array('product', 'Product'),
        'product_variation_value_dependency' => array('product', 'Product'),
        'product_var_combination' => array('product', 'Product'),
        'cross_selling' => array('product', 'Product'),
        'product_specific' => array('product', 'Product'),
        'media_file' => array('product', 'Product'),
        'media_file_i18n' => array('product', 'Product'),
        'media_file_attr' => array('product', 'Product'),
        'set_article' => array('product', 'Product'),
        'file_upload' => array('product', 'Product'),
        'product_warehouse_info' => array('product', 'Product'),
        'product_config_group' => array('product', 'Product'),
        'customer' => array('customer', 'Customer'),
        'customer_attr' => array('customer', 'Customer'),
        'customer_order' => array('customer_order', 'CustomerOrder'),
        'customer_order_attr' => array('customer_order', 'CustomerOrder'),
        'customer_order_item' => array('customer_order', 'CustomerOrder'),
        'customer_order_item_variation' => array('customer_order', 'CustomerOrder'),
        'customer_order_payment_info' => array('customer_order', 'CustomerOrder'),
        'customer_order_shipping_address' => array('customer_order', 'CustomerOrder'),
        'customer_order_billing_address' => array('customer_order', 'CustomerOrder'),
        'manufacturer' => array('manufacturer', 'Manufacturer'),
        'manufacturer_i18n' => array('manufacturer', 'Manufacturer'),
        'specific' => array('specific', 'Specific'),
        'specific_i18n' => array('specific', 'Specific'),
        'specific_value' => array('specific', 'Specific'),
        'specific_value_i18n' => array('specific', 'Specific'),
        'delivery_note' => array('delivery_note', 'DeliveryNote'),
        'delivery_note_item' => array('delivery_note', 'DeliveryNote'),
        'shipment' => array('delivery_note', 'DeliveryNote'),
        'category' => array('category', 'Category'),
        'category_i18n' => array('category', 'Category'),
        'category_attr' => array('category', 'Category'),
        'category_attr_i18n' => array('category', 'Category'),
        'category_function_attr' => array('category', 'Category'),
        'category_invisibility' => array('category', 'Category'),
        'category_customer_group' => array('category', 'Category'),
        'image' => array('image', 'Image')
    );
    
    /**
     * Type Mapping
     * 
     * @param string $rpcmethod
     * @param int $type
     * @return string|NULL
     * @throws \InvalidArgumentException
     */
    public static function allocate($rpcmethod, $type = self::TYPE_CONTROLLER)
    {
        if ($type != self::TYPE_CONTROLLER && $type != self::TYPE_RCPMETHOD) {
            throw new \InvalidArgumentException("Parameter type ({$type}) is not a valid type");
        }

        $rpcmethod = strtolower($rpcmethod);
        
        if (isset(self::$mappings[$rpcmethod])) {
            return self::$mappings[$rpcmethod][$type];
        }
        
        return null;
    }

    /**
     * Checks if controller is a maincontroller
     * 
     * @param string $rpcmethod
     * @return boolean
     * @throws \InvalidArgumentException
     */
    public static function isMain($rpcmethod)
    {
        $mainMethod = self::allocate($rpcmethod, self::TYPE_RCPMETHOD);

        if ($mainMethod !== null) {
            return (strtolower($mainMethod) === strtolower($rpcmethod));
        }

        throw new \InvalidArgumentException("Parameter rpcmethod ({$rpcmethod}) could not be found");
    }
}
?>
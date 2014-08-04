<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Type;

use \jtl\Connector\Type\PropertyInfo;

/**
 * @access public
 * @package jtl\Connector\Type
 */
class Product extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('basePriceUnitId', 'Identity', null, False, false, false),
            new PropertyInfo('deliveryStatusId', 'Identity', null, False, false, false),
            new PropertyInfo('id', 'Identity', null, True, false, false),
            new PropertyInfo('manufacturerId', 'Identity', null, False, false, false),
            new PropertyInfo('masterProductId', 'Identity', null, False, false, false),
            new PropertyInfo('measurementUnitId', 'Identity', null, False, false, false),
            new PropertyInfo('productTypeId', 'Identity', null, False, false, false),
            new PropertyInfo('setArticleId', 'Identity', null, False, false, false),
            new PropertyInfo('shippingClassId', 'Identity', null, False, false, false),
            new PropertyInfo('unitId', 'Identity', null, False, false, false),
            new PropertyInfo('asin', 'string', null, False, false, false),
            new PropertyInfo('availableFrom', 'string', null, False, false, false),
            new PropertyInfo('basePriceDivisor', 'double', null, False, false, false),
            new PropertyInfo('basePriceQuantity', 'double', null, False, false, false),
            new PropertyInfo('bestBefore', 'string', null, False, false, false),
            new PropertyInfo('considerBasePrice', 'bool', null, False, false, false),
            new PropertyInfo('considerStock', 'bool', null, False, false, false),
            new PropertyInfo('considerVariationStock', 'bool', null, False, false, false),
            new PropertyInfo('created', 'string', null, False, false, false),
            new PropertyInfo('ean', 'string', null, False, false, false),
            new PropertyInfo('epid', 'string', null, False, false, false),
            new PropertyInfo('hazardIdNumber', 'string', null, False, false, false),
            new PropertyInfo('height', 'double', null, False, false, false),
            new PropertyInfo('inflowDate', 'string', null, False, false, false),
            new PropertyInfo('inflowQuantity', 'double', null, False, false, false),
            new PropertyInfo('isbn', 'string', null, False, false, false),
            new PropertyInfo('isDivisible', 'bool', null, False, false, false),
            new PropertyInfo('isMasterProduct', 'bool', null, False, false, false),
            new PropertyInfo('isNew', 'bool', null, False, false, false),
            new PropertyInfo('isTopProduct', 'bool', null, False, false, false),
            new PropertyInfo('keywords', 'string', null, False, false, false),
            new PropertyInfo('length', 'double', null, False, false, false),
            new PropertyInfo('manufacturerNumber', 'string', null, False, false, false),
            new PropertyInfo('measurementQuantity', 'double', null, False, false, false),
            new PropertyInfo('minimumOrderQuantity', 'double', null, False, false, false),
            new PropertyInfo('note', 'string', null, False, false, false),
            new PropertyInfo('originCountry', 'string', null, False, false, false),
            new PropertyInfo('permitNegativeStock', 'bool', null, False, false, false),
            new PropertyInfo('productWeight', 'double', null, False, false, false),
            new PropertyInfo('recommendedRetailPrice', 'double', null, False, false, false),
            new PropertyInfo('serialNumber', 'string', null, False, false, false),
            new PropertyInfo('shippingWeight', 'double', null, False, false, false),
            new PropertyInfo('sku', 'string', null, False, false, false),
            new PropertyInfo('sort', 'int', null, False, false, false),
            new PropertyInfo('stockLevel', 'double', null, False, false, false),
            new PropertyInfo('supplierDeliveryTime', 'double', null, False, false, false),
            new PropertyInfo('supplierStockLevel', 'double', null, False, false, false),
            new PropertyInfo('takeOffQuantity', 'double', null, False, false, false),
            new PropertyInfo('taric', 'string', null, False, false, false),
            new PropertyInfo('unNumber', 'string', null, False, false, false),
            new PropertyInfo('upc', 'string', null, False, false, false),
            new PropertyInfo('vat', 'double', null, False, false, false),
            new PropertyInfo('width', 'double', null, False, false, false),
            new PropertyInfo('prices', '\jtl\Connector\Model\ProductPrice', null, false, false, true),
            new PropertyInfo('specialPrices', '\jtl\Connector\Model\ProductSpecialPrice', null, false, false, true),
            new PropertyInfo('fileDownloads', '\jtl\Connector\Model\ProductFileDownload', null, false, false, true),
            new PropertyInfo('categories', '\jtl\Connector\Model\Product2Category', null, false, false, true),
            new PropertyInfo('mediaFiles', '\jtl\Connector\Model\MediaFile', null, false, false, true),
            new PropertyInfo('configGroups', '\jtl\Connector\Model\ProductConfigGroup', null, false, false, true),
            new PropertyInfo('invisibilities', '\jtl\Connector\Model\ProductInvisibility', null, false, false, true),
            new PropertyInfo('crossSellings', '\jtl\Connector\Model\CrossSelling', null, false, false, true),
            new PropertyInfo('setArticles', '\jtl\Connector\Model\SetArticle', null, false, false, true),
            new PropertyInfo('variations', '\jtl\Connector\Model\ProductVariation', null, false, false, true),
            new PropertyInfo('i18ns', '\jtl\Connector\Model\ProductI18n', null, false, false, true),
        );
    }
}

<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Type
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
            new PropertyInfo('asin', 'string', null, false, false, false),
            new PropertyInfo('availableFrom', 'DateTime', null, false, false, false),
            new PropertyInfo('basePriceDivisor', 'double', null, false, false, false),
            new PropertyInfo('basePriceQuantity', 'double', null, false, false, false),
            new PropertyInfo('basePriceUnitId', 'int', null, false, true, false),
            new PropertyInfo('bestBefore', 'DateTime', null, false, false, false),
            new PropertyInfo('buffer', 'int', null, false, false, false),
            new PropertyInfo('considerBasePrice', 'bool', null, false, false, false),
            new PropertyInfo('considerStock', 'bool', null, false, false, false),
            new PropertyInfo('considerVariationStock', 'bool', null, false, false, false),
            new PropertyInfo('created', 'DateTime', null, false, false, false),
            new PropertyInfo('deliveryStatusId', 'int', null, false, true, false),
            new PropertyInfo('ean', 'string', null, false, false, false),
            new PropertyInfo('epid', 'string', null, false, false, false),
            new PropertyInfo('hazardIdNumber', 'string', null, false, false, false),
            new PropertyInfo('height', 'double', null, false, false, false),
            new PropertyInfo('id', 'int', null, true, true, false),
            new PropertyInfo('inflowDate', 'DateTime', null, false, false, false),
            new PropertyInfo('inflowQuantity', 'double', null, false, false, false),
            new PropertyInfo('isActive', 'bool', null, false, false, false),
            new PropertyInfo('isbn', 'string', null, false, false, false),
            new PropertyInfo('isDivisible', 'bool', null, false, false, false),
            new PropertyInfo('isMasterProduct', 'bool', null, false, false, false),
            new PropertyInfo('isNew', 'bool', null, false, false, false),
            new PropertyInfo('isTopProduct', 'bool', null, false, false, false),
            new PropertyInfo('keywords', 'string', null, false, false, false),
            new PropertyInfo('length', 'double', null, false, false, false),
            new PropertyInfo('manufacturerId', 'int', null, false, true, false),
            new PropertyInfo('manufacturerNumber', 'string', null, false, false, false),
            new PropertyInfo('masterProductId', 'int', null, false, true, false),
            new PropertyInfo('measurementQuantity', 'double', null, false, false, false),
            new PropertyInfo('measurementUnitId', 'int', null, false, true, false),
            new PropertyInfo('minimumOrderQuantity', 'double', null, false, false, false),
            new PropertyInfo('modified', 'DateTime', null, false, false, false),
            new PropertyInfo('note', 'string', null, false, false, false),
            new PropertyInfo('originCountry', 'string', null, false, false, false),
            new PropertyInfo('permitNegativeStock', 'bool', null, false, false, false),
            new PropertyInfo('productTypeId', 'int', null, false, true, false),
            new PropertyInfo('productWeight', 'double', null, false, false, false),
            new PropertyInfo('recommendedRetailPrice', 'double', null, false, false, false),
            new PropertyInfo('serialNumber', 'string', null, false, false, false),
            new PropertyInfo('setArticleId', 'int', null, false, true, false),
            new PropertyInfo('shippingClassId', 'int', null, false, true, false),
            new PropertyInfo('shippingWeight', 'double', null, false, false, false),
            new PropertyInfo('sku', 'string', null, false, false, false),
            new PropertyInfo('sort', 'int', null, false, false, false),
            new PropertyInfo('stockLevel', 'double', null, false, false, false),
            new PropertyInfo('supplierDeliveryTime', 'double', null, false, false, false),
            new PropertyInfo('supplierStockLevel', 'double', null, false, false, false),
            new PropertyInfo('takeOffQuantity', 'double', null, false, false, false),
            new PropertyInfo('taric', 'string', null, false, false, false),
            new PropertyInfo('unitId', 'int', null, false, true, false),
            new PropertyInfo('unNumber', 'string', null, false, false, false),
            new PropertyInfo('upc', 'string', null, false, false, false),
            new PropertyInfo('vat', 'double', null, false, false, false),
            new PropertyInfo('width', 'double', null, false, false, false),
            new PropertyInfo('variations', '\jtl\Connector\Model\ProductVariation', null, false, false, true),
            new PropertyInfo('specifics', '\jtl\Connector\Model\ProductSpecific', null, false, false, true),
            new PropertyInfo('specialPrices', '\jtl\Connector\Model\ProductSpecialPrice', null, false, false, true),
            new PropertyInfo('setArticles', '\jtl\Connector\Model\SetArticle', null, false, false, true),
            new PropertyInfo('mediaFiles', '\jtl\Connector\Model\MediaFile', null, false, false, true),
            new PropertyInfo('invisibilities', '\jtl\Connector\Model\ProductInvisibility', null, false, false, true),
            new PropertyInfo('i18ns', '\jtl\Connector\Model\ProductI18n', null, false, false, true),
            new PropertyInfo('fileDownloads', '\jtl\Connector\Model\ProductFileDownload', null, false, false, true),
            new PropertyInfo('crossSellings', '\jtl\Connector\Model\CrossSelling', null, false, false, true),
            new PropertyInfo('configGroups', '\jtl\Connector\Model\ProductConfigGroup', null, false, false, true),
            new PropertyInfo('categories', '\jtl\Connector\Model\Product2Category', null, false, false, true),
        );
    }

	public function isMain()
	{
		return true;
	}
}

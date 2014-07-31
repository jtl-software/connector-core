<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Type
 */

namespace jtl\Connector\Type;

use jtl\Connector\Type\PropertyInfo;

/**
 * @access public
 * @package jtl\Connector\Type
 */
class Product extends DataModel
{
    protected function loadProperties()
    {
        return array(
			new PropertyInfo('id', '\jtl\Connector\Model\IdentityKeyPair', null, true, true, false),
			new PropertyInfo('manufacturerId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('masterProductId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('measurementUnitId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('productTypeId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('setArticleId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('shippingClassId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('taxClassId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('varCombinationId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('asin', 'string', '', false, false, false),
			new PropertyInfo('availableFrom', '\jtl\Connector\Model\DateTime', null, false, false, false),
			new PropertyInfo('basePriceQuantity', 'float', 0.0, false, false, false),
			new PropertyInfo('basePriceValue', 'float', 0.0, false, false, false),
			new PropertyInfo('categories', '\jtl\Connector\Model\Product2Category', null, false, false, true),
			new PropertyInfo('configGroups', '\jtl\Connector\Model\ProductConfigGroup', null, false, false, true),
			new PropertyInfo('considerBasePrice', 'boolean', false, false, false, false),
			new PropertyInfo('considerStock', 'boolean', false, false, false, false),
			new PropertyInfo('considerVariationStock', 'boolean', false, false, false, false),
			new PropertyInfo('created', '\jtl\Connector\Model\DateTime', null, false, false, false),
			new PropertyInfo('crossSellings', '\jtl\Connector\Model\CrossSelling', null, false, false, true),
			new PropertyInfo('ean', 'string', '', false, false, false),
			new PropertyInfo('epId', 'string', '', false, false, false),
			new PropertyInfo('fileDownloads', '\jtl\Connector\Model\ProductFileDownload', null, false, false, true),
			new PropertyInfo('flagDelete', 'boolean', false, false, false, false),
			new PropertyInfo('flagUpdate', 'boolean', false, false, false, false),
			new PropertyInfo('grossPrice', 'float', 0.0, false, false, false),
			new PropertyInfo('hasBestBefore', 'boolean', false, false, false, false),
			new PropertyInfo('hazardIdNumber', 'string', '', false, false, false),
			new PropertyInfo('height', 'float', 0.0, false, false, false),
			new PropertyInfo('i18ns', '\jtl\Connector\Model\ProductI18n', null, false, false, true),
			new PropertyInfo('invisibilities', '\jtl\Connector\Model\ProductInvisibility', null, false, false, true),
			new PropertyInfo('isActive', 'boolean', false, false, false, false),
			new PropertyInfo('isbn', 'string', '', false, false, false),
			new PropertyInfo('isDivisible', 'boolean', false, false, false, false),
			new PropertyInfo('isMasterProduct', 'boolean', false, false, false, false),
			new PropertyInfo('isNew', 'boolean', false, false, false, false),
			new PropertyInfo('isTopProduct', 'boolean', false, false, false, false),
			new PropertyInfo('length', 'float', 0.0, false, false, false),
			new PropertyInfo('manufacturerName', 'string', '', false, false, false),
			new PropertyInfo('manufacturerNumber', 'string', '', false, false, false),
			new PropertyInfo('measurementQuantity', 'float', 0.0, false, false, false),
			new PropertyInfo('mediaFiles', '\jtl\Connector\Model\MediaFile', null, false, false, true),
			new PropertyInfo('minimumOrderQuantity', 'float', 0.0, false, false, false),
			new PropertyInfo('netPrice', 'float', 0.0, false, false, false),
			new PropertyInfo('note', 'string', '', false, false, false),
			new PropertyInfo('originCountry', 'string', '', false, false, false),
			new PropertyInfo('permitNegativeStock', 'boolean', false, false, false, false),
			new PropertyInfo('prices', '\jtl\Connector\Model\ProductPriceOld', null, false, false, true),
			new PropertyInfo('productWeight', 'float', 0.0, false, false, false),
			new PropertyInfo('recommendedRetailPrice', 'float', 0.0, false, false, false),
			new PropertyInfo('serialNumber', 'string', '', false, false, false),
			new PropertyInfo('setArticles', '\jtl\Connector\Model\SetArticle', null, false, false, true),
			new PropertyInfo('shippingWeight', 'float', 0.0, false, false, false),
			new PropertyInfo('sku', 'string', '', false, false, false),
			new PropertyInfo('sort', 'integer', 0, false, false, false),
			new PropertyInfo('specialPrices', '\jtl\Connector\Model\ProductSpecialPrice', null, false, false, true),
			new PropertyInfo('stockLevel', 'float', 0.0, false, false, false),
			new PropertyInfo('takeOffQuantity', 'float', 0.0, false, false, false),
			new PropertyInfo('taric', 'string', '', false, false, false),
			new PropertyInfo('unNumber', 'string', '', false, false, false),
			new PropertyInfo('upc', 'string', '', false, false, false),
			new PropertyInfo('variations', '\jtl\Connector\Model\ProductVariation', null, false, false, true),
			new PropertyInfo('vat', 'float', 0.0, false, false, false),
			new PropertyInfo('width', 'float', 0.0, false, false, false),
        );
    }
}

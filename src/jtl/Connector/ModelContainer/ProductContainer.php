<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\ModelContainer
 */

namespace jtl\Connector\ModelContainer;

/**
 * Product Container Class
 * @access public
 */
class ProductContainer extends CoreContainer
{
    /**
     * @var \jtl\Connector\Model\FileDownload[]
     */
    protected $_fileDownloads;
    
    /**
     * @var \jtl\Connector\Model\Product[]
     */
    protected $_products;
    
    /**
     * @var \jtl\Connector\Model\ProductI18n[]
     */
    protected $_productI18ns;
    
    /**
     * @var \jtl\Connector\Model\ProductPrice[]
     */
    protected $_productPrices;
    
    /**
     * @var \jtl\Connector\Model\ProductSpecialPrice[]
     */
    protected $_productSpecialPrices;
    
    /**
     * @var \jtl\Connector\Model\Product2Category[]
     */
    protected $_product2Categories;
    
    /**
     * @var \jtl\Connector\Model\ProductAttr[]
     */
    protected $_productAttrs;
    
    /**
     * @var \jtl\Connector\Model\ProductAttrI18n[]
     */
    protected $_productAttrI18ns;
    
    /**
     * @var \jtl\Connector\Model\ProductFunctionAttr[]
     */
    protected $_productFunctionAttrs;
    
    /**
     * @var \jtl\Connector\Model\ProductVariation[]
     */
    protected $_productVariations;
    
    /**
     * @var \jtl\Connector\Model\ProductVariationI18n[]
     */
    protected $_productVariationI18ns;
    
    /**
     * @var \jtl\Connector\Model\ProductVariationVisibility[]
     */
    protected $_productVariationVisibilities;
    
    /**
     * @var \jtl\Connector\Model\ProductVariationValue[]
     */
    protected $_productVariationValues;
    
    /**
     * @var \jtl\Connector\Model\ProductVariationValueI18n[]
     */
    protected $_productVariationValueI18ns;
    
    /**
     * @var \jtl\Connector\Model\ProductVariationValueExtraCharge[]
     */
    protected $_productVariationValueExtraCharges;
    
    /**
     * @var \jtl\Connector\Model\ProductVariationValueVisibility[]
     */
    protected $_productVariationValueVisibilities;
    
    /**
     * @var \jtl\Connector\Model\ProductVariationValueDependency[]
     */
    protected $_productVariationValueDependencies;
    
    /**
     * @var \jtl\Connector\Model\ProductVarCombination[]
     */
    protected $_productVarCombinations;
    
    /**
     * @var \jtl\Connector\Model\CrossSelling[]
     */
    protected $_crossSellings;
    
    /**
     * @var \jtl\Connector\Model\ProductSpecific[]
     */
    protected $_productSpecifics;
    
    /**
     * @var \jtl\Connector\Model\MediaFile[]
     */
    protected $_mediaFiles;
    
    /**
     * @var \jtl\Connector\Model\MediaFileI18n[]
     */
    protected $_mediaFileI18ns;
    
    /**
     * @var \jtl\Connector\Model\MediaFileAttr[]
     */
    protected $_mediaFileAttrs;
    
    /**
     * @var \jtl\Connector\Model\SetArticle[]
     */
    protected $_setArticles;
    
    /**
     * @var \jtl\Connector\Model\FileUpload[]
     */
    protected $_fileUploads;
    
    /**
     * @var \jtl\Connector\Model\ProductWarehouseInfo[]
     */
    protected $_productWarehouseInfos;
    
    /**
     * @var \jtl\Connector\Model\ProductConfigGroup[]
     */
    protected $_productConfigGroups;
        
    /**
     * @return array \jtl\Connector\Model\FileDownload
     */
    public function getFileDownloads()
    {
        return $this->_fileDownloads;
    }
        
    /**
     * @return array \jtl\Connector\Model\Product
     */
    public function getProducts()
    {
        return $this->_products;
    }
        
    /**
     * @return array \jtl\Connector\Model\ProductI18n
     */
    public function getProductI18ns()
    {
        return $this->_productI18ns;
    }
        
    /**
     * @return array \jtl\Connector\Model\ProductPrice
     */
    public function getProductPrices()
    {
        return $this->_productPrices;
    }
        
    /**
     * @return array \jtl\Connector\Model\ProductSpecialPrice
     */
    public function getProductSpecialPrices()
    {
        return $this->_productSpecialPrices;
    }
        
    /**
     * @return array \jtl\Connector\Model\Product2Category
     */
    public function getProduct2Categories()
    {
        return $this->_product2Categories;
    }
        
    /**
     * @return array \jtl\Connector\Model\ProductAttr
     */
    public function getProductAttrs()
    {
        return $this->_productAttrs;
    }
        
    /**
     * @return array \jtl\Connector\Model\ProductAttrI18n
     */
    public function getProductAttrI18ns()
    {
        return $this->_productAttrI18ns;
    }
        
    /**
     * @return array \jtl\Connector\Model\ProductFunctionAttr
     */
    public function getProductFunctionAttrs()
    {
        return $this->_productFunctionAttrs;
    }
        
    /**
     * @return array \jtl\Connector\Model\ProductVariation
     */
    public function getProductVariations()
    {
        return $this->_productVariations;
    }
        
    /**
     * @return array \jtl\Connector\Model\ProductVariationI18n
     */
    public function getProductVariationI18ns()
    {
        return $this->_productVariationI18ns;
    }
        
    /**
     * @return array \jtl\Connector\Model\ProductVariationVisibility
     */
    public function getProductVariationVisibilities()
    {
        return $this->_productVariationVisibilities;
    }
        
    /**
     * @return array \jtl\Connector\Model\ProductVariationValue
     */
    public function getProductVariationValues()
    {
        return $this->_productVariationValues;
    }
        
    /**
     * @return array \jtl\Connector\Model\ProductVariationValueI18n
     */
    public function getProductVariationValueI18ns()
    {
        return $this->_productVariationValueI18ns;
    }
        
    /**
     * @return array \jtl\Connector\Model\ProductVariationValueExtraCharge
     */
    public function getProductVariationValueExtraCharges()
    {
        return $this->_productVariationValueExtraCharges;
    }
        
    /**
     * @return array \jtl\Connector\Model\ProductVariationValueVisibility
     */
    public function getProductVariationValueVisibilities()
    {
        return $this->_productVariationValueVisibilities;
    }
        
    /**
     * @return array \jtl\Connector\Model\ProductVariationValueDependency
     */
    public function getProductVariationValueDependencies()
    {
        return $this->_productVariationValueDependencies;
    }
        
    /**
     * @return array \jtl\Connector\Model\ProductVarCombination
     */
    public function getProductVarCombinations()
    {
        return $this->_productVarCombinations;
    }
        
    /**
     * @return array \jtl\Connector\Model\CrossSelling
     */
    public function getCrossSellings()
    {
        return $this->_crossSellings;
    }
        
    /**
     * @return array \jtl\Connector\Model\ProductSpecific
     */
    public function getProductSpecifics()
    {
        return $this->_productSpecifics;
    }
        
    /**
     * @return array \jtl\Connector\Model\MediaFile
     */
    public function getMediaFiles()
    {
        return $this->_mediaFiles;
    }
        
    /**
     * @return array \jtl\Connector\Model\MediaFileI18n
     */
    public function getMediaFileI18ns()
    {
        return $this->_mediaFileI18ns;
    }
        
    /**
     * @return array \jtl\Connector\Model\MediaFileAttr
     */
    public function getMediaFileAttrs()
    {
        return $this->_mediaFileAttrs;
    }
        
    /**
     * @return array \jtl\Connector\Model\SetArticle
     */
    public function getSetArticles()
    {
        return $this->_setArticles;
    }
        
    /**
     * @return array \jtl\Connector\Model\FileUpload
     */
    public function getFileUploads()
    {
        return $this->_fileUploads;
    }
        
    /**
     * @return array \jtl\Connector\Model\ProductWarehouseInfo
     */
    public function getProductWarehouseInfos()
    {
        return $this->_productWarehouseInfos;
    }
        
    /**
     * @return array \jtl\Connector\Model\ProductConfigGroup
     */
    public function getProductConfigGroups()
    {
        return $this->_productConfigGroups;
    }
        
    public $items = array(
        "product_file_download" => array("ProductFileDownload", "ProductFileDownloads"),
        "product" => array("Product", "Products"),
        "product_i18n" => array("ProductI18n", "ProductI18ns"),
        "product_price" => array("ProductPrice", "ProductPrices"),
        "product_special_price" => array("ProductSpecialPrice", "ProductSpecialPrices"),
        "product2_category" => array("Product2Category", "Product2Categories"),
        "product_attr" => array("ProductAttr", "ProductAttrs"),
        "product_attr_i18n" => array("ProductAttrI18n", "ProductAttrI18ns"),
        "product_function_attr" => array("ProductFunctionAttr", "ProductFunctionAttrs"),
        "product_variation" => array("ProductVariation", "ProductVariations"),
        "product_variation_i18n" => array("ProductVariationI18n", "ProductVariationI18ns"),
        "product_variation_visibility" => array("ProductVariationVisibility", "ProductVariationVisibilities"),
        "product_variation_value" => array("ProductVariationValue", "ProductVariationValues"),
        "product_variation_value_i18n" => array("ProductVariationValueI18n", "ProductVariationValueI18ns"),
        "product_variation_value_extra_charge" => array("ProductVariationValueExtraCharge", "ProductVariationValueExtraCharges"),
        "product_variation_value_visibility" => array("ProductVariationValueVisibility", "ProductVariationValueVisibilities"),
        "product_variation_value_dependency" => array("ProductVariationValueDependency", "ProductVariationValueDependencies"),
        "product_var_combination" => array("ProductVarCombination", "ProductVarCombinations"),
        "cross_selling" => array("CrossSelling", "CrossSellings"),
        "product_specific" => array("ProductSpecific", "ProductSpecifics"),
        "media_file" => array("MediaFile", "MediaFiles"),
        "media_file_i18n" => array("MediaFileI18n", "MediaFileI18ns"),
        "media_file_attr" => array("MediaFileAttr", "MediaFileAttrs"),
        "set_article" => array("SetArticle", "SetArticles"),
        "file_upload" => array("FileUpload", "FileUploads"),
        "product_warehouse_info" => array("ProductWarehouseInfo", "ProductWarehouseInfos"),
        "product_config_group" => array("ProductConfigGroup", "ProductConfigGroups")
    );
}
?>
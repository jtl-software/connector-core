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
     * @var \jtl\Connector\Model\fileDownload[]
     */
    protected $_fileDownloads;
    
    /**
     * @var \jtl\Connector\Model\product[]
     */
    protected $_products;
    
    /**
     * @var \jtl\Connector\Model\productI18n[]
     */
    protected $_productI18ns;
    
    /**
     * @var \jtl\Connector\Model\productPrice[]
     */
    protected $_productPrices;
    
    /**
     * @var \jtl\Connector\Model\productSpecialPrice[]
     */
    protected $_productSpecialPrices;
    
    /**
     * @var \jtl\Connector\Model\product2Category[]
     */
    protected $_product2Categories;
    
    /**
     * @var \jtl\Connector\Model\productAttr[]
     */
    protected $_productAttrs;
    
    /**
     * @var \jtl\Connector\Model\productAttrI18n[]
     */
    protected $_productAttrI18ns;
    
    /**
     * @var \jtl\Connector\Model\productVariation[]
     */
    protected $_productVariations;
    
    /**
     * @var \jtl\Connector\Model\productVariationI18n[]
     */
    protected $_productVariationI18ns;
    
    /**
     * @var \jtl\Connector\Model\productVariationVisibility[]
     */
    protected $_productVariationVisibilities;
    
    /**
     * @var \jtl\Connector\Model\productVariationValue[]
     */
    protected $_productVariationValues;
    
    /**
     * @var \jtl\Connector\Model\productVariationValueI18n[]
     */
    protected $_productVariationValueI18ns;
    
    /**
     * @var \jtl\Connector\Model\productVariationValueExtraCharge[]
     */
    protected $_productVariationValueExtraCharges;
    
    /**
     * @var \jtl\Connector\Model\productVariationValueVisibility[]
     */
    protected $_productVariationValueVisibilities;
    
    /**
     * @var \jtl\Connector\Model\productVariationValueDependency[]
     */
    protected $_productVariationValueDependencies;
    
    /**
     * @var \jtl\Connector\Model\productVarCombination[]
     */
    protected $_productVarCombinations;
    
    /**
     * @var \jtl\Connector\Model\crossSelling[]
     */
    protected $_crossSellings;
    
    /**
     * @var \jtl\Connector\Model\productSpecific[]
     */
    protected $_productSpecifics;
    
    /**
     * @var \jtl\Connector\Model\mediaFile[]
     */
    protected $_mediaFiles;
    
    /**
     * @var \jtl\Connector\Model\mediaFileI18n[]
     */
    protected $_mediaFileI18ns;
    
    /**
     * @var \jtl\Connector\Model\mediaFileAttr[]
     */
    protected $_mediaFileAttrs;
    
    /**
     * @var \jtl\Connector\Model\setArticle[]
     */
    protected $_setArticles;
    
    /**
     * @var \jtl\Connector\Model\fileUpload[]
     */
    protected $_fileUploads;
    
    /**
     * @var \jtl\Connector\Model\productWarehouseInfo[]
     */
    protected $_productWarehouseInfos;
    
    /**
     * @var \jtl\Connector\Model\productConfigGroup[]
     */
    protected $_productConfigGroups;
        
    /**
     * @return array \jtl\Connector\Model\fileDownload
     */
    public function getFileDownloads()
    {
        return $this->_fileDownloads;
    }
        
    /**
     * @return array \jtl\Connector\Model\product
     */
    public function getProducts()
    {
        return $this->_products;
    }
        
    /**
     * @return array \jtl\Connector\Model\productI18n
     */
    public function getProductI18ns()
    {
        return $this->_productI18ns;
    }
        
    /**
     * @return array \jtl\Connector\Model\productPrice
     */
    public function getProductPrices()
    {
        return $this->_productPrices;
    }
        
    /**
     * @return array \jtl\Connector\Model\productSpecialPrice
     */
    public function getProductSpecialPrices()
    {
        return $this->_productSpecialPrices;
    }
        
    /**
     * @return array \jtl\Connector\Model\product2Category
     */
    public function getProduct2Categories()
    {
        return $this->_product2Categories;
    }
        
    /**
     * @return array \jtl\Connector\Model\productAttr
     */
    public function getProductAttrs()
    {
        return $this->_productAttrs;
    }
        
    /**
     * @return array \jtl\Connector\Model\productAttrI18n
     */
    public function getProductAttrI18ns()
    {
        return $this->_productAttrI18ns;
    }
        
    /**
     * @return array \jtl\Connector\Model\productVariation
     */
    public function getProductVariations()
    {
        return $this->_productVariations;
    }
        
    /**
     * @return array \jtl\Connector\Model\productVariationI18n
     */
    public function getProductVariationI18ns()
    {
        return $this->_productVariationI18ns;
    }
        
    /**
     * @return array \jtl\Connector\Model\productVariationVisibility
     */
    public function getProductVariationVisibilities()
    {
        return $this->_productVariationVisibilities;
    }
        
    /**
     * @return array \jtl\Connector\Model\productVariationValue
     */
    public function getProductVariationValues()
    {
        return $this->_productVariationValues;
    }
        
    /**
     * @return array \jtl\Connector\Model\productVariationValueI18n
     */
    public function getProductVariationValueI18ns()
    {
        return $this->_productVariationValueI18ns;
    }
        
    /**
     * @return array \jtl\Connector\Model\productVariationValueExtraCharge
     */
    public function getProductVariationValueExtraCharges()
    {
        return $this->_productVariationValueExtraCharges;
    }
        
    /**
     * @return array \jtl\Connector\Model\productVariationValueVisibility
     */
    public function getProductVariationValueVisibilities()
    {
        return $this->_productVariationValueVisibilities;
    }
        
    /**
     * @return array \jtl\Connector\Model\productVariationValueDependency
     */
    public function getProductVariationValueDependencies()
    {
        return $this->_productVariationValueDependencies;
    }
        
    /**
     * @return array \jtl\Connector\Model\productVarCombination
     */
    public function getProductVarCombinations()
    {
        return $this->_productVarCombinations;
    }
        
    /**
     * @return array \jtl\Connector\Model\crossSelling
     */
    public function getCrossSellings()
    {
        return $this->_crossSellings;
    }
        
    /**
     * @return array \jtl\Connector\Model\productSpecific
     */
    public function getProductSpecifics()
    {
        return $this->_productSpecifics;
    }
        
    /**
     * @return array \jtl\Connector\Model\mediaFile
     */
    public function getMediaFiles()
    {
        return $this->_mediaFiles;
    }
        
    /**
     * @return array \jtl\Connector\Model\mediaFileI18n
     */
    public function getMediaFileI18ns()
    {
        return $this->_mediaFileI18ns;
    }
        
    /**
     * @return array \jtl\Connector\Model\mediaFileAttr
     */
    public function getMediaFileAttrs()
    {
        return $this->_mediaFileAttrs;
    }
        
    /**
     * @return array \jtl\Connector\Model\setArticle
     */
    public function getSetArticles()
    {
        return $this->_setArticles;
    }
        
    /**
     * @return array \jtl\Connector\Model\fileUpload
     */
    public function getFileUploads()
    {
        return $this->_fileUploads;
    }
        
    /**
     * @return array \jtl\Connector\Model\productWarehouseInfo
     */
    public function getProductWarehouseInfos()
    {
        return $this->_productWarehouseInfos;
    }
        
    /**
     * @return array \jtl\Connector\Model\productConfigGroup
     */
    public function getProductConfigGroups()
    {
        return $this->_productConfigGroups;
    }
        
    public $items = array(
        "filedownload" => array("FileDownload", "FileDownloads"),
        "product" => array("Product", "Products"),
        "producti18n" => array("ProductI18n", "ProductI18ns"),
        "productprice" => array("ProductPrice", "ProductPrices"),
        "productspecialprice" => array("ProductSpecialPrice", "ProductSpecialPrices"),
        "product2category" => array("Product2Categori", "Product2Categories"),
        "productattr" => array("ProductAttr", "ProductAttrs"),
        "productattri18n" => array("ProductAttrI18n", "ProductAttrI18ns"),
        "productvariation" => array("ProductVariation", "ProductVariations"),
        "productvariationi18n" => array("ProductVariationI18n", "ProductVariationI18ns"),
        "productvariationvisibility" => array("ProductVariationVisibiliti", "ProductVariationVisibilities"),
        "productvariationvalue" => array("ProductVariationValue", "ProductVariationValues"),
        "productvariationvaluei18n" => array("ProductVariationValueI18n", "ProductVariationValueI18ns"),
        "productvariationvalueextracharge" => array("ProductVariationValueExtraCharge", "ProductVariationValueExtraCharges"),
        "productvariationvaluevisibility" => array("ProductVariationValueVisibiliti", "ProductVariationValueVisibilities"),
        "productvariationvaluedependency" => array("ProductVariationValueDependenci", "ProductVariationValueDependencies"),
        "productvarcombination" => array("ProductVarCombination", "ProductVarCombinations"),
        "crossselling" => array("CrossSelling", "CrossSellings"),
        "productspecific" => array("ProductSpecific", "ProductSpecifics"),
        "mediafile" => array("MediaFile", "MediaFiles"),
        "mediafilei18n" => array("MediaFileI18n", "MediaFileI18ns"),
        "mediafileattr" => array("MediaFileAttr", "MediaFileAttrs"),
        "setarticle" => array("SetArticle", "SetArticles"),
        "fileupload" => array("FileUpload", "FileUploads"),
        "productwarehouseinfo" => array("ProductWarehouseInfo", "ProductWarehouseInfos"),
        "productconfiggroup" => array("ProductConfigGroup", "ProductConfigGroups")
    );
}
?>
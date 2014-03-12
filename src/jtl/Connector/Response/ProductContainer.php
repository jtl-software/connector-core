<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Response
 */

namespace jtl\Connector\Response;

/**
 * Product Response Container Class
 * @access public
 */
class ProductContainer
{
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $productFileDownloads;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $products;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $productI18ns;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $productPrices;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $productSpecialPrices;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $product2Categories;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $productAttrs;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $productAttrI18ns;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $productInvisibilities;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $productFunctionAttrs;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $productVariations;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $productVariationI18ns;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $productVariationInvisibilities;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $productVariationValues;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $productVariationValueI18ns;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $productVariationValueExtraCharges;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $productVariationValueInvisibilities;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $productVariationValueDependencies;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $productVarCombinations;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $crossSellings;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $productSpecifics;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $mediaFiles;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $mediaFileI18ns;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $mediaFileAttrs;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $setArticles;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $fileUploads;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $productWarehouseInfos;
    
    /**
     * @var \jtl\Connector\Response\Response[]
     */
    protected $productConfigGroups;
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getProductFileDownloads()
    {
        return $this->productFileDownloads;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addProductFileDownload(Response $response)
    {
        if ($this->productFileDownloads === null) {
            $this->productFileDownloads = array();
        }
        
        $this->productFileDownloads[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getProducts()
    {
        return $this->products;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addProduct(Response $response)
    {
        if ($this->products === null) {
            $this->products = array();
        }
        
        $this->products[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getProductI18ns()
    {
        return $this->productI18ns;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addProductI18n(Response $response)
    {
        if ($this->productI18ns === null) {
            $this->productI18ns = array();
        }
        
        $this->productI18ns[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getProductPrices()
    {
        return $this->productPrices;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addProductPrice(Response $response)
    {
        if ($this->productPrices === null) {
            $this->productPrices = array();
        }
        
        $this->productPrices[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getProductSpecialPrices()
    {
        return $this->productSpecialPrices;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addProductSpecialPrice(Response $response)
    {
        if ($this->productSpecialPrices === null) {
            $this->productSpecialPrices = array();
        }
        
        $this->productSpecialPrices[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getProduct2Categories()
    {
        return $this->product2Categories;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addProduct2Category(Response $response)
    {
        if ($this->product2Categories === null) {
            $this->product2Categories = array();
        }
        
        $this->product2Categories[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getProductAttrs()
    {
        return $this->productAttrs;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addProductAttr(Response $response)
    {
        if ($this->productAttrs === null) {
            $this->productAttrs = array();
        }
        
        $this->productAttrs[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getProductAttrI18ns()
    {
        return $this->productAttrI18ns;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addProductAttrI18n(Response $response)
    {
        if ($this->productAttrI18ns === null) {
            $this->productAttrI18ns = array();
        }
        
        $this->productAttrI18ns[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getProductInvisibilities()
    {
        return $this->productInvisibilities;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addProductInvisibility(Response $response)
    {
        if ($this->productInvisibilities === null) {
            $this->productInvisibilities = array();
        }
        
        $this->productInvisibilities[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getProductFunctionAttrs()
    {
        return $this->productFunctionAttrs;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addProductFunctionAttr(Response $response)
    {
        if ($this->productFunctionAttrs === null) {
            $this->productFunctionAttrs = array();
        }
        
        $this->productFunctionAttrs[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getProductVariations()
    {
        return $this->productVariations;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addProductVariation(Response $response)
    {
        if ($this->productVariations === null) {
            $this->productVariations = array();
        }
        
        $this->productVariations[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getProductVariationI18ns()
    {
        return $this->productVariationI18ns;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addProductVariationI18n(Response $response)
    {
        if ($this->productVariationI18ns === null) {
            $this->productVariationI18ns = array();
        }
        
        $this->productVariationI18ns[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getProductVariationInvisibilities()
    {
        return $this->productVariationInvisibilities;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addProductVariationInvisibility(Response $response)
    {
        if ($this->productVariationInvisibilities === null) {
            $this->productVariationInvisibilities = array();
        }
        
        $this->productVariationInvisibilities[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getProductVariationValues()
    {
        return $this->productVariationValues;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addProductVariationValue(Response $response)
    {
        if ($this->productVariationValues === null) {
            $this->productVariationValues = array();
        }
        
        $this->productVariationValues[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getProductVariationValueI18ns()
    {
        return $this->productVariationValueI18ns;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addProductVariationValueI18n(Response $response)
    {
        if ($this->productVariationValueI18ns === null) {
            $this->productVariationValueI18ns = array();
        }
        
        $this->productVariationValueI18ns[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getProductVariationValueExtraCharges()
    {
        return $this->productVariationValueExtraCharges;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addProductVariationValueExtraCharge(Response $response)
    {
        if ($this->productVariationValueExtraCharges === null) {
            $this->productVariationValueExtraCharges = array();
        }
        
        $this->productVariationValueExtraCharges[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getProductVariationValueInvisibilities()
    {
        return $this->productVariationValueInvisibilities;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addProductVariationValueInvisibility(Response $response)
    {
        if ($this->productVariationValueInvisibilities === null) {
            $this->productVariationValueInvisibilities = array();
        }
        
        $this->productVariationValueInvisibilities[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getProductVariationValueDependencies()
    {
        return $this->productVariationValueDependencies;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addProductVariationValueDependency(Response $response)
    {
        if ($this->productVariationValueDependencies === null) {
            $this->productVariationValueDependencies = array();
        }
        
        $this->productVariationValueDependencies[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getProductVarCombinations()
    {
        return $this->productVarCombinations;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addProductVarCombination(Response $response)
    {
        if ($this->productVarCombinations === null) {
            $this->productVarCombinations = array();
        }
        
        $this->productVarCombinations[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getCrossSellings()
    {
        return $this->crossSellings;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addCrossSelling(Response $response)
    {
        if ($this->crossSellings === null) {
            $this->crossSellings = array();
        }
        
        $this->crossSellings[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getProductSpecifics()
    {
        return $this->productSpecifics;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addProductSpecific(Response $response)
    {
        if ($this->productSpecifics === null) {
            $this->productSpecifics = array();
        }
        
        $this->productSpecifics[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getMediaFiles()
    {
        return $this->mediaFiles;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addMediaFile(Response $response)
    {
        if ($this->mediaFiles === null) {
            $this->mediaFiles = array();
        }
        
        $this->mediaFiles[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getMediaFileI18ns()
    {
        return $this->mediaFileI18ns;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addMediaFileI18n(Response $response)
    {
        if ($this->mediaFileI18ns === null) {
            $this->mediaFileI18ns = array();
        }
        
        $this->mediaFileI18ns[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getMediaFileAttrs()
    {
        return $this->mediaFileAttrs;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addMediaFileAttr(Response $response)
    {
        if ($this->mediaFileAttrs === null) {
            $this->mediaFileAttrs = array();
        }
        
        $this->mediaFileAttrs[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getSetArticles()
    {
        return $this->setArticles;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addSetArticle(Response $response)
    {
        if ($this->setArticles === null) {
            $this->setArticles = array();
        }
        
        $this->setArticles[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getFileUploads()
    {
        return $this->fileUploads;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addFileUpload(Response $response)
    {
        if ($this->fileUploads === null) {
            $this->fileUploads = array();
        }
        
        $this->fileUploads[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getProductWarehouseInfos()
    {
        return $this->productWarehouseInfos;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addProductWarehouseInfo(Response $response)
    {
        if ($this->productWarehouseInfos === null) {
            $this->productWarehouseInfos = array();
        }
        
        $this->productWarehouseInfos[] = $response;
    }
        
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function getProductConfigGroups()
    {
        return $this->productConfigGroups;
    }
    
    /**
     * @return array \jtl\Connector\Response\Response
     */
    public function addProductConfigGroup(Response $response)
    {
        if ($this->productConfigGroups === null) {
            $this->productConfigGroups = array();
        }
        
        $this->productConfigGroups[] = $response;
    }
    
}
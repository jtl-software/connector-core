<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\ModelAdapter
 */

namespace jtl\Connector\ModelAdapter;

use \jtl\Core\ModelAdapter\IModelAdapter;
use \jtl\Connector\Model;
use \jtl\Core\Exception\DatabaseException;

/**
 * Product Adapter Class
 * @access public
 */
class ProductAdapter implements IModelAdapter
{
    /**
     * @var \jtl\Connector\Model\fileDownload
     */
    protected $_fileDownload;
    
    /**
     * @var \jtl\Connector\Model\product
     */
    protected $_product;
    
    /**
     * @var \jtl\Connector\Model\productI18n
     */
    protected $_productI18n;
    
    /**
     * @var \jtl\Connector\Model\productPrice
     */
    protected $_productPrice;
    
    /**
     * @var \jtl\Connector\Model\productSpecialPrice
     */
    protected $_productSpecialPrice;
    
    /**
     * @var \jtl\Connector\Model\product2Category
     */
    protected $_product2Category;
    
    /**
     * @var \jtl\Connector\Model\productAttr
     */
    protected $_productAttr;
    
    /**
     * @var \jtl\Connector\Model\productAttrI18n
     */
    protected $_productAttrI18n;
    
    /**
     * @var \jtl\Connector\Model\productVariation
     */
    protected $_productVariation;
    
    /**
     * @var \jtl\Connector\Model\productVariationI18n
     */
    protected $_productVariationI18n;
    
    /**
     * @var \jtl\Connector\Model\productVariationVisibility
     */
    protected $_productVariationVisibility;
    
    /**
     * @var \jtl\Connector\Model\productVariationValue
     */
    protected $_productVariationValue;
    
    /**
     * @var \jtl\Connector\Model\productVariationValueI18n
     */
    protected $_productVariationValueI18n;
    
    /**
     * @var \jtl\Connector\Model\productVariationValueExtraCharge
     */
    protected $_productVariationValueExtraCharge;
    
    /**
     * @var \jtl\Connector\Model\productVariationValueVisibility
     */
    protected $_productVariationValueVisibility;
    
    /**
     * @var \jtl\Connector\Model\productVariationValueDependency
     */
    protected $_productVariationValueDependency;
    
    /**
     * @var \jtl\Connector\Model\productVarCombination
     */
    protected $_productVarCombination;
    
    /**
     * @var \jtl\Connector\Model\crossSelling
     */
    protected $_crossSelling;
    
    /**
     * @var \jtl\Connector\Model\productSpecific
     */
    protected $_productSpecific;
    
    /**
     * @var \jtl\Connector\Model\mediaFile
     */
    protected $_mediaFile;
    
    /**
     * @var \jtl\Connector\Model\mediaFileI18n
     */
    protected $_mediaFileI18n;
    
    /**
     * @var \jtl\Connector\Model\mediaFileAttr
     */
    protected $_mediaFileAttr;
    
    /**
     * @var \jtl\Connector\Model\setArticle
     */
    protected $_setArticle;
    
    /**
     * @var \jtl\Connector\Model\fileUpload
     */
    protected $_fileUpload;
    
    /**
     * @var \jtl\Connector\Model\productWarehouseInfo
     */
    protected $_productWarehouseInfo;
    
    /**
     * @var \jtl\Connector\Model\productConfigGroup
     */
    protected $_productConfigGroup;
        
    /**
     * @return \jtl\Connector\Model\fileDownload
     */
    public function getFileDownload()
    {
        return $this->_fileDownload;
    }    
    /**
     * @return \jtl\Connector\Model\product
     */
    public function getProduct()
    {
        return $this->_product;
    }    
    /**
     * @return \jtl\Connector\Model\productI18n
     */
    public function getProductI18n()
    {
        return $this->_productI18n;
    }    
    /**
     * @return \jtl\Connector\Model\productPrice
     */
    public function getProductPrice()
    {
        return $this->_productPrice;
    }    
    /**
     * @return \jtl\Connector\Model\productSpecialPrice
     */
    public function getProductSpecialPrice()
    {
        return $this->_productSpecialPrice;
    }    
    /**
     * @return \jtl\Connector\Model\product2Category
     */
    public function getProduct2Category()
    {
        return $this->_product2Category;
    }    
    /**
     * @return \jtl\Connector\Model\productAttr
     */
    public function getProductAttr()
    {
        return $this->_productAttr;
    }    
    /**
     * @return \jtl\Connector\Model\productAttrI18n
     */
    public function getProductAttrI18n()
    {
        return $this->_productAttrI18n;
    }    
    /**
     * @return \jtl\Connector\Model\productVariation
     */
    public function getProductVariation()
    {
        return $this->_productVariation;
    }    
    /**
     * @return \jtl\Connector\Model\productVariationI18n
     */
    public function getProductVariationI18n()
    {
        return $this->_productVariationI18n;
    }    
    /**
     * @return \jtl\Connector\Model\productVariationVisibility
     */
    public function getProductVariationVisibility()
    {
        return $this->_productVariationVisibility;
    }    
    /**
     * @return \jtl\Connector\Model\productVariationValue
     */
    public function getProductVariationValue()
    {
        return $this->_productVariationValue;
    }    
    /**
     * @return \jtl\Connector\Model\productVariationValueI18n
     */
    public function getProductVariationValueI18n()
    {
        return $this->_productVariationValueI18n;
    }    
    /**
     * @return \jtl\Connector\Model\productVariationValueExtraCharge
     */
    public function getProductVariationValueExtraCharge()
    {
        return $this->_productVariationValueExtraCharge;
    }    
    /**
     * @return \jtl\Connector\Model\productVariationValueVisibility
     */
    public function getProductVariationValueVisibility()
    {
        return $this->_productVariationValueVisibility;
    }    
    /**
     * @return \jtl\Connector\Model\productVariationValueDependency
     */
    public function getProductVariationValueDependency()
    {
        return $this->_productVariationValueDependency;
    }    
    /**
     * @return \jtl\Connector\Model\productVarCombination
     */
    public function getProductVarCombination()
    {
        return $this->_productVarCombination;
    }    
    /**
     * @return \jtl\Connector\Model\crossSelling
     */
    public function getCrossSelling()
    {
        return $this->_crossSelling;
    }    
    /**
     * @return \jtl\Connector\Model\productSpecific
     */
    public function getProductSpecific()
    {
        return $this->_productSpecific;
    }    
    /**
     * @return \jtl\Connector\Model\mediaFile
     */
    public function getMediaFile()
    {
        return $this->_mediaFile;
    }    
    /**
     * @return \jtl\Connector\Model\mediaFileI18n
     */
    public function getMediaFileI18n()
    {
        return $this->_mediaFileI18n;
    }    
    /**
     * @return \jtl\Connector\Model\mediaFileAttr
     */
    public function getMediaFileAttr()
    {
        return $this->_mediaFileAttr;
    }    
    /**
     * @return \jtl\Connector\Model\setArticle
     */
    public function getSetArticle()
    {
        return $this->_setArticle;
    }    
    /**
     * @return \jtl\Connector\Model\fileUpload
     */
    public function getFileUpload()
    {
        return $this->_fileUpload;
    }    
    /**
     * @return \jtl\Connector\Model\productWarehouseInfo
     */
    public function getProductWarehouseInfo()
    {
        return $this->_productWarehouseInfo;
    }    
    /**
     * @return \jtl\Connector\Model\productConfigGroup
     */
    public function getProductConfigGroup()
    {
        return $this->_productConfigGroup;
    }
    
    public $items = array(
        "filedownload" => "FileDownload",
        "product" => "Product",
        "producti18n" => "ProductI18n",
        "productprice" => "ProductPrice",
        "productspecialprice" => "ProductSpecialPrice",
        "product2category" => "Product2Category",
        "productattr" => "ProductAttr",
        "productattri18n" => "ProductAttrI18n",
        "productvariation" => "ProductVariation",
        "productvariationi18n" => "ProductVariationI18n",
        "productvariationvisibility" => "ProductVariationVisibility",
        "productvariationvalue" => "ProductVariationValue",
        "productvariationvaluei18n" => "ProductVariationValueI18n",
        "productvariationvalueextracharge" => "ProductVariationValueExtraCharge",
        "productvariationvaluevisibility" => "ProductVariationValueVisibility",
        "productvariationvaluedependency" => "ProductVariationValueDependency",
        "productvarcombination" => "ProductVarCombination",
        "crossselling" => "CrossSelling",
        "productspecific" => "ProductSpecific",
        "mediafile" => "MediaFile",
        "mediafilei18n" => "MediaFileI18n",
        "mediafileattr" => "MediaFileAttr",
        "setarticle" => "SetArticle",
        "fileupload" => "FileUpload",
        "productwarehouseinfo" => "ProductWarehouseInfo",
        "productconfiggroup" => "ProductConfigGroup"
    );
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\ModelAdapter\IModelAdapter::add()
     */
    public function add($type, $object)
    {
        $type = strtolower($type);
        if (isset($this->items[$type])) {
            $type = $this->items[$type];
            $class = "\\jtl\\Connector\\Model\\{$type}";
            if (class_exists($class)) {
                $model = new $type();
                $model->setOptions($object);
                $setter = "_" . lcfirst($type);

                $this->$setter = $model;
                
                return true;
            }
        }

        return false;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\ModelAdapter\IModelAdapter::insert()
     */
    public function insert()
    {
        foreach ($this->items as $item) {
            $getter = "_" . lcfirst($item);
            $mapper = "{$item}Mapper";
            $mapper = $mapper::getInstance();
            $result = $mapper->deleteSave($this->$getter);

            if ($result->getErrno() > 0) {
                throw new DatabaseException($result->getError(), $result->getErrno());
            }
        }
    }

    /**
     * (non-PHPdoc)
     * @see \jtl\Core\ModelAdapter\IModelAdapter::isComplete()
     */
    public function isComplete()
    {
        $complete = true;
        foreach ($this->items as $item) {
            $getter = "_" . lcfirst($item);
            if ($this->$getter === null) {
                $complete = false;
                break;
            }
        }

        return $complete;
    }
}
?>
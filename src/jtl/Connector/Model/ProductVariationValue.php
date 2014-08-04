<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Product variation value model. Each product defines its own variations and variation values. .
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ProductVariationValue extends DataModel
{
    /**
     * @var Identity Unique productVariationValue id
     */
    protected $id = null;

    /**
     * @var Identity Reference to productVariation
     */
    protected $productVariationId = null;

    /**
     * @var double Optional variation extra weight
     */
    protected $extraWeight = 0.0;

    /**
     * @var string Optional Stock Keeping Unit
     */
    protected $sku = '';

    /**
     * @var int Optional sort number
     */
    protected $sort = 0;

    /**
     * @var double Optional stock level
     */
    protected $stockLevel = 0.0;

    /**
     * @var \jtl\Connector\Model\ProductVariationValueInvisibility[]
     */
    protected $invisibilities = array();

    /**
     * @var \jtl\Connector\Model\ProductVariationValueI18n[]
     */
    protected $i18ns = array();

    /**
     * @var \jtl\Connector\Model\ProductVariationValueExtraCharge[]
     */
    protected $extraCharges = array();

    /**
     * @var \jtl\Connector\Model\ProductVariationValueDependency[]
     */
    protected $dependencies = array();

    /**
     * @param  Identity $id Unique productVariationValue id
     * @return \jtl\Connector\Model\ProductVariationValue
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity Unique productVariationValue id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $productVariationId Reference to productVariation
     * @return \jtl\Connector\Model\ProductVariationValue
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationId(Identity $productVariationId)
    {
        return $this->setProperty('productVariationId', $productVariationId, 'Identity');
    }

    /**
     * @return Identity Reference to productVariation
     */
    public function getProductVariationId()
    {
        return $this->productVariationId;
    }

    /**
     * @param  double $extraWeight Optional variation extra weight
     * @return \jtl\Connector\Model\ProductVariationValue
     * @throws \InvalidArgumentException if the provided argument is not of type 'double'.
     */
    public function setExtraWeight($extraWeight)
    {
        return $this->setProperty('extraWeight', $extraWeight, 'double');
    }

    /**
     * @return double Optional variation extra weight
     */
    public function getExtraWeight()
    {
        return $this->extraWeight;
    }

    /**
     * @param  string $sku Optional Stock Keeping Unit
     * @return \jtl\Connector\Model\ProductVariationValue
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setSku($sku)
    {
        return $this->setProperty('sku', $sku, 'string');
    }

    /**
     * @return string Optional Stock Keeping Unit
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param  int $sort Optional sort number
     * @return \jtl\Connector\Model\ProductVariationValue
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('sort', $sort, 'int');
    }

    /**
     * @return int Optional sort number
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param  double $stockLevel Optional stock level
     * @return \jtl\Connector\Model\ProductVariationValue
     * @throws \InvalidArgumentException if the provided argument is not of type 'double'.
     */
    public function setStockLevel($stockLevel)
    {
        return $this->setProperty('stockLevel', $stockLevel, 'double');
    }

    /**
     * @return double Optional stock level
     */
    public function getStockLevel()
    {
        return $this->stockLevel;
    }

    /**
     * @param  \jtl\Connector\Model\ProductVariationValueInvisibility $invisibilities
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function addInvisibility(\jtl\Connector\Model\ProductVariationValueInvisibility $invisibility)
    {
        $this->invisibilities[] = $invisibility;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\ProductVariationValueInvisibility[]
     */
    public function getInvisibilities()
    {
        return $this->invisibilities;
    }

    /**
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function clearInvisibilities()
    {
        $this->invisibilities = array();
        return $this;
    }
    /**
     * @param  \jtl\Connector\Model\ProductVariationValueI18n $i18ns
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function addI18n(\jtl\Connector\Model\ProductVariationValueI18n $i18n)
    {
        $this->i18ns[] = $i18ns;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\ProductVariationValueI18n[]
     */
    public function getI18ns()
    {
        return $this->i18ns;
    }

    /**
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function clearI18ns()
    {
        $this->i18ns = array();
        return $this;
    }
    /**
     * @param  \jtl\Connector\Model\ProductVariationValueExtraCharge $extraCharges
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function addExtraCharge(\jtl\Connector\Model\ProductVariationValueExtraCharge $extraCharge)
    {
        $this->extraCharges[] = $extraCharge;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\ProductVariationValueExtraCharge[]
     */
    public function getExtraCharges()
    {
        return $this->extraCharges;
    }

    /**
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function clearExtraCharges()
    {
        $this->extraCharges = array();
        return $this;
    }
    /**
     * @param  \jtl\Connector\Model\ProductVariationValueDependency $dependencies
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function addDependency(\jtl\Connector\Model\ProductVariationValueDependency $dependency)
    {
        $this->dependencies[] = $dependency;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\ProductVariationValueDependency[]
     */
    public function getDependencies()
    {
        return $this->dependencies;
    }

    /**
     * @return \jtl\Connector\Model\ProductVariationValue
     */
    public function clearDependencies()
    {
        $this->dependencies = array();
        return $this;
    }
 
}

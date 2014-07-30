<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * ProductVariation Model. Each product defines its own variations, that means  variations are not global  in contrast to specifics. .
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ProductVariation extends DataModel
{
    /**
     * @type Identity Unique productVariation id
     */
    protected $id = null;

    /**
     * @type Identity Reference to product
     */
    protected $productId = null;

    /**
     * @type string 
     */
    protected $cName = '';

    /**
     * @type boolean 
     */
    protected $isActive = false;

    /**
     * @type boolean 
     */
    protected $isSelectable = false;

    /**
     * @type integer|null Optional sort number
     */
    protected $sort = 0;

    /**
     * @type string Variation type e.g. radio or select
     */
    protected $type = '';

    /**
     * Nav [ProductVariation » One]
     *
     * @type \jtl\Connector\Model\ProductVariationI18n[]
     */
    protected $i18ns = array();

    /**
     * Nav [ProductVariation » One]
     *
     * @type \jtl\Connector\Model\ProductVariationInvisibility[]
     */
    protected $invisibilities = array();

    /**
     * Nav [ProductVariation » One]
     *
     * @type \jtl\Connector\Model\ProductVariationValue[]
     */
    protected $values = array();


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'id',
        'productId',
    );

    /**
     * @type array list of propertyInfo
     */
    protected $propertyInfos = array(
        'sort' => 'integer',
        'type' => 'string',
        'cName' => 'string',
        'id' => '\jtl\Connector\Model\Identity',
        'productId' => '\jtl\Connector\Model\Identity',
        'isSelectable' => 'boolean',
        'isActive' => 'boolean',
        'i18ns' => '\jtl\Connector\Model\ProductVariationI18n',
        'invisibilities' => '\jtl\Connector\Model\ProductVariationInvisibility',
        'values' => '\jtl\Connector\Model\ProductVariationValue',
    );


    /**
     * @param  integer $sort Optional sort number
     * @return \jtl\Connector\Model\ProductVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('sort', $sort, 'integer');
    }
    
    /**
     * @return integer Optional sort number
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param  string $type Variation type e.g. radio or select
     * @return \jtl\Connector\Model\ProductVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setType($type)
    {
        return $this->setProperty('type', $type, 'string');
    }
    
    /**
     * @return string Variation type e.g. radio or select
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param  string $cName 
     * @return \jtl\Connector\Model\ProductVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCName($cName)
    {
        return $this->setProperty('cName', $cName, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCName()
    {
        return $this->cName;
    }

    /**
     * @param  Identity $id Unique productVariation id
     * @return \jtl\Connector\Model\ProductVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique productVariation id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $productId Reference to product
     * @return \jtl\Connector\Model\ProductVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('productId', $productId, 'Identity');
    }
    
    /**
     * @return Identity Reference to product
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param  boolean $isSelectable 
     * @return \jtl\Connector\Model\ProductVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsSelectable($isSelectable)
    {
        return $this->setProperty('isSelectable', $isSelectable, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getIsSelectable()
    {
        return $this->isSelectable;
    }

    /**
     * @param  boolean $isActive 
     * @return \jtl\Connector\Model\ProductVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsActive($isActive)
    {
        return $this->setProperty('isActive', $isActive, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param  \jtl\Connector\Model\ProductVariationI18n $i18n
     * @return \jtl\Connector\Model\ProductVariation
     */
    public function addI18n(\jtl\Connector\Model\ProductVariationI18n $i18n)
    {
        $this->i18ns[] = $i18n;
        return $this;
    }
    
    /**
     * @return ProductVariationI18n
     */
    public function getI18ns()
    {
        return $this->i18ns;
    }

    /**
     * @return \jtl\Connector\Model\ProductVariation
     */
    public function clearI18ns()
    {
        $this->i18ns = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ProductVariationInvisibility $invisibility
     * @return \jtl\Connector\Model\ProductVariation
     */
    public function addInvisibility(\jtl\Connector\Model\ProductVariationInvisibility $invisibility)
    {
        $this->invisibilities[] = $invisibility;
        return $this;
    }
    
    /**
     * @return ProductVariationInvisibility
     */
    public function getInvisibilities()
    {
        return $this->invisibilities;
    }

    /**
     * @return \jtl\Connector\Model\ProductVariation
     */
    public function clearInvisibilities()
    {
        $this->invisibilities = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ProductVariationValue $value
     * @return \jtl\Connector\Model\ProductVariation
     */
    public function addValue(\jtl\Connector\Model\ProductVariationValue $value)
    {
        $this->values[] = $value;
        return $this;
    }
    
    /**
     * @return ProductVariationValue
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @return \jtl\Connector\Model\ProductVariation
     */
    public function clearValues()
    {
        $this->values = array();
        return $this;
    }
}


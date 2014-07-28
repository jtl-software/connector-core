<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * ToDo: Remove (deprecated).
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ProductVariationValueDependency extends DataModel
{
    /**
     * @type Identity 
     */
    protected $id = null;

    /**
     * @type Identity 
     */
    protected $productVariationValueId = null;

    /**
     * @type Identity 
     */
    protected $productVariationValueTargetId = null;


    /**
     * @type array list of identities
     */
    public $identities = array(
        'id',
        'productVariationValueId',
        'productVariationValueTargetId',
    );

    /**
     * @type array list of navigations
     */
    public $navigations = array(
    );

    /**
     * @return array 
     */
    public function getIdentities()
    {
        return $this->identities;
    }

    /**
     * @return array 
     */
    public function getNavigations()
    {
        return $this->navigations;
    }

    /**
     * @param  Identity $id 
     * @return \jtl\Connector\Model\ProductVariationValueDependency
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $productVariationValueId 
     * @return \jtl\Connector\Model\ProductVariationValueDependency
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationValueId(Identity $productVariationValueId)
    {
        return $this->setProperty('productVariationValueId', $productVariationValueId, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getProductVariationValueId()
    {
        return $this->productVariationValueId;
    }

    /**
     * @param  Identity $productVariationValueTargetId 
     * @return \jtl\Connector\Model\ProductVariationValueDependency
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductVariationValueTargetId(Identity $productVariationValueTargetId)
    {
        return $this->setProperty('productVariationValueTargetId', $productVariationValueTargetId, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getProductVariationValueTargetId()
    {
        return $this->productVariationValueTargetId;
    }
}


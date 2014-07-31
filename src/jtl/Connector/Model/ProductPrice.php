<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * .
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ProductPrice extends DataModel
{
    /**
     * @type Identity 
     */
    protected $customerGroupId = null;

    /**
     * @type Identity 
     */
    protected $productId = null;

    /**
     * @type float 
     */
    protected $netPrice = 0.0;

    /**
     * @type integer 
     */
    protected $quantity = 0;


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'customerGroupId',
        'productId',
    );

    /**
     * @param  Identity $customerGroupId 
     * @return \jtl\Connector\Model\ProductPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerGroupId(Identity $customerGroupId)
    {
        return $this->setProperty('customerGroupId', $customerGroupId, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getCustomerGroupId()
    {
        return $this->customerGroupId;
    }

    /**
     * @param  Identity $productId 
     * @return \jtl\Connector\Model\ProductPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('productId', $productId, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param  float $netPrice 
     * @return \jtl\Connector\Model\ProductPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setNetPrice($netPrice)
    {
        return $this->setProperty('netPrice', $netPrice, 'float');
    }
    
    /**
     * @return float 
     */
    public function getNetPrice()
    {
        return $this->netPrice;
    }

    /**
     * @param  integer $quantity 
     * @return \jtl\Connector\Model\ProductPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setQuantity($quantity)
    {
        return $this->setProperty('quantity', $quantity, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
}


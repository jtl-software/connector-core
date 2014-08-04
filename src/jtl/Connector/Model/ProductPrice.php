<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Product price properties..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ProductPrice extends DataModel
{
    /**
     * @type Identity Reference to customerGroup
     */
    protected $customerGroupId = null;

    /**
     * @type Identity Reference to product
     */
    protected $productId = null;

    /**
     * @type double Price value (net)
     */
    protected $netPrice = 0.0;

    /**
     * @type int Optional quantity to apply netPrice for. Default 1 for default price. A quantity value of 3 means that the given product price will be applied when a customer buys 3 or more items. 
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
     * @param  Identity $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\ProductPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerGroupId(Identity $customerGroupId)
    {
        return $this->setProperty('CustomerGroupId', $customerGroupId, 'Identity');
    }

    /**
     * @return Identity Reference to customerGroup
     */
    public function getCustomerGroupId()
    {
        return $this->customerGroupId;
    }

    /**
     * @param  Identity $productId Reference to product
     * @return \jtl\Connector\Model\ProductPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('ProductId', $productId, 'Identity');
    }

    /**
     * @return Identity Reference to product
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param  double $netPrice Price value (net)
     * @return \jtl\Connector\Model\ProductPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setNetPrice(Identity $netPrice)
    {
        return $this->setProperty('NetPrice', $netPrice, 'double');
    }

    /**
     * @return double Price value (net)
     */
    public function getNetPrice()
    {
        return $this->netPrice;
    }

    /**
     * @param  int $quantity Optional quantity to apply netPrice for. Default 1 for default price. A quantity value of 3 means that the given product price will be applied when a customer buys 3 or more items. 
     * @return \jtl\Connector\Model\ProductPrice
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setQuantity(Identity $quantity)
    {
        return $this->setProperty('Quantity', $quantity, 'int');
    }

    /**
     * @return int Optional quantity to apply netPrice for. Default 1 for default price. A quantity value of 3 means that the given product price will be applied when a customer buys 3 or more items. 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

 
}

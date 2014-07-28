<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Define set articles / parts lists. .
 *
 * @access public
 * @package jtl\Connector\Model
 */
class SetArticle extends DataModel
{
    /**
     * @type Identity Unique setArticle id, referenced by product.setArticleId
     */
    protected $id = null;

    /**
     * @type Identity Reference to a component / product
     */
    protected $productId = null;

    /**
     * @type float Component quantity
     */
    protected $quantity = 0.0;


    /**
     * @type array list of identities
     */
    public $identities = array(
        'id',
        'productId',
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
     * @param  float $quantity Component quantity
     * @return \jtl\Connector\Model\SetArticle
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setQuantity($quantity)
    {
        return $this->setProperty('quantity', $quantity, 'float');
    }
    
    /**
     * @return float Component quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param  Identity $id Unique setArticle id, referenced by product.setArticleId
     * @return \jtl\Connector\Model\SetArticle
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique setArticle id, referenced by product.setArticleId
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $productId Reference to a component / product
     * @return \jtl\Connector\Model\SetArticle
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('productId', $productId, 'Identity');
    }
    
    /**
     * @return Identity Reference to a component / product
     */
    public function getProductId()
    {
        return $this->productId;
    }
}


<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

/**
 * Define set articles / parts lists. 
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 */
class SetArticle extends DataModel
{
    /**
     * @var Identity Unique setArticle id, referenced by product.setArticleId
     */
    protected $_id = null;
    
    /**
     * @var Identity Reference to a component / product
     */
    protected $_productId = null;
    
    /**
     * @var double Component quantity
     */
    protected $_quantity = 0.0;
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_id',
        '_productId'
    );
    
    /**
     * SetArticle Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            if ($value === null) {
                $this->$name = null;
                return;
            }
        
            switch ($name) {
                case "_id":
                case "_productId":
                
                    $this->$name = Identity::convert($value);
                    break;
            
                case "_quantity":
                
                    $this->$name = (double)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $id Unique setArticle id, referenced by product.setArticleId
     * @return \jtl\Connector\Model\SetArticle
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique setArticle id, referenced by product.setArticleId
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param Identity $productId Reference to a component / product
     * @return \jtl\Connector\Model\SetArticle
     */
    public function setProductId(Identity $productId)
    {
        $this->_productId = $productId;
        return $this;
    }
    
    /**
     * @return Identity Reference to a component / product
     */
    public function getProductId()
    {
        return $this->_productId;
    }
    /**
     * @param double $quantity Component quantity
     * @return \jtl\Connector\Model\SetArticle
     */
    public function setQuantity($quantity)
    {
        $this->_quantity = (double)$quantity;
        return $this;
    }
    
    /**
     * @return double Component quantity
     */
    public function getQuantity()
    {
        return $this->_quantity;
    }
}
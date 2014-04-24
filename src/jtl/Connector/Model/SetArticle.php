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
 * @subpackage Product
 */
class SetArticle extends DataModel
{
    /**
     * @var string Unique setArticle id, referenced by product.setArticleId
     */
    protected $_id = '';
    
    /**
     * @var string Reference to a component / product
     */
    protected $_productId = '';
    
    /**
     * @var double Component quantity
     */
    protected $_quantity = 0.0;
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
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
                
                    $this->$name = (string)$value;
                    break;
            
                case "_quantity":
                
                    $this->$name = (double)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id Unique setArticle id, referenced by product.setArticleId
     * @return \jtl\Connector\Model\SetArticle
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string Unique setArticle id, referenced by product.setArticleId
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param string $productId Reference to a component / product
     * @return \jtl\Connector\Model\SetArticle
     */
    public function setProductId($productId)
    {
        $this->_productId = (string)$productId;
        return $this;
    }
    
    /**
     * @return string Reference to a component / product
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
<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * SetArticle Model
 * @access public
 */
abstract class SetArticle extends Model
{
    /**
     * @var 
     */
    protected $_id;
    
    /**
     * @var 
     */
    protected $_productId;
    
    /**
     * @var 
     */
    protected $_quantity;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\SetArticle
     */
    public function setId($id)
    {
        $this->_id = ()$id;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param  $productId
     * @return \jtl\Connector\Model\SetArticle
     */
    public function setProductId($productId)
    {
        $this->_productId = ()$productId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getProductId()
    {
        return $this->_productId;
    }
    
    /**
     * @param  $quantity
     * @return \jtl\Connector\Model\SetArticle
     */
    public function setQuantity($quantity)
    {
        $this->_quantity = ()$quantity;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getQuantity()
    {
        return $this->_quantity;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/setArticle/setArticle.json", $this->getPublic(array()));
    }
}
?>
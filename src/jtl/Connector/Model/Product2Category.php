<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * Product2Category Model
 * @access public
 */
abstract class Product2Category extends Model
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_categoryId;
    
    /**
     * @var int
     */
    protected $_productId;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\Product2Category
     */
    public function setId($id)
    {
        $this->_id = (int)$id;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param int $categoryId
     * @return \jtl\Connector\Model\Product2Category
     */
    public function setCategoryId($categoryId)
    {
        $this->_categoryId = (int)$categoryId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getCategoryId()
    {
        return $this->_categoryId;
    }
    
    /**
     * @param int $productId
     * @return \jtl\Connector\Model\Product2Category
     */
    public function setProductId($productId)
    {
        $this->_productId = (int)$productId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getProductId()
    {
        return $this->_productId;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/product2category/product2category.json", $this->getPublic(array()));
    }
}
?>
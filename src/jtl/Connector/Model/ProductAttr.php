<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * ProductAttr Model
 * @access public
 */
abstract class ProductAttr extends Model
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
    protected $_sort;
    
    /**
     * @var 
     */
    protected $_isVisible;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\ProductAttr
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
     * @return \jtl\Connector\Model\ProductAttr
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
     * @param  $sort
     * @return \jtl\Connector\Model\ProductAttr
     */
    public function setSort($sort)
    {
        $this->_sort = ()$sort;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getSort()
    {
        return $this->_sort;
    }
    
    /**
     * @param  $isVisible
     * @return \jtl\Connector\Model\ProductAttr
     */
    public function setIsVisible($isVisible)
    {
        $this->_isVisible = ()$isVisible;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getIsVisible()
    {
        return $this->_isVisible;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/ProductAttr/ProductAttr.json", $this->getPublic(array()));
    }
}
?>
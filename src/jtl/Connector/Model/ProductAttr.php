<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductAttr Model
 * @access public
 */
abstract class ProductAttr extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_productId;
    
    /**
     * @var int
     */
    protected $_sort;
    
    /**
     * @var double
     */
    protected $_isVisible;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\ProductAttr
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
     * @param int $productId
     * @return \jtl\Connector\Model\ProductAttr
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
     * @param int $sort
     * @return \jtl\Connector\Model\ProductAttr
     */
    public function setSort($sort)
    {
        $this->_sort = (int)$sort;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getSort()
    {
        return $this->_sort;
    }
    /**
     * @param double $isVisible
     * @return \jtl\Connector\Model\ProductAttr
     */
    public function setIsVisible($isVisible)
    {
        $this->_isVisible = (double)$isVisible;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getIsVisible()
    {
        return $this->_isVisible;
    }
}
?>
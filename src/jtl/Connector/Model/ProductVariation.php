<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductVariation Model
 * @access public
 */
abstract class ProductVariation extends DataModel
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
     * @var string
     */
    protected $_name;
    
    /**
     * @var string
     */
    protected $_isSelectable;
    
    /**
     * @var string
     */
    protected $_type;
    
    /**
     * @var int
     */
    protected $_sort;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\ProductVariation
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
     * @return \jtl\Connector\Model\ProductVariation
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
     * @param string $name
     * @return \jtl\Connector\Model\ProductVariation
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }
    /**
     * @param string $isSelectable
     * @return \jtl\Connector\Model\ProductVariation
     */
    public function setIsSelectable($isSelectable)
    {
        $this->_isSelectable = (string)$isSelectable;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getIsSelectable()
    {
        return $this->_isSelectable;
    }
    /**
     * @param string $type
     * @return \jtl\Connector\Model\ProductVariation
     */
    public function setType($type)
    {
        $this->_type = (string)$type;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getType()
    {
        return $this->_type;
    }
    /**
     * @param int $sort
     * @return \jtl\Connector\Model\ProductVariation
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
}
?>
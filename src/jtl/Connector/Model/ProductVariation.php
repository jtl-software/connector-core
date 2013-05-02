<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * ProductVariation Model
 * @access public
 */
abstract class ProductVariation extends Model
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
     * @var int
     */
    protected $_name;
    
    /**
     * @var 
     */
    protected $_isSelectable;
    
    /**
     * @var 
     */
    protected $_type;
    
    /**
     * @var 
     */
    protected $_sort;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\ProductVariation
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
     * @return \jtl\Connector\Model\ProductVariation
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
     * @param int $name
     * @return \jtl\Connector\Model\ProductVariation
     */
    public function setName($name)
    {
        $this->_name = (int)$name;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getName()
    {
        return $this->_name;
    }
    
    /**
     * @param  $isSelectable
     * @return \jtl\Connector\Model\ProductVariation
     */
    public function setIsSelectable($isSelectable)
    {
        $this->_isSelectable = ()$isSelectable;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getIsSelectable()
    {
        return $this->_isSelectable;
    }
    
    /**
     * @param  $type
     * @return \jtl\Connector\Model\ProductVariation
     */
    public function setType($type)
    {
        $this->_type = ()$type;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getType()
    {
        return $this->_type;
    }
    
    /**
     * @param  $sort
     * @return \jtl\Connector\Model\ProductVariation
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
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/ProductVariation/ProductVariation.json", $this->getPublic(array()));
    }
}
?>
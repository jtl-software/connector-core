<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * ProductConfigGroup Model
 * @access public
 */
abstract class ProductConfigGroup extends Model
{
    /**
     * @var int
     */
    protected $_configGroupId;
    
    /**
     * @var int
     */
    protected $_productId;
    
    /**
     * @var int
     */
    protected $_sort;
    
    /**
     * @param int $configGroupId
     * @return \jtl\Connector\Model\ProductConfigGroup
     */
    public function setConfigGroupId($configGroupId)
    {
        $this->_configGroupId = (int)$configGroupId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getConfigGroupId()
    {
        return $this->_configGroupId;
    }
    
    /**
     * @param int $productId
     * @return \jtl\Connector\Model\ProductConfigGroup
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
     * @return \jtl\Connector\Model\ProductConfigGroup
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
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/ProductConfigGroup/ProductConfigGroup.json", $this->getPublic(array()));
    }
}
?>
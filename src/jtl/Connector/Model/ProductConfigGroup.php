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
     * @var string
     */
    protected $_configGroupId;
    
    /**
     * @var 
     */
    protected $_productId;
    
    /**
     * @var 
     */
    protected $_sort;
    
    /**
     * @param string $configGroupId
     * @return \jtl\Connector\Model\ProductConfigGroup
     */
    public function setConfigGroupId($configGroupId)
    {
        $this->_configGroupId = (string)$configGroupId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getConfigGroupId()
    {
        return $this->_configGroupId;
    }
    
    /**
     * @param  $productId
     * @return \jtl\Connector\Model\ProductConfigGroup
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
     * @return \jtl\Connector\Model\ProductConfigGroup
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
        Schema::validateModel(CONNECTOR_DIR . "schema/ProductConfigGroup/ProductConfigGroup.json", $this->getPublic(array()));
    }
}
?>
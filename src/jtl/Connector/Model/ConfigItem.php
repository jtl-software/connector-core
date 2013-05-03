<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ConfigItem Model
 * @access public
 */
abstract class ConfigItem extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
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
    protected $_type;
    
    /**
     * @var bool
     */
    protected $_isPreSelected;
    
    /**
     * @var bool
     */
    protected $_isRecommended;
    
    /**
     * @var bool
     */
    protected $_useProductName;
    
    /**
     * @var bool
     */
    protected $_useProductPrice;
    
    /**
     * @var bool
     */
    protected $_showDiscount;
    
    /**
     * @var bool
     */
    protected $_showSurcharge;
    
    /**
     * @var bool
     */
    protected $_ignoreMultiplier;
    
    /**
     * @var double
     */
    protected $_minQuantity;
    
    /**
     * @var double
     */
    protected $_maxQuantity;
    
    /**
     * @var double
     */
    protected $_initialQuantity;
    
    /**
     * @var int
     */
    protected $_sort;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\ConfigItem
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
     * @param int $configGroupId
     * @return \jtl\Connector\Model\ConfigItem
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
     * @return \jtl\Connector\Model\ConfigItem
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
     * @param int $type
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setType($type)
    {
        $this->_type = (int)$type;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getType()
    {
        return $this->_type;
    }
    /**
     * @param bool $isPreSelected
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setIsPreSelected($isPreSelected)
    {
        $this->_isPreSelected = (bool)$isPreSelected;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getIsPreSelected()
    {
        return $this->_isPreSelected;
    }
    /**
     * @param bool $isRecommended
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setIsRecommended($isRecommended)
    {
        $this->_isRecommended = (bool)$isRecommended;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getIsRecommended()
    {
        return $this->_isRecommended;
    }
    /**
     * @param bool $useProductName
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setUseProductName($useProductName)
    {
        $this->_useProductName = (bool)$useProductName;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getUseProductName()
    {
        return $this->_useProductName;
    }
    /**
     * @param bool $useProductPrice
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setUseProductPrice($useProductPrice)
    {
        $this->_useProductPrice = (bool)$useProductPrice;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getUseProductPrice()
    {
        return $this->_useProductPrice;
    }
    /**
     * @param bool $showDiscount
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setShowDiscount($showDiscount)
    {
        $this->_showDiscount = (bool)$showDiscount;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getShowDiscount()
    {
        return $this->_showDiscount;
    }
    /**
     * @param bool $showSurcharge
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setShowSurcharge($showSurcharge)
    {
        $this->_showSurcharge = (bool)$showSurcharge;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getShowSurcharge()
    {
        return $this->_showSurcharge;
    }
    /**
     * @param bool $ignoreMultiplier
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setIgnoreMultiplier($ignoreMultiplier)
    {
        $this->_ignoreMultiplier = (bool)$ignoreMultiplier;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getIgnoreMultiplier()
    {
        return $this->_ignoreMultiplier;
    }
    /**
     * @param double $minQuantity
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setMinQuantity($minQuantity)
    {
        $this->_minQuantity = (double)$minQuantity;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getMinQuantity()
    {
        return $this->_minQuantity;
    }
    /**
     * @param double $maxQuantity
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setMaxQuantity($maxQuantity)
    {
        $this->_maxQuantity = (double)$maxQuantity;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getMaxQuantity()
    {
        return $this->_maxQuantity;
    }
    /**
     * @param double $initialQuantity
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setInitialQuantity($initialQuantity)
    {
        $this->_initialQuantity = (double)$initialQuantity;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getInitialQuantity()
    {
        return $this->_initialQuantity;
    }
    /**
     * @param int $sort
     * @return \jtl\Connector\Model\ConfigItem
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
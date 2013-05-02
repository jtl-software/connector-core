<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * ConfigItem Model
 * @access public
 */
abstract class ConfigItem extends Model
{
    /**
     * @var 
     */
    protected $_id;
    
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
    protected $_type;
    
    /**
     * @var 
     */
    protected $_isPreSelected;
    
    /**
     * @var 
     */
    protected $_isRecommended;
    
    /**
     * @var 
     */
    protected $_useProductName;
    
    /**
     * @var 
     */
    protected $_useProductPrice;
    
    /**
     * @var 
     */
    protected $_showDiscount;
    
    /**
     * @var 
     */
    protected $_showSurcharge;
    
    /**
     * @var 
     */
    protected $_ignoreMultiplier;
    
    /**
     * @var 
     */
    protected $_minQuantity;
    
    /**
     * @var 
     */
    protected $_maxQuantity;
    
    /**
     * @var 
     */
    protected $_initialQuantity;
    
    /**
     * @var 
     */
    protected $_sort;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\ConfigItem
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
     * @param string $configGroupId
     * @return \jtl\Connector\Model\ConfigItem
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
     * @return \jtl\Connector\Model\ConfigItem
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
     * @param  $type
     * @return \jtl\Connector\Model\ConfigItem
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
     * @param  $isPreSelected
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setIsPreSelected($isPreSelected)
    {
        $this->_isPreSelected = ()$isPreSelected;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getIsPreSelected()
    {
        return $this->_isPreSelected;
    }
    
    /**
     * @param  $isRecommended
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setIsRecommended($isRecommended)
    {
        $this->_isRecommended = ()$isRecommended;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getIsRecommended()
    {
        return $this->_isRecommended;
    }
    
    /**
     * @param  $useProductName
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setUseProductName($useProductName)
    {
        $this->_useProductName = ()$useProductName;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getUseProductName()
    {
        return $this->_useProductName;
    }
    
    /**
     * @param  $useProductPrice
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setUseProductPrice($useProductPrice)
    {
        $this->_useProductPrice = ()$useProductPrice;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getUseProductPrice()
    {
        return $this->_useProductPrice;
    }
    
    /**
     * @param  $showDiscount
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setShowDiscount($showDiscount)
    {
        $this->_showDiscount = ()$showDiscount;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getShowDiscount()
    {
        return $this->_showDiscount;
    }
    
    /**
     * @param  $showSurcharge
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setShowSurcharge($showSurcharge)
    {
        $this->_showSurcharge = ()$showSurcharge;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getShowSurcharge()
    {
        return $this->_showSurcharge;
    }
    
    /**
     * @param  $ignoreMultiplier
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setIgnoreMultiplier($ignoreMultiplier)
    {
        $this->_ignoreMultiplier = ()$ignoreMultiplier;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getIgnoreMultiplier()
    {
        return $this->_ignoreMultiplier;
    }
    
    /**
     * @param  $minQuantity
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setMinQuantity($minQuantity)
    {
        $this->_minQuantity = ()$minQuantity;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getMinQuantity()
    {
        return $this->_minQuantity;
    }
    
    /**
     * @param  $maxQuantity
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setMaxQuantity($maxQuantity)
    {
        $this->_maxQuantity = ()$maxQuantity;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getMaxQuantity()
    {
        return $this->_maxQuantity;
    }
    
    /**
     * @param  $initialQuantity
     * @return \jtl\Connector\Model\ConfigItem
     */
    public function setInitialQuantity($initialQuantity)
    {
        $this->_initialQuantity = ()$initialQuantity;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getInitialQuantity()
    {
        return $this->_initialQuantity;
    }
    
    /**
     * @param  $sort
     * @return \jtl\Connector\Model\ConfigItem
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
        Schema::validateModel(CONNECTOR_DIR . "schema/ConfigItem/ConfigItem.json", $this->getPublic(array()));
    }
}
?>
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
     * ConfigItem Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_id":
            case "_configGroupId":
            case "_productId":
            case "_type":
            case "_sort":
            
                $this->$name = (int)$value;
                break;
        
            case "_isPreSelected":
            case "_isRecommended":
            case "_useProductName":
            case "_useProductPrice":
            case "_showDiscount":
            case "_showSurcharge":
            case "_ignoreMultiplier":
            
                $this->$name = (bool)$value;
                break;
        
            case "_minQuantity":
            case "_maxQuantity":
            case "_initialQuantity":
            
                $this->$name = (double)$value;
                break;
        
        }
    }
    
    /**
     * ConfigItem Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>
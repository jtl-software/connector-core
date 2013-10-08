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
class ConfigItem extends DataModel
{
    /**
     * @var string
     */
    protected $_id = '';
    
    /**
     * @var string
     */
    protected $_configGroupId = '';
    
    /**
     * @var string
     */
    protected $_productId = '';
    
    /**
     * @var int
     */
    protected $_type = 0;
    
    /**
     * @var bool
     */
    protected $_isPreSelected = false;
    
    /**
     * @var bool
     */
    protected $_isRecommended = false;
    
    /**
     * @var bool
     */
    protected $_inheritProductName = false;
    
    /**
     * @var bool
     */
    protected $_inheritProductPrice = false;
    
    /**
     * @var bool
     */
    protected $_showDiscount = True;
    
    /**
     * @var bool
     */
    protected $_showSurcharge = False;
    
    /**
     * @var bool
     */
    protected $_ignoreMultiplier = False;
    
    /**
     * @var double
     */
    protected $_minQuantity = 0;
    
    /**
     * @var double
     */
    protected $_maxQuantity = 0;
    
    /**
     * @var double
     */
    protected $_initialQuantity = 1;
    
    /**
     * @var int
     */
    protected $_sort = 0;
    
    /**
     * ConfigItem Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if ($value === null) {
            $this->$name = null;
            return;
        }
        
        switch ($name) {
            case "_id":
            case "_configGroupId":
            case "_productId":
            
                $this->$name = (string)$value;
                break;
        
            case "_type":
            case "_sort":
            
                $this->$name = (int)$value;
                break;
        
            case "_isPreSelected":
            case "_isRecommended":
            case "_inheritProductName":
            case "_inheritProductPrice":
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
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}
?>
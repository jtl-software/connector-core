<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ConfigItem Model
 * A config Item that is displayed in a config Group. 
Config item can reference to a specific productId to inherit price, name and description. 
 *
 * @access public
 */
class ConfigItem extends DataModel
{
    /**
     * @var string - Unique id
     */
    protected $_id = "0";
    
    /**
     * @var string - Required reference to config group id
     */
    protected $_configGroupId = "0";
    
    /**
     * @var string - Optional reference to a productId
     */
    protected $_productId = "0";
    
    /**
     * @var int - Config item type. 0: Product, 1: Special
     */
    protected $_type = 0;
    
    /**
     * @var bool - Preselect configItem
     */
    protected $_isPreSelected = false;
    
    /**
     * @var bool - Highlight or recommend config item
     */
    protected $_isRecommended = false;
    
    /**
     * @var bool - Inherit product name and description  if productId is set
     */
    protected $_inheritProductName = false;
    
    /**
     * @var bool - Inherit product price of referenced productId
     */
    protected $_inheritProductPrice = false;
    
    /**
     * @var bool - Show discount compared to productId price
     */
    protected $_showDiscount = True;
    
    /**
     * @var bool - Show surcharge compared to productId price
     */
    protected $_showSurcharge = False;
    
    /**
     * @var bool - Ignore multiplier. Quantity of config item will not be increased if product quantity is increased
     */
    protected $_ignoreMultiplier = False;
    
    /**
     * @var double - Minimum quantity required to add configItem
     */
    protected $_minQuantity = 0;
    
    /**
     * @var double - Maximum allowed quantity
     */
    protected $_maxQuantity = 0;
    
    /**
     * @var double - Initial / predefined quantity
     */
    protected $_initialQuantity = 1;
    
    /**
     * @var int - Sort order number
     */
    protected $_sort = 0;
    
    /**
     * @var double - Value added tax
     */
    protected $_vat = 0.0;
    
    /**
     * ConfigItem Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
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
                case "_vat":
                
                    $this->$name = (double)$value;
                    break;
            
            }
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
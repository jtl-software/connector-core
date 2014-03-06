<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ConfigItem Model
 * A config Item that is displayed in a config Group. Config item can reference to a specific productId to inherit price, name and description. 
 *
 * @access public
 */
class ConfigItem extends DataModel
{
    /**
     * @var string - Unique configItem id
     */
    protected $_id = '';
    
    /**
     * @var string - Reference to configGroup
     */
    protected $_configGroupId = '';
    
    /**
     * @var string - Optional reference to product
     */
    protected $_productId = '';
    
    /**
     * @var int - Config item type. 0: Product, 1: Special
     */
    protected $_type = 0;
    
    /**
     * @var bool - Optional: Preselect configItem. If true, configItem will be preselected or prechecked.
     */
    protected $_isPreSelected = false;
    
    /**
     * @var bool - Optional: Highlight or recommend config item. If true, configItem will be recommended/highlighted. 
     */
    protected $_isRecommended = false;
    
    /**
     * @var bool - Optional: Inherit product name and description  if productId is set. If true, configItem name will be received from referenced product and configItemI18n name will be ignored. 
     */
    protected $_inheritProductName = false;
    
    /**
     * @var bool - Optional: Inherit product price of referenced productId. If true, configItem price will be the same as referenced product price. 
     */
    protected $_inheritProductPrice = false;
    
    /**
     * @var bool - Optional: Show discount compared to productId price. If true, the discount compared to referenct product price will be shown.
     */
    protected $_showDiscount = True;
    
    /**
     * @var bool - Optional: Show surcharge compared to productId price.
     */
    protected $_showSurcharge = False;
    
    /**
     * @var bool - Optional:Ignore multiplier. If true, quantity of config item will not be increased if product quantity is increased
     */
    protected $_ignoreMultiplier = False;
    
    /**
     * @var double - Optional minimum quantity required to add configItem. Default 0 for no minimum quantity. 
     */
    protected $_minQuantity = 0;
    
    /**
     * @var double - Maximum allowed quantity. Default 0 for no maximum limit. 
     */
    protected $_maxQuantity = 0;
    
    /**
     * @var double - Optional initial / predefined quantity. Default is one (1) quantity piece. 
     */
    protected $_initialQuantity = 1;
    
    /**
     * @var int - Optional sort order number
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
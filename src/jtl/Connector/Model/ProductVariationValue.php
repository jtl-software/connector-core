<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductVariationValue Model
 * Product variation value model. Each product defines its own variations and variation values. 
 *
 * @access public
 */
class ProductVariationValue extends DataModel
{
    /**
     * @var string - Unique productVariationValue id
     */
    protected $_id = "0";
    
    /**
     * @var string - Reference to productVariation
     */
    protected $_productVariationId = "0";
    
    /**
     * @var double - Variation extra weight
     */
    protected $_extraWeight = 0.0;
    
    /**
     * @var string - Stock Keeping Unit
     */
    protected $_sku = '';
    
    /**
     * @var int - Sort number
     */
    protected $_sort = 0;
    
    /**
     * @var double - Stock level
     */
    protected $_stockLevel = 0.0;
    
    /**
     * @var string - ToDo:Remove (deprecated)
     */
    protected $_packagingUnitId = "0";
    
    /**
     * ProductVariationValue Setter
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
                case "_productVariationId":
                case "_sku":
                case "_packagingUnitId":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_extraWeight":
                case "_stockLevel":
                
                    $this->$name = (double)$value;
                    break;
            
                case "_sort":
                
                    $this->$name = (int)$value;
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
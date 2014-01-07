<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CustomerOrderItemVariation Model
 * customer order item variation
 *
 * @access public
 */
class CustomerOrderItemVariation extends DataModel
{
    /**
     * @var string - Unique customerOrderItemVariation id
     */
    protected $_id = '';
    
    /**
     * @var string - Reference to customerOrderItem
     */
    protected $_customerOrderItemId = '';
    
    /**
     * @var string - Reference to productVariation
     */
    protected $_productVariationId = '';
    
    /**
     * @var string - Reference to productVariationValue
     */
    protected $_productVariationValueId = '';
    
    /**
     * @var string - Variation name e.g. "color"
     */
    protected $_productVariationName = '';
    
    /**
     * @var string - Variation value e.g. "red"
     */
    protected $_productVariationValueName = '';
    
    /**
     * @var string - Optional custom text value for variation 
     */
    protected $_freeField = '';
    
    /**
     * @var double - Optional extra surcharge (added to item price)
     */
    protected $_surcharge = 0;
    
    /**
     * CustomerOrderItemVariation Setter
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
                case "_customerOrderItemId":
                case "_productVariationId":
                case "_productVariationValueId":
                case "_productVariationName":
                case "_productVariationValueName":
                case "_freeField":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_surcharge":
                
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
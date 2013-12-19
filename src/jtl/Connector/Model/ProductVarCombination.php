<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductVarCombination Model
 * Product to productVariationValue Allocation
 *
 * @access public
 */
class ProductVarCombination extends DataModel
{
    /**
     * @var string - Reference to product
     */
    protected $_productId = "0";
    
    /**
     * @var string - Reference to productVariation
     */
    protected $_productVariationId = "0";
    
    /**
     * @var string - Reference to productVariationValue
     */
    protected $_productVariationValueId = "0";
    
    /**
     * ProductVarCombination Setter
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
                case "_productId":
                case "_productVariationId":
                case "_productVariationValueId":
                
                    $this->$name = (string)$value;
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
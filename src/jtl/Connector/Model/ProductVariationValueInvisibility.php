<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductVariationValueInvisibility Model
 * Specify productVariationValue to hide from specific customerGroup.
 *
 * @access public
 */
class ProductVariationValueInvisibility extends DataModel
{
    /**
     * @var string - Reference to customerGroup
     */
    protected $_customerGroupId = "0";
    
    /**
     * @var string - Reference to productVariationValue to hide from customerGroup
     */
    protected $_productVariationValueId = "0";
    
    /**
     * ProductVariationValueInvisibility Setter
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
                case "_customerGroupId":
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
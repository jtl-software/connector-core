<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductVariationValueExtraCharge Model
 * Extra charge for productVariationValue per customerGroup.
 *
 * @access public
 */
class ProductVariationValueExtraCharge extends DataModel
{
    /**
     * @var string - Reference to customerGroup
     */
    protected $_customerGroupId = '';
    
    /**
     * @var string - Reference to productVariationValue
     */
    protected $_productVariationValueId = '';
    
    /**
     * @var double - Extra charge (net)
     */
    protected $_extraChargeNet = 0.0;
    
    /**
     * ProductVariationValueExtraCharge Setter
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
            
                case "_extraChargeNet":
                
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
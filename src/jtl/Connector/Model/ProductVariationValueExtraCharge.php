<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductVariationValueExtraCharge Model
 * @access public
 */
abstract class ProductVariationValueExtraCharge extends DataModel
{
    /**
     * @var int
     */
    protected $_customerGroupId = 0;
    
    /**
     * @var int
     */
    protected $_productVariationValueId = 0;
    
    /**
     * @var double
     */
    protected $_extraChargeNet;
    
    /**
     * ProductVariationValueExtraCharge Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_customerGroupId":
            case "_productVariationValueId":
            
                $this->$name = (int)$value;
                break;
        
            case "_extraChargeNet":
            
                $this->$name = (double)$value;
                break;
        
        }
    }
    
    /**
     * ProductVariationValueExtraCharge Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>
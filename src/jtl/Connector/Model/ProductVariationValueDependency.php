<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductVariationValueDependency Model
 * @access public
 */
class ProductVariationValueDependency extends DataModel
{
    /**
     * @var int
     */
    protected $_productVariationValueId = 0;
    
    /**
     * @var int
     */
    protected $_productVariationValueTargetId;
    
    /**
     * ProductVariationValueDependency Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_productVariationValueId":
            case "_productVariationValueTargetId":
            
                $this->$name = (int)$value;
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
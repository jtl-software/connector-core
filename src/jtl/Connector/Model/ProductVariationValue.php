<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductVariationValue Model
 * @access public
 */
class ProductVariationValue extends DataModel
{
    /**
     * @var string
     */
    protected $_id = '';
    
    /**
     * @var string
     */
    protected $_productVariationId = '';
    
    /**
     * @var double
     */
    protected $_extraWeight = 0.0;
    
    /**
     * @var string
     */
    protected $_sku = '';
    
    /**
     * @var int
     */
    protected $_sort = 0;
    
    /**
     * @var double
     */
    protected $_stockLevel = 0.0;
    
    /**
     * @var string
     */
    protected $_packagingUnitId = '';
    
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
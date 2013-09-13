<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductVariationValueI18n Model
 * @access public
 */
class ProductVariationValueI18n extends DataModel
{
    /**
     * @var string
     */
    protected $_localeName;
    
    /**
     * @var int
     */
    protected $_productVariationValueId = 0;
    
    /**
     * @var string
     */
    protected $_name = "0";
    
    /**
     * ProductVariationValueI18n Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if ($value === null) {
            $this->$name = null;
            return;
        }
        
        switch ($name) {
            case "_localeName":
            case "_name":
            
                if (strlen(trim($value)) > 0) {
                    $this->$name = (string)$value;
                }
                break;
        
            case "_productVariationValueId":
            
                if (is_numeric($value)) {
                    $this->$name = (int)$value;                
                }
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
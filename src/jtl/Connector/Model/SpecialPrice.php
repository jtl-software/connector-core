<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * SpecialPrice Model
 * @access public
 */
class SpecialPrice extends DataModel
{
    /**
     * @var string
     */
    protected $_customerGroupId = '';
    
    /**
     * @var string
     */
    protected $_productSpecialPriceId = '';
    
    /**
     * @var double
     */
    protected $_priceNet = 0.0;
    
    /**
     * SpecialPrice Setter
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
                case "_productSpecialPriceId":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_priceNet":
                
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
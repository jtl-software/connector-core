<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * TaxRate Model
 * Tax rate model (set in JTL-Wawi ERP)
 *
 * @access public
 */
class TaxRate extends DataModel
{
    /**
     * @var string - Unique taxRate id
     */
    protected $_id = "0";
    
    /**
     * @var string - Reference to taxZone
     */
    protected $_taxZoneId = "0";
    
    /**
     * @var string - Reference to taxClass
     */
    protected $_taxClassId = "0";
    
    /**
     * @var double - Tax rate value e.g. 19.00
     */
    protected $_rate = 0.0;
    
    /**
     * @var int - Higher priority value means higher priority
     */
    protected $_priority = 0;
    
    /**
     * TaxRate Setter
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
                case "_taxZoneId":
                case "_taxClassId":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_rate":
                
                    $this->$name = (double)$value;
                    break;
            
                case "_priority":
                
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
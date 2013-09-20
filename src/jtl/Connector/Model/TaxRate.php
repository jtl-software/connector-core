<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * TaxRate Model
 * @access public
 */
class TaxRate extends DataModel
{
    /**
     * @var int
     */
    protected $_id = 0;
    
    /**
     * @var int
     */
    protected $_taxZoneId;
    
    /**
     * @var int
     */
    protected $_taxClassId;
    
    /**
     * @var double
     */
    protected $_rate;
    
    /**
     * @var int
     */
    protected $_priority;
    
    /**
     * TaxRate Setter
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
            case "_id":
            case "_taxZoneId":
            case "_taxClassId":
            case "_priority":
            
                $this->$name = (int)$value;
                break;
        
            case "_rate":
            
                $this->$name = (double)$value;
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
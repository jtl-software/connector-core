<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * DeliveryNotePos Model
 * @access public
 */
class DeliveryNotePos extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_orderPosition;
    
    /**
     * @var double
     */
    protected $_quantity;
    
    /**
     * @var int
     */
    protected $_stock;
    
    /**
     * @var string
     */
    protected $_serialNumber;
    
    /**
     * @var string
     */
    protected $_batchNumber;
    
    /**
     * @var string
     */
    protected $_bestBefore;
    
    /**
     * DeliveryNotePos Setter
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
            case "_orderPosition":
            case "_stock":
            
                if (is_numeric($value)) {
                    $this->$name = (int)$value;                
                }
                break;
        
            case "_quantity":
            
                if (is_numeric($value)) {
                    $this->$name = (double)$value;                
                }
                break;
        
            case "_serialNumber":
            case "_batchNumber":
            case "_bestBefore":
            
                if (strlen(trim($value)) > 0) {
                    $this->$name = (string)$value;
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
<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * DeliveryNotePos Model
 * 
 *
 * @access public
 */
class DeliveryNotePos extends DataModel
{
    /**
     * @var string
     */
    protected $_id = "0";
    
    /**
     * @var int
     */
    protected $_orderPosition = 0;
    
    /**
     * @var double
     */
    protected $_quantity = 0.0;
    
    /**
     * @var int
     */
    protected $_stock = 0;
    
    /**
     * @var string
     */
    protected $_serialNumber = '';
    
    /**
     * @var string
     */
    protected $_batchNumber = '';
    
    /**
     * @var string
     */
    protected $_bestBefore = '';
    
    /**
     * DeliveryNotePos Setter
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
                case "_serialNumber":
                case "_batchNumber":
                case "_bestBefore":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_orderPosition":
                case "_stock":
                
                    $this->$name = (int)$value;
                    break;
            
                case "_quantity":
                
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
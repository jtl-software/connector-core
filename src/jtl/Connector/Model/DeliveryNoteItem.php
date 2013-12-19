<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * DeliveryNoteItem Model
 * Delivery note item model
 *
 * @access public
 */
class DeliveryNoteItem extends DataModel
{
    /**
     * @var string - Unique deliveryNoteItem id
     */
    protected $_id = "0";
    
    /**
     * @var string - Reference to customerOrderItem
     */
    protected $_customerOrderItemId = '';
    
    /**
     * @var double - Quantity delivered
     */
    protected $_quantity = 0.0;
    
    /**
     * @var string - Reference to warehouse
     */
    protected $_warehouseId = '';
    
    /**
     * @var string - Serial number
     */
    protected $_serialNumber = '';
    
    /**
     * @var string - Batch number
     */
    protected $_batchNumber = '';
    
    /**
     * @var string - Best before date
     */
    protected $_bestBefore = '';
    
    /**
     * @var string - Reference to deliveryNote
     */
    protected $_deliveryNoteId = '';
    
    /**
     * DeliveryNoteItem Setter
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
                case "_customerOrderItemId":
                case "_warehouseId":
                case "_serialNumber":
                case "_batchNumber":
                case "_bestBefore":
                case "_deliveryNoteId":
                
                    $this->$name = (string)$value;
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
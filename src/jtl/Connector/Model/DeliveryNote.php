<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * DeliveryNote Model
 * A delivery note created for shipment.
 *
 * @access public
 */
class DeliveryNote extends DataModel
{
    /**
     * @var string - Unique deliveryNote id
     */
    protected $_id = '';
    
    /**
     * @var string - Reference to customerOrder
     */
    protected $_customerOrderId = '';
    
    /**
     * @var string - Optional text note
     */
    protected $_note = '';
    
    /**
     * @var string - Creation date
     */
    protected $_created = '';
    
    /**
     * @var bool - Optional flag for fulfillment. True, if delivery ist fulfilled by someone else
     */
    protected $_isFulfillment = false;
    
    /**
     * @var int - Delivery status
     */
    protected $_status = 0;
    
    /**
     * DeliveryNote Setter
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
                case "_customerOrderId":
                case "_note":
                case "_created":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_isFulfillment":
                
                    $this->$name = (bool)$value;
                    break;
            
                case "_status":
                
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
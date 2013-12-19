<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Shipment Model
 * Shipment Model with reference to a deliveryNote
 *
 * @access public
 */
class Shipment extends DataModel
{
    /**
     * @var string - Unique shipment id
     */
    protected $_id = "0";
    
    /**
     * @var string - Reference to deliveryNote
     */
    protected $_deliveryNoteId = "0";
    
    /**
     * @var string - Logistic name
     */
    protected $_logistic = '';
    
    /**
     * @var string - Logistic URL
     */
    protected $_logisticURL = '';
    
    /**
     * @var string - Identcode
     */
    protected $_identCode = '';
    
    /**
     * @var string - Creation date
     */
    protected $_created = '';
    
    /**
     * @var string - Shipment note
     */
    protected $_note = '';
    
    /**
     * Shipment Setter
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
                case "_deliveryNoteId":
                case "_logistic":
                case "_logisticURL":
                case "_identCode":
                case "_created":
                case "_note":
                
                    $this->$name = (string)$value;
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
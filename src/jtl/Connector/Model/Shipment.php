<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Shipment Model
 * 
 *
 * @access public
 */
class Shipment extends DataModel
{
    /**
     * @var string
     */
    protected $_id = "0";
    
    /**
     * @var string
     */
    protected $_deliveryNoteId = "0";
    
    /**
     * @var string
     */
    protected $_logistic = '';
    
    /**
     * @var string
     */
    protected $_logisticURL = '';
    
    /**
     * @var string
     */
    protected $_identCode = '';
    
    /**
     * @var int
     */
    protected $_created = 0;
    
    /**
     * @var string
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
                case "_note":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_created":
                
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
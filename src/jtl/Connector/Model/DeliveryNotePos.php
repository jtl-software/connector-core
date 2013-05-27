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
        switch ($name) {
            case "_id":
            case "_orderPosition":
            case "_stock":
            
                $this->$name = (int)$value;
                break;
        
            case "_quantity":
            
                $this->$name = (double)$value;
                break;
        
            case "_serialNumber":
            case "_batchNumber":
            case "_bestBefore":
            
                $this->$name = (string)$value;
                break;
        
        }
    }
    
    /**
     * DeliveryNotePos Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
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
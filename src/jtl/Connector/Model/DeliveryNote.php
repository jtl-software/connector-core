<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * DeliveryNote Model
 * @access public
 */
abstract class DeliveryNote extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_customerOrderId;
    
    /**
     * @var string
     */
    protected $_note;
    
    /**
     * @var string
     */
    protected $_created;
    
    /**
     * @var int
     */
    protected $_fulfillment;
    
    /**
     * @var int
     */
    protected $_status;
    
    /**
     * DeliveryNote Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_id":
            case "_customerOrderId":
            case "_fulfillment":
            case "_status":
            
                $this->$name = (int)$value;
                break;
        
            case "_note":
            case "_created":
            
                $this->$name = (string)$value;
                break;
        
        }
    }
    
    /**
     * DeliveryNote Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>
<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * SpecificValue Model
 * Specific value model, e.g. color value "red"
 *
 * @access public
 */
class SpecificValue extends DataModel
{
    /**
     * @var string - Unique specificValue id
     */
    protected $_id = "0";
    
    /**
     * @var string - Reference to specificId
     */
    protected $_specificId = "0";
    
    /**
     * @var int - Sort number
     */
    protected $_sort = 0;
    
    /**
     * SpecificValue Setter
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
                case "_specificId":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_sort":
                
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
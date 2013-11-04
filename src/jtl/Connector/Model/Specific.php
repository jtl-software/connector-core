<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Specific Model
 * 
 *
 * @access public
 */
class Specific extends DataModel
{
    /**
     * @var string
     */
    protected $_id = "0";
    
    /**
     * @var int
     */
    protected $_sort = 0;
    
    /**
     * @var int
     */
    protected $_global = 0;
    
    /**
     * @var string
     */
    protected $_type = '';
    
    /**
     * Specific Setter
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
                case "_type":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_sort":
                case "_global":
                
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
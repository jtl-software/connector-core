<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Manufacturer Model
 * Manufacturer / brand properties. 
 *
 * @access public
 */
class Manufacturer extends DataModel
{
    /**
     * @var string - Unique manufacturer id
     */
    protected $_id = '';
    
    /**
     * @var string - Manufacturer (brand) name
     */
    protected $_name = '';
    
    /**
     * @var string - Optional manufacturer website URL
     */
    protected $_www = '';
    
    /**
     * @var int - Optional sort number
     */
    protected $_sort = 0;
    
    /**
     * @var string - Optional url path e.g. "Products-manufactured-by-X"
     */
    protected $_urlPath = '';
    
    /**
     * Manufacturer Setter
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
                case "_name":
                case "_www":
                case "_urlPath":
                
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
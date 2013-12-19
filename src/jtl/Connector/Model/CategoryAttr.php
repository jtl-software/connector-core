<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CategoryAttr Model
 * Localized category attribute
 *
 * @access public
 */
class CategoryAttr extends DataModel
{
    /**
     * @var string - Unique categoryAttr id
     */
    protected $_id = "0";
    
    /**
     * @var string - Reference to category
     */
    protected $_categoryId = "0";
    
    /**
     * @var int - Sort number
     */
    protected $_sort = 0;
    
    /**
     * CategoryAttr Setter
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
                case "_categoryId":
                
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
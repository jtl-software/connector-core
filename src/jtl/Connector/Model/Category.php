<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Category Model
 * A category with sort number, link to parent category and level
 *
 * @access public
 */
class Category extends DataModel
{
    /**
     * @var string - Unique category id
     */
    protected $_id = '';
    
    /**
     * @var string - Optional reference to parent category id
     */
    protected $_parentCategoryId = "0";
    
    /**
     * @var int - Optional sort order number
     */
    protected $_sort = 0;
    
    /**
     * @var int - Optional category level (default 1 for first level)
     */
    protected $_level = 1;
    
    /**
     * Category Setter
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
                case "_parentCategoryId":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_sort":
                case "_level":
                
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
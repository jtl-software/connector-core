<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * SetArticle Model
 * Define set articles / parts lists. 

 *
 * @access public
 */
class SetArticle extends DataModel
{
    /**
     * @var string - Unique setArticle id
     */
    protected $_id = "0";
    
    /**
     * @var string - Reference to a component / product
     */
    protected $_productId = "0";
    
    /**
     * @var double - Component quantity
     */
    protected $_quantity = 0.0;
    
    /**
     * SetArticle Setter
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
                case "_productId":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_quantity":
                
                    $this->$name = (double)$value;
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
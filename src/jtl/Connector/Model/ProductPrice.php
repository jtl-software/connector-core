<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductPrice Model
 * @access public
 */
class ProductPrice extends DataModel
{
    /**
     * @var int
     */
    protected $_customerGroupId = 0;
    
    /**
     * @var int
     */
    protected $_productId = 0;
    
    /**
     * @var double
     */
    protected $_netPrice = 0.0;
    
    /**
     * @var int
     */
    protected $_quantity = 0;
    
    /**
     * ProductPrice Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if ($value === null) {
            $this->$name = null;
            return;
        }
        
        switch ($name) {
            case "_customerGroupId":
            case "_productId":
            case "_quantity":
            
                $this->$name = (int)$value;
                break;
        
            case "_netPrice":
            
                $this->$name = (double)$value;
                break;
        
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
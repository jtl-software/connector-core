<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductVariation Model
 * @access public
 */
class ProductVariation extends DataModel
{
    /**
     * @var int
     */
    protected $_id = 0;
    
    /**
     * @var int
     */
    protected $_productId;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @var bool
     */
    protected $_isSelectable;
    
    /**
     * @var string
     */
    protected $_type;
    
    /**
     * @var int
     */
    protected $_sort;
    
    /**
     * ProductVariation Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_id":
            case "_productId":
            case "_sort":
            
                $this->$name = (int)$value;
                break;
        
            case "_name":
            case "_type":
            
                $this->$name = (string)$value;
                break;
        
            case "_isSelectable":
            
                $this->$name = (bool)$value;
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
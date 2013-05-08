<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductWarehouseInfo Model
 * @access public
 */
abstract class ProductWarehouseInfo extends DataModel
{
    /**
     * @var int
     */
    protected $_productId;
    
    /**
     * @var int
     */
    protected $_warehouseId;
    
    /**
     * @var double
     */
    protected $_stockLevel;
    
    /**
     * @var string
     */
    protected $_inflowDate;
    
    /**
     * ProductWarehouseInfo Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_productId":
            case "_warehouseId":
            
                $this->$name = (int)$value;
                break;
        
            case "_stockLevel":
            
                $this->$name = (double)$value;
                break;
        
            case "_inflowDate":
            
                $this->$name = (string)$value;
                break;
        
        }
    }
    
    /**
     * ProductWarehouseInfo Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>
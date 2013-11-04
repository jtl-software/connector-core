<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductFunctionAttr Model
 * 
 *
 * @access public
 */
class ProductFunctionAttr extends DataModel
{
    /**
     * @var string
     */
    protected $_id = "0";
    
    /**
     * @var string
     */
    protected $_productId = "0";
    
    /**
     * @var string
     */
    protected $_key = "0";
    
    /**
     * @var string
     */
    protected $_value = "0";
    
    /**
     * ProductFunctionAttr Setter
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
                case "_key":
                case "_value":
                
                    $this->$name = (string)$value;
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
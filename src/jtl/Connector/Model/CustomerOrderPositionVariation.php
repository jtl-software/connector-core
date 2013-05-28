<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CustomerOrderPositionVariation Model
 * @access public
 */
class CustomerOrderPositionVariation extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_customerOrderPositionId;
    
    /**
     * @var int
     */
    protected $_productVariationId;
    
    /**
     * @var int
     */
    protected $_productVariationValueId;
    
    /**
     * @var string
     */
    protected $_productVariationName;
    
    /**
     * @var string
     */
    protected $_productVariationValueName;
    
    /**
     * @var string
     */
    protected $_freeField;
    
    /**
     * @var double
     */
    protected $_surcharge;
    
    /**
     * CustomerOrderPositionVariation Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_id":
            case "_customerOrderPositionId":
            case "_productVariationId":
            case "_productVariationValueId":
            
                $this->$name = (int)$value;
                break;
        
            case "_productVariationName":
            case "_productVariationValueName":
            case "_freeField":
            
                $this->$name = (string)$value;
                break;
        
            case "_surcharge":
            
                $this->$name = (double)$value;
                break;
        
        }
    }
    
    /**
     * CustomerOrderPositionVariation Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
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
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
    protected $_id = 0;
    
    /**
     * @var int
     */
    protected $_customerOrderPositionId = 0;
    
    /**
     * @var int
     */
    protected $_productVariationId = 0;
    
    /**
     * @var int
     */
    protected $_productVariationValueId = 0;
    
    /**
     * @var string
     */
    protected $_productVariationName = '';
    
    /**
     * @var string
     */
    protected $_productVariationValueName = '';
    
    /**
     * @var string
     */
    protected $_freeField = '';
    
    /**
     * @var double
     */
    protected $_surcharge = 0.0;
    
    /**
     * CustomerOrderPositionVariation Setter
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
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}
?>
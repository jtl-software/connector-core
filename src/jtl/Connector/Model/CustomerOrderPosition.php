<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CustomerOrderPosition Model
 * @access public
 */
abstract class CustomerOrderPosition extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_externalOrderPosition;
    
    /**
     * @var int
     */
    protected $_basketId;
    
    /**
     * @var int
     */
    protected $_productId;
    
    /**
     * @var int
     */
    protected $_shippingClassId;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @var string
     */
    protected $_sku;
    
    /**
     * @var double
     */
    protected $_singlePrice;
    
    /**
     * @var double
     */
    protected $_price;
    
    /**
     * @var double
     */
    protected $_vat;
    
    /**
     * @var int
     */
    protected $_quantity;
    
    /**
     * @var int
     */
    protected $_type;
    
    /**
     * @var string
     */
    protected $_unique;
    
    /**
     * @var int
     */
    protected $_configItemId;
    
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
     * CustomerOrderPosition Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_id":
            case "_externalOrderPosition":
            case "_basketId":
            case "_productId":
            case "_shippingClassId":
            case "_quantity":
            case "_type":
            case "_configItemId":
            case "_id":
            case "_customerOrderPositionId":
            case "_productVariationId":
            case "_productVariationValueId":
            
                $this->$name = (int)$value;
                break;
        
            case "_name":
            case "_sku":
            case "_unique":
            case "_productVariationName":
            case "_productVariationValueName":
            case "_freeField":
            
                $this->$name = (string)$value;
                break;
        
            case "_singlePrice":
            case "_price":
            case "_vat":
            case "_surcharge":
            
                $this->$name = (double)$value;
                break;
        
        }
    }
    
    /**
     * CustomerOrderPosition Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>
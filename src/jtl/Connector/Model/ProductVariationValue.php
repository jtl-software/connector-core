<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductVariationValue Model
 * @access public
 */
abstract class ProductVariationValue extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_productVariationId;
    
    /**
     * @var double
     */
    protected $_extraWeight;
    
    /**
     * @var string
     */
    protected $_sku;
    
    /**
     * @var int
     */
    protected $_sort;
    
    /**
     * @var double
     */
    protected $_stockLevel;
    
    /**
     * @var double
     */
    protected $_packagingUnitId;
    
    /**
     * @var int
     */
    protected $_languageIso;
    
    /**
     * @var int
     */
    protected $_productVariationValueId;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @var int
     */
    protected $_customerGroupId;
    
    /**
     * @var int
     */
    protected $_productVariationValueId;
    
    /**
     * @var double
     */
    protected $_extraChargeNet;
    
    /**
     * @var int
     */
    protected $_customerGroupId;
    
    /**
     * @var int
     */
    protected $_productVariationValueId;
    
    /**
     * @var int
     */
    protected $_productVariationValueId;
    
    /**
     * @var int
     */
    protected $_productVariationValueTargetId;
    
    /**
     * ProductVariationValue Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_id":
            case "_productVariationId":
            case "_sort":
            case "_languageIso":
            case "_productVariationValueId":
            case "_customerGroupId":
            case "_productVariationValueId":
            case "_customerGroupId":
            case "_productVariationValueId":
            case "_productVariationValueId":
            case "_productVariationValueTargetId":
            
                $this->$name = (int)$value;
                break;
        
            case "_extraWeight":
            case "_stockLevel":
            case "_packagingUnitId":
            case "_extraChargeNet":
            
                $this->$name = (double)$value;
                break;
        
            case "_sku":
            case "_name":
            
                $this->$name = (string)$value;
                break;
        
        }
    }
    
    /**
     * ProductVariationValue Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>
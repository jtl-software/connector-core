<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductVarCombination Model
 * @access public
 */
abstract class ProductVarCombination extends DataModel
{
    /**
     * @var int
     */
    protected $_productId;
    
    /**
     * @var int
     */
    protected $_productVariationId;
    
    /**
     * @var int
     */
    protected $_productVariationValueId;
    
    /**
     * ProductVarCombination Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_productId":
            case "_productVariationId":
            case "_productVariationValueId":
            
                $this->$name = (int)$value;
                break;
        
        }
    }
    
    /**
     * ProductVarCombination Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>
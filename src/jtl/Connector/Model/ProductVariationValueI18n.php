<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductVariationValueI18n Model
 * @access public
 */
abstract class ProductVariationValueI18n extends DataModel
{
    /**
     * @var string
     */
    protected $_languageIso;
    
    /**
     * @var int
     */
    protected $_productVariationValueId = 0;
    
    /**
     * @var string
     */
    protected $_name = "0";
    
    /**
     * ProductVariationValueI18n Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_languageIso":
            case "_name":
            
                $this->$name = (string)$value;
                break;
        
            case "_productVariationValueId":
            
                $this->$name = (int)$value;
                break;
        
        }
    }
    
    /**
     * ProductVariationValueI18n Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>
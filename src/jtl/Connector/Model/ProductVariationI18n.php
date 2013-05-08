<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductVariationI18n Model
 * @access public
 */
abstract class ProductVariationI18n extends DataModel
{
    /**
     * @var int
     */
    protected $_languageIso;
    
    /**
     * @var int
     */
    protected $_productVariationId;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * ProductVariationI18n Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_languageIso":
            case "_productVariationId":
            
                $this->$name = (int)$value;
                break;
        
            case "_name":
            
                $this->$name = (string)$value;
                break;
        
        }
    }
    
    /**
     * ProductVariationI18n Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>
<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductAttrI18n Model
 * @access public
 */
abstract class ProductAttrI18n extends DataModel
{
    /**
     * @var int
     */
    protected $_languageIso;
    
    /**
     * @var int
     */
    protected $_productAttrId;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @var string
     */
    protected $_value;
    
    /**
     * ProductAttrI18n Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_languageIso":
            case "_productAttrId":
            
                $this->$name = (int)$value;
                break;
        
            case "_name":
            case "_value":
            
                $this->$name = (string)$value;
                break;
        
        }
    }
    
    /**
     * ProductAttrI18n Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>
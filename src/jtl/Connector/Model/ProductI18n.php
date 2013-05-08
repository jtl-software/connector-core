<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductI18n Model
 * @access public
 */
abstract class ProductI18n extends DataModel
{
    /**
     * @var int
     */
    protected $_languageIso;
    
    /**
     * @var int
     */
    protected $_productId;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @var string
     */
    protected $_url;
    
    /**
     * @var string
     */
    protected $_description;
    
    /**
     * @var string
     */
    protected $_shortDescription;
    
    /**
     * ProductI18n Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_languageIso":
            case "_productId":
            
                $this->$name = (int)$value;
                break;
        
            case "_name":
            case "_url":
            case "_description":
            case "_shortDescription":
            
                $this->$name = (string)$value;
                break;
        
        }
    }
    
    /**
     * ProductI18n Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>
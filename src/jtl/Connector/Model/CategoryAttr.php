<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CategoryAttr Model
 * @access public
 */
abstract class CategoryAttr extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_categoryId;
    
    /**
     * @var string
     */
    protected $_languageIso;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @var string
     */
    protected $_value;
    
    /**
     * CategoryAttr Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_id":
            case "_categoryId":
            
                $this->$name = (int)$value;
                break;
        
            case "_languageIso":
            case "_name":
            case "_value":
            
                $this->$name = (string)$value;
                break;
        
        }
    }
    
    /**
     * CategoryAttr Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>
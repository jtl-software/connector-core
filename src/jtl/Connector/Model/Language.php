<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Language Model
 * @access public
 */
class Language extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var string
     */
    protected $_nameEnglish;
    
    /**
     * @var string
     */
    protected $_nameGerman;
    
    /**
     * @var string
     */
    protected $_languageIso;
    
    /**
     * @var bool
     */
    protected $_isDefault = false;
    
    /**
     * @var bool
     */
    protected $_isConnectorDefault = bool;
    
    /**
     * @var false
     */
    protected $_isWawiDefault = false;
    
    /**
     * Language Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_id":
            
                $this->$name = (int)$value;
                break;
        
            case "_nameEnglish":
            case "_nameGerman":
            case "_languageIso":
            
                $this->$name = (string)$value;
                break;
        
            case "_isDefault":
            case "_isConnectorDefault":
            
                $this->$name = (bool)$value;
                break;
        
            case "_isWawiDefault":
            
                $this->$name = (false)$value;
                break;
        
        }
    }
    
    /**
     * Language Getter
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
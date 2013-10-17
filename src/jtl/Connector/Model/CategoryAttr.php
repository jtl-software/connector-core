<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CategoryAttr Model
 * Holds monolingual attribute
 * @access public
 */
class CategoryAttr extends DataModel
{
    /**
     * @var string Unique id
     */
    protected $_id = "0";
    
    /**
     * @var string Category id
     */
    protected $_categoryId = "0";
    
    /**
     * @var string Locale name
     */
    protected $_localeName = '';
    
    /**
     * @var string Attribute key name
     */
    protected $_name = '';
    
    /**
     * @var string Attribute value
     */
    protected $_value = '';
    
    /**
     * CategoryAttr Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            if ($value === null) {
                $this->$name = null;
                return;
            }
        
            switch ($name) {
                case "_id":
                case "_categoryId":
                case "_localeName":
                case "_name":
                case "_value":
                
                    $this->$name = (string)$value;
                    break;
            
            }
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
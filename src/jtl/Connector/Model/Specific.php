<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Specific Model
 * Specific is defined as a characteristic product attribute Like "color". Specifics can be used for after-search-filtering. 
 *
 * @access public
 */
class Specific extends DataModel
{
    /**
     * @var string Unique specific id
     */
    protected $_id = '';             
    
    /**
     * @var int Optional sort number
     */
    protected $_sort = 0;             
    
    /**
     * @var bool Optional: Global specific means the specific can be used like a category (e.g. show all red products in shop)
     */
    protected $_isGlobal = false;             
    
    /**
     * @var string Specific type (radio, dropdown, image...)
     */
    protected $_type = '';             
    
    /**
     * Specific Setter
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
                case "_type":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_sort":
                
                    $this->$name = (int)$value;
                    break;
            
                case "_isGlobal":
                
                    $this->$name = (bool)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id Unique specific id
     * @return \jtl\Connector\Model\Specific
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string Unique specific id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param int $sort Optional sort number
     * @return \jtl\Connector\Model\Specific
     */
    public function setSort($sort)
    {
        $this->_sort = (int)$sort;
        return $this;
    }
    
    /**
     * @return int Optional sort number
     */
    public function getSort()
    {
        return $this->_sort;
    }
    /**
     * @param bool $isGlobal Optional: Global specific means the specific can be used like a category (e.g. show all red products in shop)
     * @return \jtl\Connector\Model\Specific
     */
    public function setIsGlobal($isGlobal)
    {
        $this->_isGlobal = (bool)$isGlobal;
        return $this;
    }
    
    /**
     * @return bool Optional: Global specific means the specific can be used like a category (e.g. show all red products in shop)
     */
    public function getIsGlobal()
    {
        return $this->_isGlobal;
    }
    /**
     * @param string $type Specific type (radio, dropdown, image...)
     * @return \jtl\Connector\Model\Specific
     */
    public function setType($type)
    {
        $this->_type = (string)$type;
        return $this;
    }
    
    /**
     * @return string Specific type (radio, dropdown, image...)
     */
    public function getType()
    {
        return $this->_type;
    }
}
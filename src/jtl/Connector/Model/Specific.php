<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Specific
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Specific is defined as a characteristic product attribute Like "color". Specifics can be used for after-search-filtering. 
 *
 * @access public
 * @subpackage Specific
 */
class Specific extends DataModel
{
    /**
     * @var Identity Unique specific id
     */
    protected $_id = null;
    
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
                
                    $this->$name = Identity::convert($value);
                    break;
            
                case "_sort":
                
                    $this->$name = (int)$value;
                    break;
            
                case "_isGlobal":
                
                    $this->$name = (bool)$value;
                    break;
            
                case "_type":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $id Unique specific id
     * @return \jtl\Connector\Model\Specific
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique specific id
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
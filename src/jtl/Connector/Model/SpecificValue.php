<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Specific
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Specific value properties to define a new specificValue with a sort number. 
 *
 * @access public
 * @subpackage Specific
 */
class SpecificValue extends DataModel
{
    /**
     * @var Identity Unique specificValue id
     */
    protected $_id = null;
    
    /**
     * @var Identity Reference to specificId
     */
    protected $_specificId = null;
    
    /**
     * @var int Optional sort number
     */
    protected $_sort = 0;
    
    /**
     * SpecificValue Setter
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
                case "_specificId":
                
                    $this->$name = ($value instanceof Identity) ? $value : null;
                    break;
            
                case "_sort":
                
                    $this->$name = (int)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $id Unique specificValue id
     * @return \jtl\Connector\Model\SpecificValue
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique specificValue id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param Identity $specificId Reference to specificId
     * @return \jtl\Connector\Model\SpecificValue
     */
    public function setSpecificId(Identity $specificId)
    {
        $this->_specificId = $specificId;
        return $this;
    }
    
    /**
     * @return Identity Reference to specificId
     */
    public function getSpecificId()
    {
        return $this->_specificId;
    }
    /**
     * @param int $sort Optional sort number
     * @return \jtl\Connector\Model\SpecificValue
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
}
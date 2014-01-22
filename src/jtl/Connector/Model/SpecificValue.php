<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * SpecificValue Model
 * Specific value properties to define a new specificValue with a sort number. 
 *
 * @access public
 */
class SpecificValue extends DataModel
{
    /**
     * @var string - Unique specificValue id
     */
    protected $_id = '';
    
    /**
     * @var string - Reference to specificId
     */
    protected $_specificId = '';
    
    /**
     * @var int - Optional sort number
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
                
                    $this->$name = (string)$value;
                    break;
            
                case "_sort":
                
                    $this->$name = (int)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id
     * @return \jtl\Connector\Model\SpecificValue
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param string $specificId
     * @return \jtl\Connector\Model\SpecificValue
     */
    public function setSpecificId($specificId)
    {
        $this->_specificId = (string)$specificId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getSpecificId()
    {
        return $this->_specificId;
    }
    
    /**
     * @param int $sort
     * @return \jtl\Connector\Model\SpecificValue
     */
    public function setSort($sort)
    {
        $this->_sort = (int)$sort;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getSort()
    {
        return $this->_sort;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}
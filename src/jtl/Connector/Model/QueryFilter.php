<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Database Query Filter
 */
class QueryFilter
{
    /**
     * Query item count limitation
     * 
     * @var integer
     */
    protected $_limit;
    
    /**
     * Query item range offset
     * 
     * @var integer
     */
    protected $_offset;
    
    /**
     * Constructor
     */
    public function __construct($limit = null, $offset = null)
    {
        if ($limit !== null) {
            $this->_limit = $limit;
        }
        
        if ($offset !== null) {
            $this->_offset = $offset;
        }
    }
    
    /**
     * Limit Setter
     * 
     * @param integer $limit
     * @return \jtl\Connector\Model\QueryFilter
     */
    public function setLimit($limit)
    {
        $this->_limit = (int)$limit;
        return $this;
    }
    
    /**
     * Limit Getter
     * 
     * @return integer
     */
    public function getLimit()
    {
        return $this->_limit;
    }
    
    /**
     * Offset Setter
     * 
     * @param integer $offset
     * @return \jtl\Connector\Model\QueryFilter
     */
    public function setOffset($offset)
    {
        $this->_offset = (int)$offset;
        return $this;
    }
    
    /**
     * Offset Getter
     * 
     * @return integer
     */
    public function getOffset()
    {
        return $this->_offset;
    }
    
    /**
     * Setter
     * 
     * @param \stdClass $obj
     */
    public function set($obj)
    {
        if (is_object($obj) && isset($obj->limit)) {
            $this->setLimit($obj->limit);
        }
        
        if (is_object($obj) && isset($obj->offset)) {
            $this->setOffset($obj->offset);
        }
    }
}
?>
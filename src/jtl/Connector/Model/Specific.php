<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * Specific Model
 * @access public
 */
abstract class Specific extends Model
{
    /**
     * @var 
     */
    protected $_id;
    
    /**
     * @var 
     */
    protected $_sort;
    
    /**
     * @var 
     */
    protected $_global;
    
    /**
     * @var int
     */
    protected $_name;
    
    /**
     * @var 
     */
    protected $_type;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\Specific
     */
    public function setId($id)
    {
        $this->_id = ()$id;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param  $sort
     * @return \jtl\Connector\Model\Specific
     */
    public function setSort($sort)
    {
        $this->_sort = ()$sort;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getSort()
    {
        return $this->_sort;
    }
    
    /**
     * @param  $global
     * @return \jtl\Connector\Model\Specific
     */
    public function setGlobal($global)
    {
        $this->_global = ()$global;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getGlobal()
    {
        return $this->_global;
    }
    
    /**
     * @param int $name
     * @return \jtl\Connector\Model\Specific
     */
    public function setName($name)
    {
        $this->_name = (int)$name;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getName()
    {
        return $this->_name;
    }
    
    /**
     * @param  $type
     * @return \jtl\Connector\Model\Specific
     */
    public function setType($type)
    {
        $this->_type = ()$type;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getType()
    {
        return $this->_type;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/Specific/Specific.json", $this->getPublic(array()));
    }
}
?>
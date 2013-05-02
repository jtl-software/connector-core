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
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_sort;
    
    /**
     * @var int
     */
    protected $_global;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @var string
     */
    protected $_type;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\Specific
     */
    public function setId($id)
    {
        $this->_id = (int)$id;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param int $sort
     * @return \jtl\Connector\Model\Specific
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
     * @param int $global
     * @return \jtl\Connector\Model\Specific
     */
    public function setGlobal($global)
    {
        $this->_global = (int)$global;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getGlobal()
    {
        return $this->_global;
    }
    
    /**
     * @param string $name
     * @return \jtl\Connector\Model\Specific
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }
    
    /**
     * @param string $type
     * @return \jtl\Connector\Model\Specific
     */
    public function setType($type)
    {
        $this->_type = (string)$type;
        return $this;
    }
    
    /**
     * @return string
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
        Schema::validateModel(CONNECTOR_DIR . "schema/specific/specific.json", $this->getPublic(array()));
    }
}
?>
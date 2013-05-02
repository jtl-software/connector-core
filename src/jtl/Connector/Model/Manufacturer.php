<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * Manufacturer Model
 * @access public
 */
abstract class Manufacturer extends Model
{
    /**
     * @var 
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_name;
    
    /**
     * @var 
     */
    protected $_www;
    
    /**
     * @var 
     */
    protected $_sort;
    
    /**
     * @var 
     */
    protected $_url;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\Manufacturer
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
     * @param int $name
     * @return \jtl\Connector\Model\Manufacturer
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
     * @param  $www
     * @return \jtl\Connector\Model\Manufacturer
     */
    public function setWww($www)
    {
        $this->_www = ()$www;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getWww()
    {
        return $this->_www;
    }
    
    /**
     * @param  $sort
     * @return \jtl\Connector\Model\Manufacturer
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
     * @param  $url
     * @return \jtl\Connector\Model\Manufacturer
     */
    public function setUrl($url)
    {
        $this->_url = ()$url;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getUrl()
    {
        return $this->_url;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/Manufacturer/Manufacturer.json", $this->getPublic(array()));
    }
}
?>
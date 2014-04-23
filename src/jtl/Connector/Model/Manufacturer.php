<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Manufacturer
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Manufacturer / brand properties. 
 *
 * @access public
 * @subpackage Manufacturer
 */
class Manufacturer extends DataModel
{
    /**
     * @var Identity Unique manufacturer id
     */
    protected $_id = null;
    
    /**
     * @var string Manufacturer (brand) name
     */
    protected $_name = '';
    
    /**
     * @var string Optional manufacturer website URL
     */
    protected $_www = '';
    
    /**
     * @var int Optional sort number
     */
    protected $_sort = 0;
    
    /**
     * @var string Optional url path e.g. "Products-manufactured-by-X"
     */
    protected $_urlPath = '';
    
    /**
     * Manufacturer Setter
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
            
                case "_name":
                case "_www":
                case "_urlPath":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_sort":
                
                    $this->$name = (int)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $id Unique manufacturer id
     * @return \jtl\Connector\Model\Manufacturer
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique manufacturer id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param string $name Manufacturer (brand) name
     * @return \jtl\Connector\Model\Manufacturer
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string Manufacturer (brand) name
     */
    public function getName()
    {
        return $this->_name;
    }
    /**
     * @param string $www Optional manufacturer website URL
     * @return \jtl\Connector\Model\Manufacturer
     */
    public function setWww($www)
    {
        $this->_www = (string)$www;
        return $this;
    }
    
    /**
     * @return string Optional manufacturer website URL
     */
    public function getWww()
    {
        return $this->_www;
    }
    /**
     * @param int $sort Optional sort number
     * @return \jtl\Connector\Model\Manufacturer
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
     * @param string $urlPath Optional url path e.g. "Products-manufactured-by-X"
     * @return \jtl\Connector\Model\Manufacturer
     */
    public function setUrlPath($urlPath)
    {
        $this->_urlPath = (string)$urlPath;
        return $this;
    }
    
    /**
     * @return string Optional url path e.g. "Products-manufactured-by-X"
     */
    public function getUrlPath()
    {
        return $this->_urlPath;
    }
}
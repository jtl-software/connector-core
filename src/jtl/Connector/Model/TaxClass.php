<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * TaxClass Model
 * Tax class model (set in JTL-Wawi ERP)
 *
 * @access public
 */
class TaxClass extends DataModel
{
    /**
     * @var string - Unique taxClass id
     */
    protected $_id = '';
    
    /**
     * @var string - Optional tax class name
     */
    protected $_name = '';
    
    /**
     * @var bool - Optional: Flag default tax class. Default is false. Exact 1 taxClass has to be marked as default. 
     */
    protected $_isDefault = false;
    
    /**
     * TaxClass Setter
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
                case "_name":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_isDefault":
                
                    $this->$name = (bool)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id
     * @return \jtl\Connector\Model\TaxClass
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
     * @param string $name
     * @return \jtl\Connector\Model\TaxClass
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
     * @param bool $isDefault
     * @return \jtl\Connector\Model\TaxClass
     */
    public function setIsDefault($isDefault)
    {
        $this->_isDefault = (bool)$isDefault;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getIsDefault()
    {
        return $this->_isDefault;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}
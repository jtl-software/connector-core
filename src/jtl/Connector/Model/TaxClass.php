<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Tax class model (set in JTL-Wawi ERP)
 *
 * @access public
 * @subpackage GlobalData
 */
class TaxClass extends DataModel
{
    /**
     * @var Identity Unique taxClass id
     */
    protected $_id = null;
    
    /**
     * @var string Optional tax class name
     */
    protected $_name = '';
    
    /**
     * @var bool Optional: Flag default tax class. Default is false. Exact 1 taxClass has to be marked as default. 
     */
    protected $_isDefault = false;
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_id'
    );
    
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
                
                    $this->$name = Identity::convert($value);
                    break;
            
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
     * @param Identity $id Unique taxClass id
     * @return \jtl\Connector\Model\TaxClass
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique taxClass id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param string $name Optional tax class name
     * @return \jtl\Connector\Model\TaxClass
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string Optional tax class name
     */
    public function getName()
    {
        return $this->_name;
    }
    /**
     * @param bool $isDefault Optional: Flag default tax class. Default is false. Exact 1 taxClass has to be marked as default. 
     * @return \jtl\Connector\Model\TaxClass
     */
    public function setIsDefault($isDefault)
    {
        $this->_isDefault = (bool)$isDefault;
        return $this;
    }
    
    /**
     * @return bool Optional: Flag default tax class. Default is false. Exact 1 taxClass has to be marked as default. 
     */
    public function getIsDefault()
    {
        return $this->_isDefault;
    }
}
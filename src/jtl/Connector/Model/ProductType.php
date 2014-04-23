<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductType model to classify and group products.
 *
 * @access public
 * @subpackage GlobalData
 */
class ProductType extends DataModel
{
    /**
     * @var Identity Unique productType id
     */
    protected $_id = null;
    
    /**
     * @var string Optional (internal) product type name
     */
    protected $_name = '';
    
    /**
     * ProductType Setter
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
            
            }
        }
    }
    
    /**
     * @param Identity $id Unique productType id
     * @return \jtl\Connector\Model\ProductType
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique productType id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param string $name Optional (internal) product type name
     * @return \jtl\Connector\Model\ProductType
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string Optional (internal) product type name
     */
    public function getName()
    {
        return $this->_name;
    }
}
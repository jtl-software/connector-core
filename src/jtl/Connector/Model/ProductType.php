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
 */
class ProductType extends DataModel
{
    /**
     * @var string Unique productType id
     */
    protected $_id = '';             
    
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
                case "_name":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id Unique productType id
     * @return \jtl\Connector\Model\ProductType
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string Unique productType id
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
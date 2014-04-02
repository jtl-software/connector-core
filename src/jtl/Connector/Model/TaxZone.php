<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Tax zone model (set in JTL-Wawi ERP).
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */
class TaxZone extends DataModel
{
    /**
     * @var string Unique taxZone id
     */
    protected $_id = '';             
    
    /**
     * @var string Optional tax zone name e.g. "EU Zone"
     */
    protected $_name = '';             
    
    /**
     * TaxZone Setter
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
     * @param string $id Unique taxZone id
     * @return \jtl\Connector\Model\TaxZone
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string Unique taxZone id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param string $name Optional tax zone name e.g. "EU Zone"
     * @return \jtl\Connector\Model\TaxZone
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string Optional tax zone name e.g. "EU Zone"
     */
    public function getName()
    {
        return $this->_name;
    }
}
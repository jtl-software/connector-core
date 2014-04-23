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
 * @subpackage GlobalData
 */
class TaxZone extends DataModel
{
    /**
     * @var Identity Unique taxZone id
     */
    protected $_id = null;
    
    /**
     * @var string Optional tax zone name e.g. "EU Zone"
     */
    protected $_name = '';
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        'id'
    );
    
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
                
                    $this->$name = Identity::convert($value);
                    break;
            
                case "_name":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $id Unique taxZone id
     * @return \jtl\Connector\Model\TaxZone
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique taxZone id
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
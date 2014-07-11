<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

/**
 * Specifies product units like "piece", "bottle", "package".
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */
class Unit extends DataModel
{
    /**
     * @var Identity Unit id
     */
    protected $_id = null;
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_id'
    );
    
    /**
     * Unit Setter
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
            
            }
        }
    }
    
    /**
     * @param Identity $id Unit id
     * @return \jtl\Connector\Model\Unit
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unit id
     */
    public function getId()
    {
        return $this->_id;
    }
}
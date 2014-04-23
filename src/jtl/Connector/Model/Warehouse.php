<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * warehouse model (set in JTL-Wawi ERP).
 *
 * @access public
 * @subpackage GlobalData
 */
class Warehouse extends DataModel
{
    /**
     * @var Identity Unique warehouse id
     */
    protected $_id = null;
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_id'
    );
    
    /**
     * Warehouse Setter
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
     * @param Identity $id Unique warehouse id
     * @return \jtl\Connector\Model\Warehouse
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique warehouse id
     */
    public function getId()
    {
        return $this->_id;
    }
}
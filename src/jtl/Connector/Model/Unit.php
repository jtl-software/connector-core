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
     * @var string  Optional UCUM-Code, see  http://unitsofmeasure.org/
     */
    protected $_code = '';
    
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
            
                case "_code":
                
                    $this->$name = (string)$value;
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
    /**
     * @param string $code  Optional UCUM-Code, see  http://unitsofmeasure.org/
     * @return \jtl\Connector\Model\Unit
     */
    public function setCode($code)
    {
        $this->_code = (string)$code;
        return $this;
    }
    
    /**
     * @return string  Optional UCUM-Code, see  http://unitsofmeasure.org/
     */
    public function getCode()
    {
        return $this->_code;
    }
}
<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

/**
 * Specifies product units like "ml", "l", " cm".
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */
class MeasurementUnit extends DataModel
{
    /**
     * @var Identity Unit id
     */
    protected $_id = null;
    
    /**
     * @var string Optional UCUM-Code, see  http://unitsofmeasure.org/
     */
    protected $_code = '';
    
    /**
     * @var string Synonym e.g. 'ml'
     */
    protected $_displayCode = '';
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_id'
    );
    
    /**
     * MeasurementUnit Setter
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
                case "_displayCode":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $id Unit id
     * @return \jtl\Connector\Model\MeasurementUnit
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
     * @param string $code Optional UCUM-Code, see  http://unitsofmeasure.org/
     * @return \jtl\Connector\Model\MeasurementUnit
     */
    public function setCode($code)
    {
        $this->_code = (string)$code;
        return $this;
    }
    
    /**
     * @return string Optional UCUM-Code, see  http://unitsofmeasure.org/
     */
    public function getCode()
    {
        return $this->_code;
    }
    /**
     * @param string $displayCode Synonym e.g. 'ml'
     * @return \jtl\Connector\Model\MeasurementUnit
     */
    public function setDisplayCode($displayCode)
    {
        $this->_displayCode = (string)$displayCode;
        return $this;
    }
    
    /**
     * @return string Synonym e.g. 'ml'
     */
    public function getDisplayCode()
    {
        return $this->_displayCode;
    }
}
<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Specifies product units like "piece", "bottle", "package".
 *
 * @access public
 * @subpackage GlobalData
 */
class Unit extends DataModel
{
    /**
     * @var string Unit id
     */
    protected $_id = '';             
    
    /**
     * @var string Locale
     */
    protected $_localeName = '';             
    
    /**
     * @var string Localized unit name
     */
    protected $_name = '';             
    
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
                case "_localeName":
                case "_name":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id Unit id
     * @return \jtl\Connector\Model\Unit
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string Unit id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param string $localeName Locale
     * @return \jtl\Connector\Model\Unit
     */
    public function setLocaleName($localeName)
    {
        $this->_localeName = (string)$localeName;
        return $this;
    }
    
    /**
     * @return string Locale
     */
    public function getLocaleName()
    {
        return $this->_localeName;
    }
    /**
     * @param string $name Localized unit name
     * @return \jtl\Connector\Model\Unit
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string Localized unit name
     */
    public function getName()
    {
        return $this->_name;
    }
}
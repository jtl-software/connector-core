<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * TaxZone to Country Allocation (set in JTL-Wawi ERP).
 *
 * @access public
 */
class TaxZoneCountry extends DataModel
{
    /**
     * @var string Unique taxZoneCountry id
     */
    protected $_id = '';             
    
    /**
     * @var string Reference to taxZone
     */
    protected $_taxZoneId = '';             
    
    /**
     * @var string Country ISO 3166-2 (2 letter Uppercase)
     */
    protected $_countryIso = '';             
    
    /**
     * TaxZoneCountry Setter
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
                case "_taxZoneId":
                case "_countryIso":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id Unique taxZoneCountry id
     * @return \jtl\Connector\Model\TaxZoneCountry
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string Unique taxZoneCountry id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param string $taxZoneId Reference to taxZone
     * @return \jtl\Connector\Model\TaxZoneCountry
     */
    public function setTaxZoneId($taxZoneId)
    {
        $this->_taxZoneId = (string)$taxZoneId;
        return $this;
    }
    
    /**
     * @return string Reference to taxZone
     */
    public function getTaxZoneId()
    {
        return $this->_taxZoneId;
    }
    /**
     * @param string $countryIso Country ISO 3166-2 (2 letter Uppercase)
     * @return \jtl\Connector\Model\TaxZoneCountry
     */
    public function setCountryIso($countryIso)
    {
        $this->_countryIso = (string)$countryIso;
        return $this;
    }
    
    /**
     * @return string Country ISO 3166-2 (2 letter Uppercase)
     */
    public function getCountryIso()
    {
        return $this->_countryIso;
    }
}
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
 * @subpackage GlobalData
 */
class TaxZoneCountry extends DataModel
{
    /**
     * @var Identity Unique taxZoneCountry id
     */
    protected $_id = null;
    
    /**
     * @var Identity Reference to taxZone
     */
    protected $_taxZoneId = null;
    
    /**
     * @var string Country ISO 3166-2 (2 letter Uppercase)
     */
    protected $_countryIso = '';
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        'id',
        'taxZoneId'
    );
    
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
                
                    $this->$name = Identity::convert($value);
                    break;
            
                case "_countryIso":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $id Unique taxZoneCountry id
     * @return \jtl\Connector\Model\TaxZoneCountry
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique taxZoneCountry id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param Identity $taxZoneId Reference to taxZone
     * @return \jtl\Connector\Model\TaxZoneCountry
     */
    public function setTaxZoneId(Identity $taxZoneId)
    {
        $this->_taxZoneId = $taxZoneId;
        return $this;
    }
    
    /**
     * @return Identity Reference to taxZone
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
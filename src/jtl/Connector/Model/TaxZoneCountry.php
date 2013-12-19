<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * TaxZoneCountry Model
 * TaxZone to Country Allocation (set in JTL-Wawi ERP)
 *
 * @access public
 */
class TaxZoneCountry extends DataModel
{
    /**
     * @var string - Unique taxZoneCountry id
     */
    protected $_id = "0";
    
    /**
     * @var string - Reference to taxZone
     */
    protected $_taxZoneId = "0";
    
    /**
     * @var string - Country ISO 3166-2 (2 letter Uppercase)
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
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}
?>
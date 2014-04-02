<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Tax rate model (set in JTL-Wawi ERP).
 *
 * @access public
 * @subpackage GlobalData
 */
class TaxRate extends DataModel
{
    /**
     * @var string Unique taxRate id
     */
    protected $_id = '';             
    
    /**
     * @var string Reference to taxZone
     */
    protected $_taxZoneId = '';             
    
    /**
     * @var string Reference to taxClass
     */
    protected $_taxClassId = '';             
    
    /**
     * @var double Tax rate value e.g. 19.00
     */
    protected $_rate = 0.0;             
    
    /**
     * @var int Optional priority number. Higher value means higher priority
     */
    protected $_priority = 0;             
    
    /**
     * TaxRate Setter
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
                case "_taxClassId":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_rate":
                
                    $this->$name = (double)$value;
                    break;
            
                case "_priority":
                
                    $this->$name = (int)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id Unique taxRate id
     * @return \jtl\Connector\Model\TaxRate
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string Unique taxRate id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param string $taxZoneId Reference to taxZone
     * @return \jtl\Connector\Model\TaxRate
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
     * @param string $taxClassId Reference to taxClass
     * @return \jtl\Connector\Model\TaxRate
     */
    public function setTaxClassId($taxClassId)
    {
        $this->_taxClassId = (string)$taxClassId;
        return $this;
    }
    
    /**
     * @return string Reference to taxClass
     */
    public function getTaxClassId()
    {
        return $this->_taxClassId;
    }
    /**
     * @param double $rate Tax rate value e.g. 19.00
     * @return \jtl\Connector\Model\TaxRate
     */
    public function setRate($rate)
    {
        $this->_rate = (double)$rate;
        return $this;
    }
    
    /**
     * @return double Tax rate value e.g. 19.00
     */
    public function getRate()
    {
        return $this->_rate;
    }
    /**
     * @param int $priority Optional priority number. Higher value means higher priority
     * @return \jtl\Connector\Model\TaxRate
     */
    public function setPriority($priority)
    {
        $this->_priority = (int)$priority;
        return $this;
    }
    
    /**
     * @return int Optional priority number. Higher value means higher priority
     */
    public function getPriority()
    {
        return $this->_priority;
    }
}
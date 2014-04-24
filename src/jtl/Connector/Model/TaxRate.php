<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

/**
 * Tax rate model (set in JTL-Wawi ERP).
 *
 * @access public
 * @subpackage GlobalData
 */
class TaxRate extends DataModel
{
    /**
     * @var Identity Unique taxRate id
     */
    protected $_id = null;
    
    /**
     * @var Identity Reference to taxZone
     */
    protected $_taxZoneId = null;
    
    /**
     * @var Identity Reference to taxClass
     */
    protected $_taxClassId = null;
    
    /**
     * @var double Tax rate value e.g. 19.00
     */
    protected $_rate = 0.0;
    
    /**
     * @var int Optional priority number. Higher value means higher priority
     */
    protected $_priority = 0;
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_id',
        '_taxZoneId',
        '_taxClassId'
    );
    
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
                
                    $this->$name = Identity::convert($value);
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
     * @param Identity $id Unique taxRate id
     * @return \jtl\Connector\Model\TaxRate
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique taxRate id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param Identity $taxZoneId Reference to taxZone
     * @return \jtl\Connector\Model\TaxRate
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
     * @param Identity $taxClassId Reference to taxClass
     * @return \jtl\Connector\Model\TaxRate
     */
    public function setTaxClassId(Identity $taxClassId)
    {
        $this->_taxClassId = $taxClassId;
        return $this;
    }
    
    /**
     * @return Identity Reference to taxClass
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
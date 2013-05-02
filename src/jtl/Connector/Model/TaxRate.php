<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * TaxRate Model
 * @access public
 */
abstract class TaxRate extends Model
{
    /**
     * @var 
     */
    protected $_id;
    
    /**
     * @var 
     */
    protected $_taxZoneId;
    
    /**
     * @var 
     */
    protected $_taxClassId;
    
    /**
     * @var 
     */
    protected $_taxRate;
    
    /**
     * @var 
     */
    protected $_priority;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\TaxRate
     */
    public function setId($id)
    {
        $this->_id = ()$id;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param  $taxZoneId
     * @return \jtl\Connector\Model\TaxRate
     */
    public function setTaxZoneId($taxZoneId)
    {
        $this->_taxZoneId = ()$taxZoneId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getTaxZoneId()
    {
        return $this->_taxZoneId;
    }
    
    /**
     * @param  $taxClassId
     * @return \jtl\Connector\Model\TaxRate
     */
    public function setTaxClassId($taxClassId)
    {
        $this->_taxClassId = ()$taxClassId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getTaxClassId()
    {
        return $this->_taxClassId;
    }
    
    /**
     * @param  $taxRate
     * @return \jtl\Connector\Model\TaxRate
     */
    public function setTaxRate($taxRate)
    {
        $this->_taxRate = ()$taxRate;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getTaxRate()
    {
        return $this->_taxRate;
    }
    
    /**
     * @param  $priority
     * @return \jtl\Connector\Model\TaxRate
     */
    public function setPriority($priority)
    {
        $this->_priority = ()$priority;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getPriority()
    {
        return $this->_priority;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/TaxRate/TaxRate.json", $this->getPublic(array()));
    }
}
?>
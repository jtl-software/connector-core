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
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_taxZoneId;
    
    /**
     * @var int
     */
    protected $_taxClassId;
    
    /**
     * @var double
     */
    protected $_taxRate;
    
    /**
     * @var int
     */
    protected $_priority;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\TaxRate
     */
    public function setId($id)
    {
        $this->_id = (int)$id;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param int $taxZoneId
     * @return \jtl\Connector\Model\TaxRate
     */
    public function setTaxZoneId($taxZoneId)
    {
        $this->_taxZoneId = (int)$taxZoneId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getTaxZoneId()
    {
        return $this->_taxZoneId;
    }
    
    /**
     * @param int $taxClassId
     * @return \jtl\Connector\Model\TaxRate
     */
    public function setTaxClassId($taxClassId)
    {
        $this->_taxClassId = (int)$taxClassId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getTaxClassId()
    {
        return $this->_taxClassId;
    }
    
    /**
     * @param double $taxRate
     * @return \jtl\Connector\Model\TaxRate
     */
    public function setTaxRate($taxRate)
    {
        $this->_taxRate = (double)$taxRate;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getTaxRate()
    {
        return $this->_taxRate;
    }
    
    /**
     * @param int $priority
     * @return \jtl\Connector\Model\TaxRate
     */
    public function setPriority($priority)
    {
        $this->_priority = (int)$priority;
        return $this;
    }
    
    /**
     * @return int
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
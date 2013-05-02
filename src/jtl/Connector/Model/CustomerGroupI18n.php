<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * CustomerGroupI18n Model
 * @access public
 */
abstract class CustomerGroupI18n extends Model
{
    /**
     * @var 
     */
    protected $_languageIso;
    
    /**
     * @var string
     */
    protected $_customerGroupId;
    
    /**
     * @var int
     */
    protected $_name;
    
    /**
     * @param  $languageIso
     * @return \jtl\Connector\Model\CustomerGroupI18n
     */
    public function setLanguageIso($languageIso)
    {
        $this->_languageIso = ()$languageIso;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getLanguageIso()
    {
        return $this->_languageIso;
    }
    
    /**
     * @param string $customerGroupId
     * @return \jtl\Connector\Model\CustomerGroupI18n
     */
    public function setCustomerGroupId($customerGroupId)
    {
        $this->_customerGroupId = (string)$customerGroupId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCustomerGroupId()
    {
        return $this->_customerGroupId;
    }
    
    /**
     * @param int $name
     * @return \jtl\Connector\Model\CustomerGroupI18n
     */
    public function setName($name)
    {
        $this->_name = (int)$name;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getName()
    {
        return $this->_name;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/CustomerGroupI18n/CustomerGroupI18n.json", $this->getPublic(array()));
    }
}
?>
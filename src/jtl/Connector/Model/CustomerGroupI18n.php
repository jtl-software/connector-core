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
     * @var int
     */
    protected $_languageIso;
    
    /**
     * @var int
     */
    protected $_customerGroupId;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @param int $languageIso
     * @return \jtl\Connector\Model\CustomerGroupI18n
     */
    public function setLanguageIso($languageIso)
    {
        $this->_languageIso = (int)$languageIso;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getLanguageIso()
    {
        return $this->_languageIso;
    }
    
    /**
     * @param int $customerGroupId
     * @return \jtl\Connector\Model\CustomerGroupI18n
     */
    public function setCustomerGroupId($customerGroupId)
    {
        $this->_customerGroupId = (int)$customerGroupId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getCustomerGroupId()
    {
        return $this->_customerGroupId;
    }
    
    /**
     * @param string $name
     * @return \jtl\Connector\Model\CustomerGroupI18n
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string
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
        Schema::validateModel(CONNECTOR_DIR . "schema/customergroupi18n/customergroupi18n.json", $this->getPublic(array()));
    }
}
?>
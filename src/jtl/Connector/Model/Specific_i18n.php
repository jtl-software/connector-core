<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * Specific_i18n Model
 * @access public
 */
abstract class Specific_i18n extends Model
{
    /**
     * @var 
     */
    protected $_languageIso;
    
    /**
     * @var 
     */
    protected $_specificId;
    
    /**
     * @var int
     */
    protected $_name;
    
    /**
     * @param  $languageIso
     * @return \jtl\Connector\Model\Specific_i18n
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
     * @param  $specificId
     * @return \jtl\Connector\Model\Specific_i18n
     */
    public function setSpecificId($specificId)
    {
        $this->_specificId = ()$specificId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getSpecificId()
    {
        return $this->_specificId;
    }
    
    /**
     * @param int $name
     * @return \jtl\Connector\Model\Specific_i18n
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
        Schema::validateModel(CONNECTOR_DIR . "schema/Specific_i18n/Specific_i18n.json", $this->getPublic(array()));
    }
}
?>
<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * Language Model
 * @access public
 */
abstract class Language extends Model
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var string
     */
    protected $_nameEnglish;
    
    /**
     * @var string
     */
    protected $_nameGerman;
    
    /**
     * @var string
     */
    protected $_languageIso;
    
    /**
     * @var string
     */
    protected $_isDefault;
    
    /**
     * @var string
     */
    protected $_isConnectorDefault;
    
    /**
     * @var string
     */
    protected $_isWawiDefault;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\Language
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
     * @param string $nameEnglish
     * @return \jtl\Connector\Model\Language
     */
    public function setNameEnglish($nameEnglish)
    {
        $this->_nameEnglish = (string)$nameEnglish;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getNameEnglish()
    {
        return $this->_nameEnglish;
    }
    
    /**
     * @param string $nameGerman
     * @return \jtl\Connector\Model\Language
     */
    public function setNameGerman($nameGerman)
    {
        $this->_nameGerman = (string)$nameGerman;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getNameGerman()
    {
        return $this->_nameGerman;
    }
    
    /**
     * @param string $languageIso
     * @return \jtl\Connector\Model\Language
     */
    public function setLanguageIso($languageIso)
    {
        $this->_languageIso = (string)$languageIso;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getLanguageIso()
    {
        return $this->_languageIso;
    }
    
    /**
     * @param string $isDefault
     * @return \jtl\Connector\Model\Language
     */
    public function setIsDefault($isDefault)
    {
        $this->_isDefault = (string)$isDefault;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getIsDefault()
    {
        return $this->_isDefault;
    }
    
    /**
     * @param string $isConnectorDefault
     * @return \jtl\Connector\Model\Language
     */
    public function setIsConnectorDefault($isConnectorDefault)
    {
        $this->_isConnectorDefault = (string)$isConnectorDefault;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getIsConnectorDefault()
    {
        return $this->_isConnectorDefault;
    }
    
    /**
     * @param string $isWawiDefault
     * @return \jtl\Connector\Model\Language
     */
    public function setIsWawiDefault($isWawiDefault)
    {
        $this->_isWawiDefault = (string)$isWawiDefault;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getIsWawiDefault()
    {
        return $this->_isWawiDefault;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/language/language.json", $this->getPublic(array()));
    }
}
?>
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
     * @var 
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_nameEnglish;
    
    /**
     * @var int
     */
    protected $_nameGerman;
    
    /**
     * @var 
     */
    protected $_languageIso;
    
    /**
     * @var 
     */
    protected $_isDefault;
    
    /**
     * @var 
     */
    protected $_isConnectorDefault;
    
    /**
     * @var 
     */
    protected $_isWawiDefault;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\Language
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
     * @param int $nameEnglish
     * @return \jtl\Connector\Model\Language
     */
    public function setNameEnglish($nameEnglish)
    {
        $this->_nameEnglish = (int)$nameEnglish;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getNameEnglish()
    {
        return $this->_nameEnglish;
    }
    
    /**
     * @param int $nameGerman
     * @return \jtl\Connector\Model\Language
     */
    public function setNameGerman($nameGerman)
    {
        $this->_nameGerman = (int)$nameGerman;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getNameGerman()
    {
        return $this->_nameGerman;
    }
    
    /**
     * @param  $languageIso
     * @return \jtl\Connector\Model\Language
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
     * @param  $isDefault
     * @return \jtl\Connector\Model\Language
     */
    public function setIsDefault($isDefault)
    {
        $this->_isDefault = ()$isDefault;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getIsDefault()
    {
        return $this->_isDefault;
    }
    
    /**
     * @param  $isConnectorDefault
     * @return \jtl\Connector\Model\Language
     */
    public function setIsConnectorDefault($isConnectorDefault)
    {
        $this->_isConnectorDefault = ()$isConnectorDefault;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getIsConnectorDefault()
    {
        return $this->_isConnectorDefault;
    }
    
    /**
     * @param  $isWawiDefault
     * @return \jtl\Connector\Model\Language
     */
    public function setIsWawiDefault($isWawiDefault)
    {
        $this->_isWawiDefault = ()$isWawiDefault;
        return $this;
    }
    
    /**
     * @return 
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
        Schema::validateModel(CONNECTOR_DIR . "schema/Language/Language.json", $this->getPublic(array()));
    }
}
?>
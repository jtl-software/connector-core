<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * ConfigItem_i18n Model
 * @access public
 */
abstract class ConfigItem_i18n extends Model
{
    /**
     * @var string
     */
    protected $_configItemId;
    
    /**
     * @var 
     */
    protected $_languageIso;
    
    /**
     * @var int
     */
    protected $_name;
    
    /**
     * @var string
     */
    protected $_description;
    
    /**
     * @param string $configItemId
     * @return \jtl\Connector\Model\ConfigItem_i18n
     */
    public function setConfigItemId($configItemId)
    {
        $this->_configItemId = (string)$configItemId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getConfigItemId()
    {
        return $this->_configItemId;
    }
    
    /**
     * @param  $languageIso
     * @return \jtl\Connector\Model\ConfigItem_i18n
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
     * @param int $name
     * @return \jtl\Connector\Model\ConfigItem_i18n
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
     * @param string $description
     * @return \jtl\Connector\Model\ConfigItem_i18n
     */
    public function setDescription($description)
    {
        $this->_description = (string)$description;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->_description;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/ConfigItem_i18n/ConfigItem_i18n.json", $this->getPublic(array()));
    }
}
?>
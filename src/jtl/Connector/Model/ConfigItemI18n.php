<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ConfigItemI18n Model
 * @access public
 */
abstract class ConfigItemI18n extends DataModel
{
    /**
     * @var int
     */
    protected $_configItemId;
    
    /**
     * @var int
     */
    protected $_languageIso;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @var string
     */
    protected $_description;
    
    /**
     * @param int $configItemId
     * @return \jtl\Connector\Model\ConfigItemI18n
     */
    public function setConfigItemId($configItemId)
    {
        $this->_configItemId = (int)$configItemId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getConfigItemId()
    {
        return $this->_configItemId;
    }
    /**
     * @param int $languageIso
     * @return \jtl\Connector\Model\ConfigItemI18n
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
     * @param string $name
     * @return \jtl\Connector\Model\ConfigItemI18n
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
     * @param string $description
     * @return \jtl\Connector\Model\ConfigItemI18n
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
}
?>
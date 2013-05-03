<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * SpecificI18n Model
 * @access public
 */
abstract class SpecificI18n extends DataModel
{
    /**
     * @var int
     */
    protected $_languageIso;
    
    /**
     * @var int
     */
    protected $_specificId;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @param int $languageIso
     * @return \jtl\Connector\Model\SpecificI18n
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
     * @param int $specificId
     * @return \jtl\Connector\Model\SpecificI18n
     */
    public function setSpecificId($specificId)
    {
        $this->_specificId = (int)$specificId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getSpecificId()
    {
        return $this->_specificId;
    }
    /**
     * @param string $name
     * @return \jtl\Connector\Model\SpecificI18n
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
}
?>
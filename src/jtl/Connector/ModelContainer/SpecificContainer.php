<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\ModelContainer
 */

namespace jtl\Connector\ModelContainer;

/**
 * Specific Container Class
 * @access public
 */
class SpecificContainer extends CoreContainer
{
    /**
     * @var \jtl\Connector\Model\Specific[]
     */
    protected $_specifics;
    
    /**
     * @var \jtl\Connector\Model\SpecificI18n[]
     */
    protected $_specificI18ns;
    
    /**
     * @var \jtl\Connector\Model\SpecificValue[]
     */
    protected $_specificValues;
    
    /**
     * @var \jtl\Connector\Model\SpecificValueI18n[]
     */
    protected $_specificValueI18ns;
        
    /**
     * @return array \jtl\Connector\Model\Specific
     */
    public function getSpecifics()
    {
        return $this->_specifics;
    }
        
    /**
     * @return array \jtl\Connector\Model\SpecificI18n
     */
    public function getSpecificI18ns()
    {
        return $this->_specificI18ns;
    }
        
    /**
     * @return array \jtl\Connector\Model\SpecificValue
     */
    public function getSpecificValues()
    {
        return $this->_specificValues;
    }
        
    /**
     * @return array \jtl\Connector\Model\SpecificValueI18n
     */
    public function getSpecificValueI18ns()
    {
        return $this->_specificValueI18ns;
    }

    /**
     * (non-PHPdoc)
     * @see \jtl\Connector\ModelContainer\CoreContainer::getMainModel()
     */
    public function getMainModel()
    {
        $arr = $this->getSpecifics();

        return reset($arr) ?: null;
    }
        
    public $items = array(
        "specific" => array("Specific", "Specifics"),
        "specific_i18n" => array("SpecificI18n", "SpecificI18ns"),
        "specific_value" => array("SpecificValue", "SpecificValues"),
        "specific_value_i18n" => array("SpecificValueI18n", "SpecificValueI18ns")
    );
}
?>
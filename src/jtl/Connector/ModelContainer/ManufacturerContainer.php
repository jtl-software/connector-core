<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\ModelContainer
 */

namespace jtl\Connector\ModelContainer;

/**
 * Manufacturer Container Class
 * @access public
 */
class ManufacturerContainer extends CoreContainer
{
    /**
     * @var \jtl\Connector\Model\Manufacturer[]
     */
    protected $_manufacturers;
    
    /**
     * @var \jtl\Connector\Model\ManufacturerI18n[]
     */
    protected $_manufacturerI18ns;
        
    /**
     * @return array \jtl\Connector\Model\Manufacturer
     */
    public function getManufacturers()
    {
        return $this->_manufacturers;
    }
        
    /**
     * @return array \jtl\Connector\Model\ManufacturerI18n
     */
    public function getManufacturerI18ns()
    {
        return $this->_manufacturerI18ns;
    }

    /**
     * (non-PHPdoc)
     * @see \jtl\Connector\ModelContainer\CoreContainer::getMainModel()
     */
    public function getMainModel()
    {
        $arr = $this->getManufacturers();

        return reset($arr) ?: null;
    }
        
    public $items = array(
        "manufacturer" => array("Manufacturer", "Manufacturers"),
        "manufacturer_i18n" => array("ManufacturerI18n", "ManufacturerI18ns")
    );
}
?>
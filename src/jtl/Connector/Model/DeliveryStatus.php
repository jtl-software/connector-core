<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * DeliveryStatus Model
 * Localized delivery status text. Delivery status is set in the Wawi-ERP. 
 *
 * @access public
 */
class DeliveryStatus extends DataModel
{
    /**
     * @var string DeliveryStatus id
     */
    protected $_id = '';
    
    /**
     * @var string Locale
     */
    protected $_localeName = '';
    
    /**
     * @var string Localized delivery status text
     */
    protected $_name = '';
    
    /**
     * DeliveryStatus Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            if ($value === null) {
                $this->$name = null;
                return;
            }
        
            switch ($name) {
                case "_id":
                case "_localeName":
                case "_name":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id DeliveryStatus id
     * @return \jtl\Connector\Model\DeliveryStatus
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string DeliveryStatus id
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param string $localeName Locale
     * @return \jtl\Connector\Model\DeliveryStatus
     */
    public function setLocaleName($localeName)
    {
        $this->_localeName = (string)$localeName;
        return $this;
    }
    
    /**
     * @return string Locale
     */
    public function getLocaleName()
    {
        return $this->_localeName;
    }
    
    /**
     * @param string $name Localized delivery status text
     * @return \jtl\Connector\Model\DeliveryStatus
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string Localized delivery status text
     */
    public function getName()
    {
        return $this->_name;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}
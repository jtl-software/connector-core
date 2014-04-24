<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage GlobalData
 */

namespace jtl\Connector\Model;

/**
 * Localized delivery status text. Delivery status is set in the Wawi-ERP. 
 *
 * @access public
 * @subpackage GlobalData
 */
class DeliveryStatus extends DataModel
{
    /**
     * @var Identity DeliveryStatus id
     */
    protected $_id = null;
    
    /**
     * @var string Locale
     */
    protected $_localeName = '';
    
    /**
     * @var string Localized delivery status text
     */
    protected $_name = '';
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_id'
    );
    
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
                
                    $this->$name = Identity::convert($value);
                    break;
            
                case "_localeName":
                case "_name":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $id DeliveryStatus id
     * @return \jtl\Connector\Model\DeliveryStatus
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity DeliveryStatus id
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
}
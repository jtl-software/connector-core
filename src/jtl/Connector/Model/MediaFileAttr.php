<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Monolingual mediafile attribute.
 *
 * @access public
 * @subpackage Product
 */
class MediaFileAttr extends DataModel
{
    /**
     * @var int Unique MediaFileAttr id
     */
    protected $_id = 0;
    
    /**
     * @var Identity Reference to mediaFile
     */
    protected $_mediaFileId = null;
    
    /**
     * @var string Locale
     */
    protected $_localeName = '';
    
    /**
     * @var string Attribute name
     */
    protected $_key = '';
    
    /**
     * @var string Attribute value
     */
    protected $_value = '';
    
    /**
     * MediaFileAttr Setter
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
                
                    $this->$name = (int)$value;
                    break;
            
                case "_mediaFileId":
                
                    $this->$name = ($value instanceof Identity) ? $value : null;
                    break;
            
                case "_localeName":
                case "_key":
                case "_value":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param int $id Unique MediaFileAttr id
     * @return \jtl\Connector\Model\MediaFileAttr
     */
    public function setId($id)
    {
        $this->_id = (int)$id;
        return $this;
    }
    
    /**
     * @return int Unique MediaFileAttr id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param Identity $mediaFileId Reference to mediaFile
     * @return \jtl\Connector\Model\MediaFileAttr
     */
    public function setMediaFileId(Identity $mediaFileId)
    {
        $this->_mediaFileId = $mediaFileId;
        return $this;
    }
    
    /**
     * @return Identity Reference to mediaFile
     */
    public function getMediaFileId()
    {
        return $this->_mediaFileId;
    }
    /**
     * @param string $localeName Locale
     * @return \jtl\Connector\Model\MediaFileAttr
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
     * @param string $key Attribute name
     * @return \jtl\Connector\Model\MediaFileAttr
     */
    public function setKey($key)
    {
        $this->_key = (string)$key;
        return $this;
    }
    
    /**
     * @return string Attribute name
     */
    public function getKey()
    {
        return $this->_key;
    }
    /**
     * @param string $value Attribute value
     * @return \jtl\Connector\Model\MediaFileAttr
     */
    public function setValue($value)
    {
        $this->_value = (string)$value;
        return $this;
    }
    
    /**
     * @return string Attribute value
     */
    public function getValue()
    {
        return $this->_value;
    }
}
<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * MediaFileAttr Model
 * Monolingual mediafile attribute.
 *
 * @access public
 */
class MediaFileAttr extends DataModel
{
    /**
     * @var int Unique MediaFileAttr id
     */
    protected $_id = 0;
    
    /**
     * @var string Reference to mediaFile
     */
    protected $_mediaFileId = '';
    
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
     * @param string $mediaFileId Reference to mediaFile
     * @return \jtl\Connector\Model\MediaFileAttr
     */
    public function setMediaFileId($mediaFileId)
    {
        $this->_mediaFileId = (string)$mediaFileId;
        return $this;
    }
    
    /**
     * @return string Reference to mediaFile
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
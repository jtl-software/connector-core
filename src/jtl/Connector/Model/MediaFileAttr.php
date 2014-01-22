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
     * @var int - Unique MediaFileAttr id
     */
    protected $_id = 0;
    
    /**
     * @var string - Reference to mediaFile
     */
    protected $_mediaFileId = '';
    
    /**
     * @var string - Locale
     */
    protected $_localeName = '';
    
    /**
     * @var string - Attribute name
     */
    protected $_key = '';
    
    /**
     * @var string - Attribute value
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
     * @param int $id
     * @return \jtl\Connector\Model\MediaFileAttr
     */
    public function setId($id)
    {
        $this->_id = (int)$id;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param string $mediaFileId
     * @return \jtl\Connector\Model\MediaFileAttr
     */
    public function setMediaFileId($mediaFileId)
    {
        $this->_mediaFileId = (string)$mediaFileId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getMediaFileId()
    {
        return $this->_mediaFileId;
    }
    
    /**
     * @param string $localeName
     * @return \jtl\Connector\Model\MediaFileAttr
     */
    public function setLocaleName($localeName)
    {
        $this->_localeName = (string)$localeName;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getLocaleName()
    {
        return $this->_localeName;
    }
    
    /**
     * @param string $key
     * @return \jtl\Connector\Model\MediaFileAttr
     */
    public function setKey($key)
    {
        $this->_key = (string)$key;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getKey()
    {
        return $this->_key;
    }
    
    /**
     * @param string $value
     * @return \jtl\Connector\Model\MediaFileAttr
     */
    public function setValue($value)
    {
        $this->_value = (string)$value;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getValue()
    {
        return $this->_value;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}
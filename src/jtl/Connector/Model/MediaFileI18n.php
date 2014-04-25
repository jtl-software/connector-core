<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

/**
 * Locale specific mediafile name + description.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 */
class MediaFileI18n extends DataModel
{
    /**
     * @var Identity Reference to mediaFile
     */
    protected $_mediaFileId = null;
    
    /**
     * @var string Locale
     */
    protected $_localeName = '';
    
    /**
     * @var string Locale specific name
     */
    protected $_name = '';
    
    /**
     * @var string Locale specific description
     */
    protected $_description = '';
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_mediaFileId'
    );
    
    /**
     * MediaFileI18n Setter
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
                case "_mediaFileId":
                
                    $this->$name = Identity::convert($value);
                    break;
            
                case "_localeName":
                case "_name":
                case "_description":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $mediaFileId Reference to mediaFile
     * @return \jtl\Connector\Model\MediaFileI18n
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
     * @return \jtl\Connector\Model\MediaFileI18n
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
     * @param string $name Locale specific name
     * @return \jtl\Connector\Model\MediaFileI18n
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string Locale specific name
     */
    public function getName()
    {
        return $this->_name;
    }
    /**
     * @param string $description Locale specific description
     * @return \jtl\Connector\Model\MediaFileI18n
     */
    public function setDescription($description)
    {
        $this->_description = (string)$description;
        return $this;
    }
    
    /**
     * @return string Locale specific description
     */
    public function getDescription()
    {
        return $this->_description;
    }
}
<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * MediaFileAttr Model
 * @access public
 */
abstract class MediaFileAttr extends Model
{
    /**
     * @var 
     */
    protected $_mediaFileAttr;
    
    /**
     * @var 
     */
    protected $_mediaFileId;
    
    /**
     * @var 
     */
    protected $_languageISO;
    
    /**
     * @var int
     */
    protected $_name;
    
    /**
     * @var 
     */
    protected $_value;
    
    /**
     * @param  $mediaFileAttr
     * @return \jtl\Connector\Model\MediaFileAttr
     */
    public function setMediaFileAttr($mediaFileAttr)
    {
        $this->_mediaFileAttr = ()$mediaFileAttr;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getMediaFileAttr()
    {
        return $this->_mediaFileAttr;
    }
    
    /**
     * @param  $mediaFileId
     * @return \jtl\Connector\Model\MediaFileAttr
     */
    public function setMediaFileId($mediaFileId)
    {
        $this->_mediaFileId = ()$mediaFileId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getMediaFileId()
    {
        return $this->_mediaFileId;
    }
    
    /**
     * @param  $languageISO
     * @return \jtl\Connector\Model\MediaFileAttr
     */
    public function setLanguageISO($languageISO)
    {
        $this->_languageISO = ()$languageISO;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getLanguageISO()
    {
        return $this->_languageISO;
    }
    
    /**
     * @param int $name
     * @return \jtl\Connector\Model\MediaFileAttr
     */
    public function setName($name)
    {
        $this->_name = (int)$name;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getName()
    {
        return $this->_name;
    }
    
    /**
     * @param  $value
     * @return \jtl\Connector\Model\MediaFileAttr
     */
    public function setValue($value)
    {
        $this->_value = ()$value;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getValue()
    {
        return $this->_value;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/MediaFileAttr/MediaFileAttr.json", $this->getPublic(array()));
    }
}
?>
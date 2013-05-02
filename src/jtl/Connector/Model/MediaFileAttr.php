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
     * @var int
     */
    protected $_mediaFileAttr;
    
    /**
     * @var int
     */
    protected $_mediaFileId;
    
    /**
     * @var int
     */
    protected $_languageISO;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @var string
     */
    protected $_value;
    
    /**
     * @param int $mediaFileAttr
     * @return \jtl\Connector\Model\MediaFileAttr
     */
    public function setMediaFileAttr($mediaFileAttr)
    {
        $this->_mediaFileAttr = (int)$mediaFileAttr;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getMediaFileAttr()
    {
        return $this->_mediaFileAttr;
    }
    
    /**
     * @param int $mediaFileId
     * @return \jtl\Connector\Model\MediaFileAttr
     */
    public function setMediaFileId($mediaFileId)
    {
        $this->_mediaFileId = (int)$mediaFileId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getMediaFileId()
    {
        return $this->_mediaFileId;
    }
    
    /**
     * @param int $languageISO
     * @return \jtl\Connector\Model\MediaFileAttr
     */
    public function setLanguageISO($languageISO)
    {
        $this->_languageISO = (int)$languageISO;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getLanguageISO()
    {
        return $this->_languageISO;
    }
    
    /**
     * @param string $name
     * @return \jtl\Connector\Model\MediaFileAttr
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
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/MediaFileAttr/MediaFileAttr.json", $this->getPublic(array()));
    }
}
?>
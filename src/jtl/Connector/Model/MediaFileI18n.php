<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * MediaFileI18n Model
 * @access public
 */
abstract class MediaFileI18n extends Model
{
    /**
     * @var 
     */
    protected $_mediaFileId;
    
    /**
     * @var 
     */
    protected $_languageIso;
    
    /**
     * @var int
     */
    protected $_name;
    
    /**
     * @var string
     */
    protected $_description;
    
    /**
     * @param  $mediaFileId
     * @return \jtl\Connector\Model\MediaFileI18n
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
     * @param  $languageIso
     * @return \jtl\Connector\Model\MediaFileI18n
     */
    public function setLanguageIso($languageIso)
    {
        $this->_languageIso = ()$languageIso;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getLanguageIso()
    {
        return $this->_languageIso;
    }
    
    /**
     * @param int $name
     * @return \jtl\Connector\Model\MediaFileI18n
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
     * @param string $description
     * @return \jtl\Connector\Model\MediaFileI18n
     */
    public function setDescription($description)
    {
        $this->_description = (string)$description;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->_description;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/MediaFileI18n/MediaFileI18n.json", $this->getPublic(array()));
    }
}
?>
<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * FileDownloadI18n Model
 * Localized fileDownload name and  description.
 *
 * @access public
 */
class FileDownloadI18n extends DataModel
{
    /**
     * @var string - Reference to fileDownloadId
     */
    protected $_fileDownloadId = '';
    
    /**
     * @var string - Locale
     */
    protected $_localeName = '';
    
    /**
     * @var string - File download title / name
     */
    protected $_name = '';
    
    /**
     * @var string - Optional File download description
     */
    protected $_description = '';
    
    /**
     * FileDownloadI18n Setter
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
                case "_fileDownloadId":
                case "_localeName":
                case "_name":
                case "_description":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $fileDownloadId
     * @return \jtl\Connector\Model\FileDownloadI18n
     */
    public function setFileDownloadId($fileDownloadId)
    {
        $this->_fileDownloadId = (string)$fileDownloadId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getFileDownloadId()
    {
        return $this->_fileDownloadId;
    }
    
    /**
     * @param string $localeName
     * @return \jtl\Connector\Model\FileDownloadI18n
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
     * @param string $name
     * @return \jtl\Connector\Model\FileDownloadI18n
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
     * @param string $description
     * @return \jtl\Connector\Model\FileDownloadI18n
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
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}
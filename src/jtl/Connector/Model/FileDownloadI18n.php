<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * FileDownloadI18n Model
 * @access public
 */
abstract class FileDownloadI18n extends Model
{
    /**
     * @var double
     */
    protected $_fileDownloadId;
    
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
     * @param double $fileDownloadId
     * @return \jtl\Connector\Model\FileDownloadI18n
     */
    public function setFileDownloadId($fileDownloadId)
    {
        $this->_fileDownloadId = (double)$fileDownloadId;
        return $this;
    }
    
    /**
     * @return double
     */
    public function getFileDownloadId()
    {
        return $this->_fileDownloadId;
    }
    
    /**
     * @param  $languageIso
     * @return \jtl\Connector\Model\FileDownloadI18n
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
     * @return \jtl\Connector\Model\FileDownloadI18n
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
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/FileDownloadI18n/FileDownloadI18n.json", $this->getPublic(array()));
    }
}
?>
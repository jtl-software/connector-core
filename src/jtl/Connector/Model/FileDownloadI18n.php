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
     * @var int
     */
    protected $_fileDownloadId;
    
    /**
     * @var int
     */
    protected $_languageIso;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @var string
     */
    protected $_description;
    
    /**
     * @param int $fileDownloadId
     * @return \jtl\Connector\Model\FileDownloadI18n
     */
    public function setFileDownloadId($fileDownloadId)
    {
        $this->_fileDownloadId = (int)$fileDownloadId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getFileDownloadId()
    {
        return $this->_fileDownloadId;
    }
    
    /**
     * @param int $languageIso
     * @return \jtl\Connector\Model\FileDownloadI18n
     */
    public function setLanguageIso($languageIso)
    {
        $this->_languageIso = (int)$languageIso;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getLanguageIso()
    {
        return $this->_languageIso;
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
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/filedownloadi18n/filedownloadi18n.json", $this->getPublic(array()));
    }
}
?>
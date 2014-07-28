<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Localized fileDownload name and  description..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class FileDownloadI18n extends DataModel
{
    /**
     * @type Identity Reference to fileDownloadId
     */
    protected $fileDownloadId = null;

    /**
     * @type string Optional File download description
     */
    protected $description = '';

    /**
     * @type string Locale
     */
    protected $localeName = '';

    /**
     * @type string File download title / name
     */
    protected $name = '';


    /**
     * @type array list of identities
     */
    public $identities = array(
        'fileDownloadId',
    );

    /**
     * @type array list of navigations
     */
    public $navigations = array(
    );

    /**
     * @return array 
     */
    public function getIdentities()
    {
        return $this->identities;
    }

    /**
     * @return array 
     */
    public function getNavigations()
    {
        return $this->navigations;
    }

    /**
     * @param  string $name File download title / name
     * @return \jtl\Connector\Model\FileDownloadI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }
    
    /**
     * @return string File download title / name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param  string $description Optional File download description
     * @return \jtl\Connector\Model\FileDownloadI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setDescription($description)
    {
        return $this->setProperty('description', $description, 'string');
    }
    
    /**
     * @return string Optional File download description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param  Identity $fileDownloadId Reference to fileDownloadId
     * @return \jtl\Connector\Model\FileDownloadI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setFileDownloadId(Identity $fileDownloadId)
    {
        return $this->setProperty('fileDownloadId', $fileDownloadId, 'Identity');
    }
    
    /**
     * @return Identity Reference to fileDownloadId
     */
    public function getFileDownloadId()
    {
        return $this->fileDownloadId;
    }

    /**
     * @param  string $localeName Locale
     * @return \jtl\Connector\Model\FileDownloadI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setLocaleName($localeName)
    {
        return $this->setProperty('localeName', $localeName, 'string');
    }
    
    /**
     * @return string Locale
     */
    public function getLocaleName()
    {
        return $this->localeName;
    }
}


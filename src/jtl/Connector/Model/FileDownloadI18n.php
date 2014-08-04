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
     protected $identities = array(
        'fileDownloadId',
    );

    /**
     * @param  Identity $fileDownloadId Reference to fileDownloadId
     * @return \jtl\Connector\Model\FileDownloadI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setFileDownloadId(Identity $fileDownloadId)
    {
        return $this->setProperty('FileDownloadId', $fileDownloadId, 'Identity');
    }

    /**
     * @return Identity Reference to fileDownloadId
     */
    public function getFileDownloadId()
    {
        return $this->fileDownloadId;
    }

    /**
     * @param  string $description Optional File download description
     * @return \jtl\Connector\Model\FileDownloadI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setDescription(Identity $description)
    {
        return $this->setProperty('Description', $description, 'string');
    }

    /**
     * @return string Optional File download description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param  string $localeName Locale
     * @return \jtl\Connector\Model\FileDownloadI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setLocaleName(Identity $localeName)
    {
        return $this->setProperty('LocaleName', $localeName, 'string');
    }

    /**
     * @return string Locale
     */
    public function getLocaleName()
    {
        return $this->localeName;
    }

    /**
     * @param  string $name File download title / name
     * @return \jtl\Connector\Model\FileDownloadI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setName(Identity $name)
    {
        return $this->setProperty('Name', $name, 'string');
    }

    /**
     * @return string File download title / name
     */
    public function getName()
    {
        return $this->name;
    }

 
}

<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * File download properties. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class FileDownload extends DataModel
{
    /**
     * @type Identity Unique fileDownload id
     */
    public $_id = null;

    /**
     * @type DateTime|null Optional creation date
     */
    public $_created = null;

    /**
     * @type string 
     */
    public $_internalId = '';

    /**
     * @type integer|null Optional max days to allow Download, starting from payment date. Default 0 for no time limit. 
     */
    public $_maxDays = 0;

    /**
     * @type integer|null Optional max number of allowed downloads per customer. Default 0 for no maximum download limit. 
     */
    public $_maxDownloads = 0;

    /**
     * @type string Path to download file
     */
    public $_path = '';

    /**
     * @type string Optional path to preview file
     */
    public $_previewPath = '';

    /**
     * @type integer|null Optional sort number
     */
    public $_sort = 0;

    /**
     * Nav [FileDownload » One]
     *
     * @type \jtl\Connector\Model\FileDownloadI18n[]
     */
    public $_i18n = array();


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_id',
    );

    /**
     * @type array list of navigations
     */
    public $_navigations = array(
        '_i18n' => '\jtl\Connector\Model\FileDownloadI18n',
    );

    /**
     * @return array 
     */
    public function getIdentities()
    {
        return $this->_identities;
    }

    /**
     * @return array 
     */
    public function getNavigations()
    {
        return $this->_navigations;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function setProperty($name, $value, $type)
    {
        if (!$this->validateType($value, $type)) {
            throw new InvalidArgumentException(sprintf("expected type %s, given value %s.", $type, gettype($value)));
        }
        $this->{$name} = $value;
        return $this;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function validateType($value, $type)
    {
        switch ($type)
        {
            case 'boolean':
                return is_bool($value);
            case 'integer':
                return is_integer($value);
            case 'float':
                return is_float($value);
            case 'string':
                return is_string($value);
            case 'array':
                return is_array($value);
            default:
                throw new InvalidArgumentException('type validator not found');
        }
    }

    /**
     * @param  string $internalId 
     * @return \jtl\Connector\Model\FileDownload
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setInternalId($internalId)
    {
        return $this->setProperty('_internalId', $internalId, 'string');
    }
    
    /**
     * @return string 
     */
    public function getInternalId()
    {
        return $this->_internalId;
    }

    /**
     * @param  string $path Path to download file
     * @return \jtl\Connector\Model\FileDownload
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setPath($path)
    {
        return $this->setProperty('_path', $path, 'string');
    }
    
    /**
     * @return string Path to download file
     */
    public function getPath()
    {
        return $this->_path;
    }

    /**
     * @param  string $previewPath Optional path to preview file
     * @return \jtl\Connector\Model\FileDownload
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setPreviewPath($previewPath)
    {
        return $this->setProperty('_previewPath', $previewPath, 'string');
    }
    
    /**
     * @return string Optional path to preview file
     */
    public function getPreviewPath()
    {
        return $this->_previewPath;
    }

    /**
     * @param  integer $maxDownloads Optional max number of allowed downloads per customer. Default 0 for no maximum download limit. 
     * @return \jtl\Connector\Model\FileDownload
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setMaxDownloads($maxDownloads)
    {
        return $this->setProperty('_maxDownloads', $maxDownloads, 'integer');
    }
    
    /**
     * @return integer Optional max number of allowed downloads per customer. Default 0 for no maximum download limit. 
     */
    public function getMaxDownloads()
    {
        return $this->_maxDownloads;
    }

    /**
     * @param  integer $maxDays Optional max days to allow Download, starting from payment date. Default 0 for no time limit. 
     * @return \jtl\Connector\Model\FileDownload
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setMaxDays($maxDays)
    {
        return $this->setProperty('_maxDays', $maxDays, 'integer');
    }
    
    /**
     * @return integer Optional max days to allow Download, starting from payment date. Default 0 for no time limit. 
     */
    public function getMaxDays()
    {
        return $this->_maxDays;
    }

    /**
     * @param  DateTime $created Optional creation date
     * @return \jtl\Connector\Model\FileDownload
     * @throws InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setCreated(DateTime $created)
    {
        return $this->setProperty('_created', $created, 'DateTime');
    }
    
    /**
     * @return DateTime Optional creation date
     */
    public function getCreated()
    {
        return $this->_created;
    }

    /**
     * @param  integer $sort Optional sort number
     * @return \jtl\Connector\Model\FileDownload
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('_sort', $sort, 'integer');
    }
    
    /**
     * @return integer Optional sort number
     */
    public function getSort()
    {
        return $this->_sort;
    }

    /**
     * @param  Identity $id Unique fileDownload id
     * @return \jtl\Connector\Model\FileDownload
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('_id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique fileDownload id
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param  \jtl\Connector\Model\FileDownloadI18n $i18n
     * @return \jtl\Connector\Model\FileDownload
     */
    public function addI18n(\jtl\Connector\Model\FileDownloadI18n $i18n)
    {
        $this->_i18n[] = $i18n;
        return $this;
    }
    
    /**
     * @return FileDownloadI18n
     */
    public function getI18n()
    {
        return $this->_i18n;
    }

    /**
     * @return \jtl\Connector\Model\FileDownload
     */
    public function clearI18n()
    {
        $this->_i18n = array();
        return $this;
    }
}


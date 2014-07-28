<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
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
    protected $_id = null;

    /**
     * @type DateTime|null Optional creation date
     */
    protected $_created = null;

    /**
     * @type string 
     */
    protected $_internalId = '';

    /**
     * @type integer|null Optional max days to allow Download, starting from payment date. Default 0 for no time limit. 
     */
    protected $_maxDays = 0;

    /**
     * @type integer|null Optional max number of allowed downloads per customer. Default 0 for no maximum download limit. 
     */
    protected $_maxDownloads = 0;

    /**
     * @type string Path to download file
     */
    protected $_path = '';

    /**
     * @type string Optional path to preview file
     */
    protected $_previewPath = '';

    /**
     * @type integer|null Optional sort number
     */
    protected $_sort = 0;


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
	);

	/**
	 * @param  string $internalId 
	 * @return \jtl\Connector\Model\FileDownload
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setInternalId($internalId)
	{
		if (!is_string($internalId))
			throw new InvalidArgumentException('string expected.');
		$this->_internalId = $internalId;
		return $this;
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
		if (!is_string($path))
			throw new InvalidArgumentException('string expected.');
		$this->_path = $path;
		return $this;
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
		if (!is_string($previewPath))
			throw new InvalidArgumentException('string expected.');
		$this->_previewPath = $previewPath;
		return $this;
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
		if (!is_integer($maxDownloads))
			throw new InvalidArgumentException('integer expected.');
		$this->_maxDownloads = $maxDownloads;
		return $this;
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
		if (!is_integer($maxDays))
			throw new InvalidArgumentException('integer expected.');
		$this->_maxDays = $maxDays;
		return $this;
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
		
		$this->_created = $created;
		return $this;
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
		if (!is_integer($sort))
			throw new InvalidArgumentException('integer expected.');
		$this->_sort = $sort;
		return $this;
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
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique fileDownload id
	 */
	public function getId()
	{
		return $this->_id;
	}
}


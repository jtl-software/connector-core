<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Localized fileDownload name and  description..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class FileDownloadI18n extends DataModel
{
    /**
     * @type Identity Reference to fileDownloadId
     */
    protected $_fileDownloadId = null;

    /**
     * @type string Optional File download description
     */
    protected $_description = '';

    /**
     * @type string Locale
     */
    protected $_localeName = '';

    /**
     * @type string File download title / name
     */
    protected $_name = '';


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_fileDownloadId',
	);

	/**
	 * @param  string $name File download title / name
	 * @return \jtl\Connector\Model\FileDownloadI18n
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setName($name)
	{
		if (!is_string($name))
			throw new InvalidArgumentException('string expected.');
		$this->_name = $name;
		return $this;
	}
	
	/**
	 * @return string File download title / name
	 */
	public function getName()
	{
		return $this->_name;
	}

	/**
	 * @param  string $description Optional File download description
	 * @return \jtl\Connector\Model\FileDownloadI18n
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setDescription($description)
	{
		if (!is_string($description))
			throw new InvalidArgumentException('string expected.');
		$this->_description = $description;
		return $this;
	}
	
	/**
	 * @return string Optional File download description
	 */
	public function getDescription()
	{
		return $this->_description;
	}

	/**
	 * @param  Identity $fileDownloadId Reference to fileDownloadId
	 * @return \jtl\Connector\Model\FileDownloadI18n
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setFileDownloadId(Identity $fileDownloadId)
	{
		
		$this->_fileDownloadId = $fileDownloadId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to fileDownloadId
	 */
	public function getFileDownloadId()
	{
		return $this->_fileDownloadId;
	}

	/**
	 * @param  string $localeName Locale
	 * @return \jtl\Connector\Model\FileDownloadI18n
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setLocaleName($localeName)
	{
		if (!is_string($localeName))
			throw new InvalidArgumentException('string expected.');
		$this->_localeName = $localeName;
		return $this;
	}
	
	/**
	 * @return string Locale
	 */
	public function getLocaleName()
	{
		return $this->_localeName;
	}
}


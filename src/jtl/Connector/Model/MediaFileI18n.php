<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Locale specific mediafile name + description..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class MediaFileI18n extends DataModel
{
    /**
     * @type Identity Reference to mediaFile
     */
    protected $_mediaFileId = null;

    /**
     * @type string Locale specific description
     */
    protected $_description = '';

    /**
     * @type string Locale
     */
    protected $_localeName = '';

    /**
     * @type string Locale specific name
     */
    protected $_name = '';

    /**
	 * Nav [MediaFileI18n » Many]
	 *
     * @type \jtl\Connector\Model\MediaFile[]
     */
    protected $_mediaFile = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_mediaFileId',
	);

	/**
	 * @param  string $name Locale specific name
	 * @return \jtl\Connector\Model\MediaFileI18n
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
	 * @return string Locale specific name
	 */
	public function getName()
	{
		return $this->_name;
	}

	/**
	 * @param  string $description Locale specific description
	 * @return \jtl\Connector\Model\MediaFileI18n
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
	 * @return string Locale specific description
	 */
	public function getDescription()
	{
		return $this->_description;
	}

	/**
	 * @param  Identity $mediaFileId Reference to mediaFile
	 * @return \jtl\Connector\Model\MediaFileI18n
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setMediaFileId(Identity $mediaFileId)
	{
		
		$this->_mediaFileId = $mediaFileId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to mediaFile
	 */
	public function getMediaFileId()
	{
		return $this->_mediaFileId;
	}

	/**
	 * @param  string $localeName Locale
	 * @return \jtl\Connector\Model\MediaFileI18n
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

	/**
	 * @param  \jtl\Connector\Model\MediaFile $mediaFile
	 * @return \jtl\Connector\Model\MediaFileI18n
	 */
	public function addMediaFile(\jtl\Connector\Model\MediaFile $mediaFile)
	{
		$this->_mediaFile[] = $mediaFile;
		return $this;
	}
	
	/**
	 * @return MediaFile
	 */
	public function getMediaFile()
	{
		return $this->_mediaFile;
	}

	/**
	 * @return \jtl\Connector\Model\MediaFileI18n
	 */
	public function clearMediaFile()
	{
		$this->_mediaFile = array();
		return $this;
	}
}


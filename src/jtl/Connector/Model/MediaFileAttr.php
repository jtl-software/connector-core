<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Monolingual mediafile attribute..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class MediaFileAttr extends DataModel
{
    /**
     * @type Identity Unique MediaFileAttr id
     */
    protected $_id = null;

    /**
     * @type Identity Reference to mediaFile
     */
    protected $_mediaFileId = null;

    /**
     * @type string Attribute name
     */
    protected $_key = '';

    /**
     * @type string Locale
     */
    protected $_localeName = '';

    /**
     * @type string Attribute value
     */
    protected $_value = '';

    /**
	 * Nav [MediaFileAttr » Many]
	 *
     * @type \jtl\Connector\Model\MediaFile[]
     */
    protected $_mediaFile = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
		'_mediaFileId',
	);

	/**
	 * @param  string $key Attribute name
	 * @return \jtl\Connector\Model\MediaFileAttr
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setKey($key)
	{
		if (!is_string($key))
			throw new InvalidArgumentException('string expected.');
		$this->_key = $key;
		return $this;
	}
	
	/**
	 * @return string Attribute name
	 */
	public function getKey()
	{
		return $this->_key;
	}

	/**
	 * @param  string $value Attribute value
	 * @return \jtl\Connector\Model\MediaFileAttr
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setValue($value)
	{
		if (!is_string($value))
			throw new InvalidArgumentException('string expected.');
		$this->_value = $value;
		return $this;
	}
	
	/**
	 * @return string Attribute value
	 */
	public function getValue()
	{
		return $this->_value;
	}

	/**
	 * @param  Identity $id Unique MediaFileAttr id
	 * @return \jtl\Connector\Model\MediaFileAttr
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique MediaFileAttr id
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  Identity $mediaFileId Reference to mediaFile
	 * @return \jtl\Connector\Model\MediaFileAttr
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
	 * @return \jtl\Connector\Model\MediaFileAttr
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
	 * @return \jtl\Connector\Model\MediaFileAttr
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
	 * @return \jtl\Connector\Model\MediaFileAttr
	 */
	public function clearMediaFile()
	{
		$this->_mediaFile = array();
		return $this;
	}
}


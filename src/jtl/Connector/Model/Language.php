<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Global language model.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class Language extends DataModel
{
    /**
     * @type Identity Unique language id
     */
    protected $_id = null;

    /**
     * @type boolean Flag default language for frontend. Exact 1 language must be marked as default.
     */
    protected $_isDefault = false;

    /**
     * @type string Locale
     */
    protected $_localeName = '';

    /**
     * @type string English term
     */
    protected $_nameEnglish = '';

    /**
     * @type string German term
     */
    protected $_nameGerman = '';


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
	);

	/**
	 * @param  string $nameEnglish English term
	 * @return \jtl\Connector\Model\Language
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setNameEnglish($nameEnglish)
	{
		if (!is_string($nameEnglish))
			throw new InvalidArgumentException('string expected.');
		$this->_nameEnglish = $nameEnglish;
		return $this;
	}
	
	/**
	 * @return string English term
	 */
	public function getNameEnglish()
	{
		return $this->_nameEnglish;
	}

	/**
	 * @param  string $nameGerman German term
	 * @return \jtl\Connector\Model\Language
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setNameGerman($nameGerman)
	{
		if (!is_string($nameGerman))
			throw new InvalidArgumentException('string expected.');
		$this->_nameGerman = $nameGerman;
		return $this;
	}
	
	/**
	 * @return string German term
	 */
	public function getNameGerman()
	{
		return $this->_nameGerman;
	}

	/**
	 * @param  string $localeName Locale
	 * @return \jtl\Connector\Model\Language
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
	 * @param  Identity $id Unique language id
	 * @return \jtl\Connector\Model\Language
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique language id
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  boolean $isDefault Flag default language for frontend. Exact 1 language must be marked as default.
	 * @return \jtl\Connector\Model\Language
	 * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
	 */
	public function setIsDefault($isDefault)
	{
		if (!is_bool($isDefault))
			throw new InvalidArgumentException('boolean expected.');
		$this->_isDefault = $isDefault;
		return $this;
	}
	
	/**
	 * @return boolean Flag default language for frontend. Exact 1 language must be marked as default.
	 */
	public function getIsDefault()
	{
		return $this->_isDefault;
	}
}


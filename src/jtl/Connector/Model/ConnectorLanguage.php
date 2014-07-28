<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ConnectorLanguage extends DataModel
{
    /**
     * @type integer 
     */
    protected $_connectorId = 0;

    /**
     * @type boolean 
     */
    protected $_isDefault = false;

    /**
     * @type integer 
     */
    protected $_languageId = 0;

    /**
	 * Nav [ConnectorLanguage » Many]
	 *
     * @type \jtl\Connector\Model\Connector[]
     */
    protected $_connector = array();

    /**
	 * Nav [ConnectorLanguage » Many]
	 *
     * @type \jtl\Connector\Model\Language[]
     */
    protected $_language = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
	);

	/**
	 * @param  integer $connectorId 
	 * @return \jtl\Connector\Model\ConnectorLanguage
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setConnectorId($connectorId)
	{
		if (!is_integer($connectorId))
			throw new InvalidArgumentException('integer expected.');
		$this->_connectorId = $connectorId;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getConnectorId()
	{
		return $this->_connectorId;
	}

	/**
	 * @param  integer $languageId 
	 * @return \jtl\Connector\Model\ConnectorLanguage
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setLanguageId($languageId)
	{
		if (!is_integer($languageId))
			throw new InvalidArgumentException('integer expected.');
		$this->_languageId = $languageId;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getLanguageId()
	{
		return $this->_languageId;
	}

	/**
	 * @param  boolean $isDefault 
	 * @return \jtl\Connector\Model\ConnectorLanguage
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
	 * @return boolean 
	 */
	public function getIsDefault()
	{
		return $this->_isDefault;
	}

	/**
	 * @param  \jtl\Connector\Model\Connector $connector
	 * @return \jtl\Connector\Model\ConnectorLanguage
	 */
	public function addConnector(\jtl\Connector\Model\Connector $connector)
	{
		$this->_connector[] = $connector;
		return $this;
	}
	
	/**
	 * @return Connector
	 */
	public function getConnector()
	{
		return $this->_connector;
	}

	/**
	 * @return \jtl\Connector\Model\ConnectorLanguage
	 */
	public function clearConnector()
	{
		$this->_connector = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\Language $language
	 * @return \jtl\Connector\Model\ConnectorLanguage
	 */
	public function addLanguage(\jtl\Connector\Model\Language $language)
	{
		$this->_language[] = $language;
		return $this;
	}
	
	/**
	 * @return Language
	 */
	public function getLanguage()
	{
		return $this->_language;
	}

	/**
	 * @return \jtl\Connector\Model\ConnectorLanguage
	 */
	public function clearLanguage()
	{
		$this->_language = array();
		return $this;
	}
}


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
class Connector extends DataModel
{
    /**
     * @type integer 
     */
    protected $_companyId = 0;

    /**
     * @type integer 
     */
    protected $_id = 0;

    /**
     * @type boolean 
     */
    protected $_isActive = false;

    /**
     * @type string 
     */
    protected $_name = '';

    /**
     * @type string 
     */
    protected $_token = '';

    /**
     * @type string 
     */
    protected $_url = '';

    /**
	 * Nav [Connector » One]
	 *
     * @type \jtl\Connector\Model\ConnectorCustomerGroup[]
     */
    protected $_customerGroups = array();

    /**
	 * Nav [Connector » One]
	 *
     * @type \jtl\Connector\Model\ConnectorLog[]
     */
    protected $_logMessages = array();

    /**
	 * Nav [Connector » One]
	 *
     * @type \jtl\Connector\Model\ConnectorCurrency[]
     */
    protected $_currencies = array();

    /**
	 * Nav [Connector » One]
	 *
     * @type \jtl\Connector\Model\ConnectorSyncQueue[]
     */
    protected $_syncQueues = array();

    /**
	 * Nav [Connector » One]
	 *
     * @type \jtl\Connector\Model\ConnectorLanguage[]
     */
    protected $_languages = array();

    /**
	 * Nav [Connector » One]
	 *
     * @type \jtl\Connector\Model\ConnectorLink[]
     */
    protected $_links = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
	);

	/**
	 * @param  integer $id 
	 * @return \jtl\Connector\Model\Connector
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setId($id)
	{
		if (!is_integer($id))
			throw new InvalidArgumentException('integer expected.');
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  integer $companyId 
	 * @return \jtl\Connector\Model\Connector
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setCompanyId($companyId)
	{
		if (!is_integer($companyId))
			throw new InvalidArgumentException('integer expected.');
		$this->_companyId = $companyId;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getCompanyId()
	{
		return $this->_companyId;
	}

	/**
	 * @param  string $name 
	 * @return \jtl\Connector\Model\Connector
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
	 * @return string 
	 */
	public function getName()
	{
		return $this->_name;
	}

	/**
	 * @param  string $url 
	 * @return \jtl\Connector\Model\Connector
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setUrl($url)
	{
		if (!is_string($url))
			throw new InvalidArgumentException('string expected.');
		$this->_url = $url;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getUrl()
	{
		return $this->_url;
	}

	/**
	 * @param  string $token 
	 * @return \jtl\Connector\Model\Connector
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setToken($token)
	{
		if (!is_string($token))
			throw new InvalidArgumentException('string expected.');
		$this->_token = $token;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getToken()
	{
		return $this->_token;
	}

	/**
	 * @param  boolean $isActive 
	 * @return \jtl\Connector\Model\Connector
	 * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
	 */
	public function setIsActive($isActive)
	{
		if (!is_bool($isActive))
			throw new InvalidArgumentException('boolean expected.');
		$this->_isActive = $isActive;
		return $this;
	}
	
	/**
	 * @return boolean 
	 */
	public function getIsActive()
	{
		return $this->_isActive;
	}

	/**
	 * @param  \jtl\Connector\Model\ConnectorCustomerGroup $customerGroup
	 * @return \jtl\Connector\Model\Connector
	 */
	public function addCustomerGroup(\jtl\Connector\Model\ConnectorCustomerGroup $customerGroup)
	{
		$this->_customerGroups[] = $customerGroup;
		return $this;
	}
	
	/**
	 * @return ConnectorCustomerGroup
	 */
	public function getCustomerGroups()
	{
		return $this->_customerGroups;
	}

	/**
	 * @return \jtl\Connector\Model\Connector
	 */
	public function clearCustomerGroups()
	{
		$this->_customerGroups = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\ConnectorLog $logMessage
	 * @return \jtl\Connector\Model\Connector
	 */
	public function addLogMessage(\jtl\Connector\Model\ConnectorLog $logMessage)
	{
		$this->_logMessages[] = $logMessage;
		return $this;
	}
	
	/**
	 * @return ConnectorLog
	 */
	public function getLogMessages()
	{
		return $this->_logMessages;
	}

	/**
	 * @return \jtl\Connector\Model\Connector
	 */
	public function clearLogMessages()
	{
		$this->_logMessages = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\ConnectorCurrency $currency
	 * @return \jtl\Connector\Model\Connector
	 */
	public function addCurrency(\jtl\Connector\Model\ConnectorCurrency $currency)
	{
		$this->_currencies[] = $currency;
		return $this;
	}
	
	/**
	 * @return ConnectorCurrency
	 */
	public function getCurrencies()
	{
		return $this->_currencies;
	}

	/**
	 * @return \jtl\Connector\Model\Connector
	 */
	public function clearCurrencies()
	{
		$this->_currencies = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\ConnectorSyncQueue $syncQueue
	 * @return \jtl\Connector\Model\Connector
	 */
	public function addSyncQueue(\jtl\Connector\Model\ConnectorSyncQueue $syncQueue)
	{
		$this->_syncQueues[] = $syncQueue;
		return $this;
	}
	
	/**
	 * @return ConnectorSyncQueue
	 */
	public function getSyncQueues()
	{
		return $this->_syncQueues;
	}

	/**
	 * @return \jtl\Connector\Model\Connector
	 */
	public function clearSyncQueues()
	{
		$this->_syncQueues = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\ConnectorLanguage $language
	 * @return \jtl\Connector\Model\Connector
	 */
	public function addLanguage(\jtl\Connector\Model\ConnectorLanguage $language)
	{
		$this->_languages[] = $language;
		return $this;
	}
	
	/**
	 * @return ConnectorLanguage
	 */
	public function getLanguages()
	{
		return $this->_languages;
	}

	/**
	 * @return \jtl\Connector\Model\Connector
	 */
	public function clearLanguages()
	{
		$this->_languages = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\ConnectorLink $link
	 * @return \jtl\Connector\Model\Connector
	 */
	public function addLink(\jtl\Connector\Model\ConnectorLink $link)
	{
		$this->_links[] = $link;
		return $this;
	}
	
	/**
	 * @return ConnectorLink
	 */
	public function getLinks()
	{
		return $this->_links;
	}

	/**
	 * @return \jtl\Connector\Model\Connector
	 */
	public function clearLinks()
	{
		$this->_links = array();
		return $this;
	}
}


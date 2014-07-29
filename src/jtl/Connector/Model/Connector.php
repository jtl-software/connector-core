<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * .
 *
 * @access public
 * @package jtl\Connector\Model
 */
class Connector extends DataModel
{
    /**
     * @type integer 
     */
    protected $companyId = 0;

    /**
     * @type integer 
     */
    protected $id = 0;

    /**
     * @type boolean 
     */
    protected $isActive = false;

    /**
     * @type string 
     */
    protected $name = '';

    /**
     * @type string 
     */
    protected $token = '';

    /**
     * @type string 
     */
    protected $url = '';

    /**
     * Nav [Connector » One]
     *
     * @type \jtl\Connector\Model\ConnectorCustomerGroup[]
     */
    protected $customerGroups = array();

    /**
     * Nav [Connector » One]
     *
     * @type \jtl\Connector\Model\ConnectorLog[]
     */
    protected $logMessages = array();

    /**
     * Nav [Connector » One]
     *
     * @type \jtl\Connector\Model\ConnectorCurrency[]
     */
    protected $currencies = array();

    /**
     * Nav [Connector » One]
     *
     * @type \jtl\Connector\Model\ConnectorSyncQueue[]
     */
    protected $syncQueues = array();

    /**
     * Nav [Connector » One]
     *
     * @type \jtl\Connector\Model\ConnectorLanguage[]
     */
    protected $languages = array();

    /**
     * Nav [Connector » One]
     *
     * @type \jtl\Connector\Model\ConnectorLink[]
     */
    protected $links = array();


    /**
     * @type array list of identities
     */
    protected $identities = array(
    );

    /**
     * @type array list of navigations
     */
    protected $navigations = array(
        'customerGroups' => '\jtl\Connector\Model\ConnectorCustomerGroup',
        'logMessages' => '\jtl\Connector\Model\ConnectorLog',
        'currencies' => '\jtl\Connector\Model\ConnectorCurrency',
        'syncQueues' => '\jtl\Connector\Model\ConnectorSyncQueue',
        'languages' => '\jtl\Connector\Model\ConnectorLanguage',
        'links' => '\jtl\Connector\Model\ConnectorLink',
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
     * @param  integer $id 
     * @return \jtl\Connector\Model\Connector
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setId($id)
    {
        return $this->setProperty('id', $id, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  integer $companyId 
     * @return \jtl\Connector\Model\Connector
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setCompanyId($companyId)
    {
        return $this->setProperty('companyId', $companyId, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @param  string $name 
     * @return \jtl\Connector\Model\Connector
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }
    
    /**
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param  string $url 
     * @return \jtl\Connector\Model\Connector
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setUrl($url)
    {
        return $this->setProperty('url', $url, 'string');
    }
    
    /**
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param  string $token 
     * @return \jtl\Connector\Model\Connector
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setToken($token)
    {
        return $this->setProperty('token', $token, 'string');
    }
    
    /**
     * @return string 
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param  boolean $isActive 
     * @return \jtl\Connector\Model\Connector
     * @throws InvalidArgumentException if the provided argument is not of type 'boolean'.
     */
    public function setIsActive($isActive)
    {
        return $this->setProperty('isActive', $isActive, 'boolean');
    }
    
    /**
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param  \jtl\Connector\Model\ConnectorCustomerGroup $customerGroup
     * @return \jtl\Connector\Model\Connector
     */
    public function addCustomerGroup(\jtl\Connector\Model\ConnectorCustomerGroup $customerGroup)
    {
        $this->customerGroups[] = $customerGroup;
        return $this;
    }

    /**
     * @param  array $customerGroups
     * @return \jtl\Connector\Model\Connector
     */
    public function addCustomerGroups(array $customerGroups)
    {
		$this->customerGroups = array_merge($this->customerGroups, $customerGroups);
        return $this;
    }
    
    /**
     * @return ConnectorCustomerGroup
     */
    public function getCustomerGroups()
    {
        return $this->customerGroups;
    }

    /**
     * @return \jtl\Connector\Model\Connector
     */
    public function clearCustomerGroups()
    {
        $this->customerGroups = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ConnectorLog $logMessage
     * @return \jtl\Connector\Model\Connector
     */
    public function addLogMessage(\jtl\Connector\Model\ConnectorLog $logMessage)
    {
        $this->logMessages[] = $logMessage;
        return $this;
    }

    /**
     * @param  array $logMessages
     * @return \jtl\Connector\Model\Connector
     */
    public function addLogMessages(array $logMessages)
    {
		$this->logMessages = array_merge($this->logMessages, $logMessages);
        return $this;
    }
    
    /**
     * @return ConnectorLog
     */
    public function getLogMessages()
    {
        return $this->logMessages;
    }

    /**
     * @return \jtl\Connector\Model\Connector
     */
    public function clearLogMessages()
    {
        $this->logMessages = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ConnectorCurrency $currency
     * @return \jtl\Connector\Model\Connector
     */
    public function addCurrency(\jtl\Connector\Model\ConnectorCurrency $currency)
    {
        $this->currencies[] = $currency;
        return $this;
    }

    /**
     * @param  array $currencies
     * @return \jtl\Connector\Model\Connector
     */
    public function addCurrencies(array $currencies)
    {
		$this->currencies = array_merge($this->currencies, $currencies);
        return $this;
    }
    
    /**
     * @return ConnectorCurrency
     */
    public function getCurrencies()
    {
        return $this->currencies;
    }

    /**
     * @return \jtl\Connector\Model\Connector
     */
    public function clearCurrencies()
    {
        $this->currencies = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ConnectorSyncQueue $syncQueue
     * @return \jtl\Connector\Model\Connector
     */
    public function addSyncQueue(\jtl\Connector\Model\ConnectorSyncQueue $syncQueue)
    {
        $this->syncQueues[] = $syncQueue;
        return $this;
    }

    /**
     * @param  array $syncQueues
     * @return \jtl\Connector\Model\Connector
     */
    public function addSyncQueues(array $syncQueues)
    {
		$this->syncQueues = array_merge($this->syncQueues, $syncQueues);
        return $this;
    }
    
    /**
     * @return ConnectorSyncQueue
     */
    public function getSyncQueues()
    {
        return $this->syncQueues;
    }

    /**
     * @return \jtl\Connector\Model\Connector
     */
    public function clearSyncQueues()
    {
        $this->syncQueues = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ConnectorLanguage $language
     * @return \jtl\Connector\Model\Connector
     */
    public function addLanguage(\jtl\Connector\Model\ConnectorLanguage $language)
    {
        $this->languages[] = $language;
        return $this;
    }

    /**
     * @param  array $languages
     * @return \jtl\Connector\Model\Connector
     */
    public function addLanguages(array $languages)
    {
		$this->languages = array_merge($this->languages, $languages);
        return $this;
    }
    
    /**
     * @return ConnectorLanguage
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * @return \jtl\Connector\Model\Connector
     */
    public function clearLanguages()
    {
        $this->languages = array();
        return $this;
    }

    /**
     * @param  \jtl\Connector\Model\ConnectorLink $link
     * @return \jtl\Connector\Model\Connector
     */
    public function addLink(\jtl\Connector\Model\ConnectorLink $link)
    {
        $this->links[] = $link;
        return $this;
    }

    /**
     * @param  array $links
     * @return \jtl\Connector\Model\Connector
     */
    public function addLinks(array $links)
    {
		$this->links = array_merge($this->links, $links);
        return $this;
    }
    
    /**
     * @return ConnectorLink
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @return \jtl\Connector\Model\Connector
     */
    public function clearLinks()
    {
        $this->links = array();
        return $this;
    }
}


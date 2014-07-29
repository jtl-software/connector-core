<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Specific value properties to define a new specificValue with a sort number. .
 *
 * @access public
 * @package jtl\Connector\Model
 */
class SpecificValue extends DataModel
{
    /**
     * @type Identity Unique specificValue id
     */
    protected $id = null;

    /**
     * @type Identity Reference to specificId
     */
    protected $specificId = null;

    /**
     * @type integer|null Optional sort number
     */
    protected $sort = 0;

    /**
     * Nav [SpecificValue » One]
     *
     * @type \jtl\Connector\Model\SpecificValueI18n[]
     */
    protected $i18ns = array();


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'id',
        'specificId',
    );

    /**
     * @type array list of navigations
     */
    protected $navigations = array(
        'i18ns' => '\jtl\Connector\Model\SpecificValueI18n',
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
     * @param  integer $sort Optional sort number
     * @return \jtl\Connector\Model\SpecificValue
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('sort', $sort, 'integer');
    }
    
    /**
     * @return integer Optional sort number
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param  Identity $id Unique specificValue id
     * @return \jtl\Connector\Model\SpecificValue
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique specificValue id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $specificId Reference to specificId
     * @return \jtl\Connector\Model\SpecificValue
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSpecificId(Identity $specificId)
    {
        return $this->setProperty('specificId', $specificId, 'Identity');
    }
    
    /**
     * @return Identity Reference to specificId
     */
    public function getSpecificId()
    {
        return $this->specificId;
    }

    /**
     * @param  \jtl\Connector\Model\SpecificValueI18n $i18n
     * @return \jtl\Connector\Model\SpecificValue
     */
    public function addI18n(\jtl\Connector\Model\SpecificValueI18n $i18n)
    {
        $this->i18ns[] = $i18n;
        return $this;
    }

    /**
     * @param  array $i18ns
     * @return \jtl\Connector\Model\SpecificValue
     */
    public function addI18ns(array $i18ns)
    {
		$this->i18ns = array_merge($this->i18ns, $i18ns);
        return $this;
    }
    
    /**
     * @return SpecificValueI18n
     */
    public function getI18ns()
    {
        return $this->i18ns;
    }

    /**
     * @return \jtl\Connector\Model\SpecificValue
     */
    public function clearI18ns()
    {
        $this->i18ns = array();
        return $this;
    }
}


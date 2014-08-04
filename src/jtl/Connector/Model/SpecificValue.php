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
     * @type int Optional sort number
     */
    protected $sort = 0;

    /**
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
     * @param  Identity $id Unique specificValue id
     * @return \jtl\Connector\Model\SpecificValue
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
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
        return $this->setProperty('SpecificId', $specificId, 'Identity');
    }

    /**
     * @return Identity Reference to specificId
     */
    public function getSpecificId()
    {
        return $this->specificId;
    }

    /**
     * @param  int $sort Optional sort number
     * @return \jtl\Connector\Model\SpecificValue
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSort(Identity $sort)
    {
        return $this->setProperty('Sort', $sort, 'int');
    }

    /**
     * @return int Optional sort number
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param  \jtl\Connector\Model\SpecificValueI18n $i18ns
     * @return \jtl\Connector\Model\SpecificValue
     */
    public function addI18n(\jtl\Connector\Model\SpecificValueI18n $i18n)
    {
        $this->i18ns[] = $i18ns;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\SpecificValueI18n[]
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

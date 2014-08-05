<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Specific
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Specific value properties to define a new specificValue with a sort number. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Specific
 * @JMS\AccessType("public_method")
 */
class SpecificValue extends DataModel
{
    /**
     * @var Identity Unique specificValue id
	 * @JMS\Type("\jtl\Connector\Model\Identity")
     */
    protected $id = null;

    /**
     * @var Identity Reference to specificId
	 * @JMS\Type("\jtl\Connector\Model\Identity")
     */
    protected $specificId = null;

    /**
     * @var int Optional sort number
	 * @JMS\Type("integer")
     */
    protected $sort = 0;

    /**
     * @var \jtl\Connector\Model\SpecificValueI18n[]
	 * @JMS\Type("array<\jtl\Connector\Model\SpecificValueI18n>")
     */
    protected $i18ns = array();

    /**
     * @param  Identity $id Unique specificValue id
     * @return \jtl\Connector\Model\SpecificValue
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @param  int $sort Optional sort number
     * @return \jtl\Connector\Model\SpecificValue
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setSort($sort)
    {
        return $this->setProperty('sort', $sort, 'int');
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
        $this->i18ns[] = $i18n;
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

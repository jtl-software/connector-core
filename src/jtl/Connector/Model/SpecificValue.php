<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Specific value properties to define a new specificValue with a sort number. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class SpecificValue extends DataModel
{
    /**
     * @type Identity Unique specificValue id
     */
    protected $_id = null;

    /**
     * @type Identity Reference to specificId
     */
    protected $_specificId = null;

    /**
     * @type integer|null Optional sort number
     */
    protected $_sort = 0;

    /**
	 * Nav [SpecificValue » One]
	 *
     * @type \jtl\Connector\Model\SpecificValueI18n[]
     */
    protected $_specificValueI18ns = array();

    /**
	 * Nav [SpecificValue » Many]
	 *
     * @type \jtl\Connector\Model\Specific[]
     */
    protected $_specific = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
		'_specificId',
	);

	/**
	 * @param  integer $sort Optional sort number
	 * @return \jtl\Connector\Model\SpecificValue
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setSort($sort)
	{
		if (!is_integer($sort))
			throw new InvalidArgumentException('integer expected.');
		$this->_sort = $sort;
		return $this;
	}
	
	/**
	 * @return integer Optional sort number
	 */
	public function getSort()
	{
		return $this->_sort;
	}

	/**
	 * @param  Identity $id Unique specificValue id
	 * @return \jtl\Connector\Model\SpecificValue
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique specificValue id
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  Identity $specificId Reference to specificId
	 * @return \jtl\Connector\Model\SpecificValue
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setSpecificId(Identity $specificId)
	{
		
		$this->_specificId = $specificId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to specificId
	 */
	public function getSpecificId()
	{
		return $this->_specificId;
	}

	/**
	 * @param  \jtl\Connector\Model\SpecificValueI18n $specificValueI18ns
	 * @return \jtl\Connector\Model\SpecificValue
	 */
	public function addSpecificValueI18ns(\jtl\Connector\Model\SpecificValueI18n $specificValueI18ns)
	{
		$this->_specificValueI18ns[] = $specificValueI18ns;
		return $this;
	}
	
	/**
	 * @return SpecificValueI18n
	 */
	public function getSpecificValueI18ns()
	{
		return $this->_specificValueI18ns;
	}

	/**
	 * @return \jtl\Connector\Model\SpecificValue
	 */
	public function clearSpecificValueI18ns()
	{
		$this->_specificValueI18ns = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\Specific $specific
	 * @return \jtl\Connector\Model\SpecificValue
	 */
	public function addSpecific(\jtl\Connector\Model\Specific $specific)
	{
		$this->_specific[] = $specific;
		return $this;
	}
	
	/**
	 * @return Specific
	 */
	public function getSpecific()
	{
		return $this->_specific;
	}

	/**
	 * @return \jtl\Connector\Model\SpecificValue
	 */
	public function clearSpecific()
	{
		$this->_specific = array();
		return $this;
	}
}


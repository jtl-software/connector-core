<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Specific is defined as a characteristic product attribute Like "color". Specifics can be used for after-search-filtering. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class Specific extends DataModel
{
    /**
     * @type Identity Unique specific id
     */
    protected $_id = null;

    /**
     * @type string 
     */
    protected $_name = '';

    /**
     * @type integer|null Optional sort number
     */
    protected $_sort = 0;

    /**
     * @type string Specific type (radio, dropdown, image...)
     */
    protected $_type = '';

    /**
	 * Nav [Specific » One]
	 *
     * @type \jtl\Connector\Model\SpecificI18n[]
     */
    protected $_specificI18ns = array();

    /**
	 * Nav [Specific » ZeroOrOne]
	 *
     * @type \jtl\Connector\Model\SpecificValue[]
     */
    protected $_values = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
	);

	/**
	 * @param  integer $sort Optional sort number
	 * @return \jtl\Connector\Model\Specific
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
	 * @param  string $name 
	 * @return \jtl\Connector\Model\Specific
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
	 * @param  string $type Specific type (radio, dropdown, image...)
	 * @return \jtl\Connector\Model\Specific
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setType($type)
	{
		if (!is_string($type))
			throw new InvalidArgumentException('string expected.');
		$this->_type = $type;
		return $this;
	}
	
	/**
	 * @return string Specific type (radio, dropdown, image...)
	 */
	public function getType()
	{
		return $this->_type;
	}

	/**
	 * @param  Identity $id Unique specific id
	 * @return \jtl\Connector\Model\Specific
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique specific id
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  \jtl\Connector\Model\SpecificI18n $specificI18ns
	 * @return \jtl\Connector\Model\Specific
	 */
	public function addSpecificI18ns(\jtl\Connector\Model\SpecificI18n $specificI18ns)
	{
		$this->_specificI18ns[] = $specificI18ns;
		return $this;
	}
	
	/**
	 * @return SpecificI18n
	 */
	public function getSpecificI18ns()
	{
		return $this->_specificI18ns;
	}

	/**
	 * @return \jtl\Connector\Model\Specific
	 */
	public function clearSpecificI18ns()
	{
		$this->_specificI18ns = array();
		return $this;
	}

	/**
	 * @param  \jtl\Connector\Model\SpecificValue $value
	 * @return \jtl\Connector\Model\Specific
	 */
	public function addValue(\jtl\Connector\Model\SpecificValue $value)
	{
		$this->_values[] = $value;
		return $this;
	}
	
	/**
	 * @return SpecificValue
	 */
	public function getValues()
	{
		return $this->_values;
	}

	/**
	 * @return \jtl\Connector\Model\Specific
	 */
	public function clearValues()
	{
		$this->_values = array();
		return $this;
	}
}


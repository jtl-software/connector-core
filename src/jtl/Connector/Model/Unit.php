<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Specifies product units like "piece", "bottle", "package"..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class Unit extends DataModel
{
    /**
     * @type string 
     */
    protected $_localeName = '';

    /**
     * @type string 
     */
    protected $_name = '';


	/**
	 * @type array
	 */
	protected $_identities = array(
	);

	/**
	 * @param  string $name 
	 * @return \jtl\Connector\Model\Unit
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
	 * @param  string $localeName 
	 * @return \jtl\Connector\Model\Unit
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
	 * @return string 
	 */
	public function getLocaleName()
	{
		return $this->_localeName;
	}
}


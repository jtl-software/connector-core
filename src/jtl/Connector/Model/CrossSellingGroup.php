<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Localized cross selling group. Can hold several crossSelling items that are linked for cross selling purposes. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class CrossSellingGroup extends DataModel
{
    /**
     * @type string Optional localized description
     */
    protected $_description = '';

    /**
     * @type string Locale
     */
    protected $_localeName = '';

    /**
     * @type string Localized name
     */
    protected $_name = '';


	/**
	 * @type array
	 */
	protected $_identities = array(
	);

	/**
	 * @param  string $name Localized name
	 * @return \jtl\Connector\Model\CrossSellingGroup
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
	 * @return string Localized name
	 */
	public function getName()
	{
		return $this->_name;
	}

	/**
	 * @param  string $description Optional localized description
	 * @return \jtl\Connector\Model\CrossSellingGroup
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setDescription($description)
	{
		if (!is_string($description))
			throw new InvalidArgumentException('string expected.');
		$this->_description = $description;
		return $this;
	}
	
	/**
	 * @return string Optional localized description
	 */
	public function getDescription()
	{
		return $this->_description;
	}

	/**
	 * @param  string $localeName Locale
	 * @return \jtl\Connector\Model\CrossSellingGroup
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
}


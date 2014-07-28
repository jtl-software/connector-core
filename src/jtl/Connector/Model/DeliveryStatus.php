<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Localized delivery status text. Delivery status is set in the Wawi-ERP. .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class DeliveryStatus extends DataModel
{
    /**
     * @type Identity DeliveryStatus id
     */
    protected $_id = null;

    /**
     * @type string Locale
     */
    protected $_localeName = '';

    /**
     * @type string Localized delivery status text
     */
    protected $_name = '';


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
	);

	/**
	 * @param  string $name Localized delivery status text
	 * @return \jtl\Connector\Model\DeliveryStatus
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
	 * @return string Localized delivery status text
	 */
	public function getName()
	{
		return $this->_name;
	}

	/**
	 * @param  Identity $id DeliveryStatus id
	 * @return \jtl\Connector\Model\DeliveryStatus
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity DeliveryStatus id
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  string $localeName Locale
	 * @return \jtl\Connector\Model\DeliveryStatus
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


<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * Delivery note item properties..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class DeliveryNoteItem extends DataModel
{
    /**
     * @type Identity Reference to customerOrderItem
     */
    protected $_customerOrderItemId = null;

    /**
     * @type Identity Reference to deliveryNote
     */
    protected $_deliveryNoteId = null;

    /**
     * @type string 
     */
    protected $_cHinweis = '';

    /**
     * @type float|null Quantity delivered
     */
    protected $_quantity = 0.0;

    /**
	 * Nav [DeliveryNoteItem » Many]
	 *
     * @type \jtl\Connector\Model\DeliveryNote[]
     */
    protected $_deliveryNote = array();


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_deliveryNoteId',
		'_customerOrderItemId',
	);

	/**
	 * @param  float $quantity Quantity delivered
	 * @return \jtl\Connector\Model\DeliveryNoteItem
	 * @throws InvalidArgumentException if the provided argument is not of type 'float'.
	 */
	public function setQuantity($quantity)
	{
		if (!is_float($quantity))
			throw new InvalidArgumentException('float expected.');
		$this->_quantity = $quantity;
		return $this;
	}
	
	/**
	 * @return float Quantity delivered
	 */
	public function getQuantity()
	{
		return $this->_quantity;
	}

	/**
	 * @param  string $cHinweis 
	 * @return \jtl\Connector\Model\DeliveryNoteItem
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setCHinweis($cHinweis)
	{
		if (!is_string($cHinweis))
			throw new InvalidArgumentException('string expected.');
		$this->_cHinweis = $cHinweis;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getCHinweis()
	{
		return $this->_cHinweis;
	}

	/**
	 * @param  Identity $deliveryNoteId Reference to deliveryNote
	 * @return \jtl\Connector\Model\DeliveryNoteItem
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setDeliveryNoteId(Identity $deliveryNoteId)
	{
		
		$this->_deliveryNoteId = $deliveryNoteId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to deliveryNote
	 */
	public function getDeliveryNoteId()
	{
		return $this->_deliveryNoteId;
	}

	/**
	 * @param  Identity $customerOrderItemId Reference to customerOrderItem
	 * @return \jtl\Connector\Model\DeliveryNoteItem
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setCustomerOrderItemId(Identity $customerOrderItemId)
	{
		
		$this->_customerOrderItemId = $customerOrderItemId;
		return $this;
	}
	
	/**
	 * @return Identity Reference to customerOrderItem
	 */
	public function getCustomerOrderItemId()
	{
		return $this->_customerOrderItemId;
	}

	/**
	 * @param  \jtl\Connector\Model\DeliveryNote $deliveryNote
	 * @return \jtl\Connector\Model\DeliveryNoteItem
	 */
	public function addDeliveryNote(\jtl\Connector\Model\DeliveryNote $deliveryNote)
	{
		$this->_deliveryNote[] = $deliveryNote;
		return $this;
	}
	
	/**
	 * @return DeliveryNote
	 */
	public function getDeliveryNote()
	{
		return $this->_deliveryNote;
	}

	/**
	 * @return \jtl\Connector\Model\DeliveryNoteItem
	 */
	public function clearDeliveryNote()
	{
		$this->_deliveryNote = array();
		return $this;
	}
}


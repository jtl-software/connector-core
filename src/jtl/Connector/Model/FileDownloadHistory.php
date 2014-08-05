<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Internal
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * ToDo: Remove (deprecated).
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Internal
 * @JMS\AccessType("public_method")
 */
class FileDownloadHistory extends DataModel
{
    /**
     * @var Identity 
	 * @JMS\Type("\jtl\Connector\Model\Identity")
     */
    protected $customerId = null;

    /**
     * @var Identity 
	 * @JMS\Type("\jtl\Connector\Model\Identity")
     */
    protected $customerOrderId = null;

    /**
     * @var Identity 
	 * @JMS\Type("\jtl\Connector\Model\Identity")
     */
    protected $fileDownloadId = null;

    /**
     * @var Identity 
	 * @JMS\Type("\jtl\Connector\Model\Identity")
     */
    protected $id = null;

    /**
     * @var DateTime 
	 * @JMS\Type("DateTime")
     */
    protected $created = null;

    /**
     * @param  Identity $customerId 
     * @return \jtl\Connector\Model\FileDownloadHistory
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerId(Identity $customerId)
    {
        return $this->setProperty('customerId', $customerId, 'Identity');
    }

    /**
     * @return Identity 
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param  Identity $customerOrderId 
     * @return \jtl\Connector\Model\FileDownloadHistory
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerOrderId(Identity $customerOrderId)
    {
        return $this->setProperty('customerOrderId', $customerOrderId, 'Identity');
    }

    /**
     * @return Identity 
     */
    public function getCustomerOrderId()
    {
        return $this->customerOrderId;
    }

    /**
     * @param  Identity $fileDownloadId 
     * @return \jtl\Connector\Model\FileDownloadHistory
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setFileDownloadId(Identity $fileDownloadId)
    {
        return $this->setProperty('fileDownloadId', $fileDownloadId, 'Identity');
    }

    /**
     * @return Identity 
     */
    public function getFileDownloadId()
    {
        return $this->fileDownloadId;
    }

    /**
     * @param  Identity $id 
     * @return \jtl\Connector\Model\FileDownloadHistory
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  DateTime $created 
     * @return \jtl\Connector\Model\FileDownloadHistory
     * @throws \InvalidArgumentException if the provided argument is not of type 'DateTime'.
     */
    public function setCreated(DateTime $created)
    {
        return $this->setProperty('created', $created, 'DateTime');
    }

    /**
     * @return DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

 
}

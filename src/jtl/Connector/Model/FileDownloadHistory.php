<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * ToDo: Remove (deprecated).
 *
 * @access public
 * @package jtl\Connector\Model
 */
class FileDownloadHistory extends DataModel
{
    /**
     * @type Identity 
     */
    protected $customerId = null;

    /**
     * @type Identity 
     */
    protected $customerOrderId = null;

    /**
     * @type Identity 
     */
    protected $fileDownloadId = null;

    /**
     * @type Identity 
     */
    protected $id = null;

    /**
     * @type string 
     */
    protected $created = '';

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'customerId',
        'customerOrderId',
        'fileDownloadId',
        'id',
    );

    /**
     * @param  Identity $customerId 
     * @return \jtl\Connector\Model\FileDownloadHistory
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerId(Identity $customerId)
    {
        return $this->setProperty('CustomerId', $customerId, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerOrderId(Identity $customerOrderId)
    {
        return $this->setProperty('CustomerOrderId', $customerOrderId, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setFileDownloadId(Identity $fileDownloadId)
    {
        return $this->setProperty('FileDownloadId', $fileDownloadId, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
    }

    /**
     * @return Identity 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  string $created 
     * @return \jtl\Connector\Model\FileDownloadHistory
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCreated(Identity $created)
    {
        return $this->setProperty('Created', $created, 'string');
    }

    /**
     * @return string 
     */
    public function getCreated()
    {
        return $this->created;
    }

 
}

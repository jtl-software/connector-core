<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage 
 */

namespace jtl\Connector\Model;

/**
 * ToDo: Remove (deprecated)
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage 
 */
class FileDownloadHistory extends DataModel
{
    /**
     * @var Identity
     */
    protected $_id = null;
    
    /**
     * @var Identity
     */
    protected $_fileDownloadId = null;
    
    /**
     * @var Identity
     */
    protected $_customerId = null;
    
    /**
     * @var Identity
     */
    protected $_customerOrderId = null;
    
    /**
     * @var string
     */
    protected $_created = null;
    
    /**
     * @var mixed:string
     */
    protected $_identities = array(
        '_id',
        '_fileDownloadId',
        '_customerId',
        '_customerOrderId'
    );
    
    /**
     * FileDownloadHistory Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            if ($value === null) {
                $this->$name = null;
                return;
            }
        
            switch ($name) {
                case "_id":
                case "_fileDownloadId":
                case "_customerId":
                case "_customerOrderId":
                
                    $this->$name = Identity::convert($value);
                    break;
            
                case "_created":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $id
     * @return \jtl\Connector\Model\FileDownloadHistory
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param Identity $fileDownloadId
     * @return \jtl\Connector\Model\FileDownloadHistory
     */
    public function setFileDownloadId(Identity $fileDownloadId)
    {
        $this->_fileDownloadId = $fileDownloadId;
        return $this;
    }
    
    /**
     * @return Identity
     */
    public function getFileDownloadId()
    {
        return $this->_fileDownloadId;
    }
    /**
     * @param Identity $customerId
     * @return \jtl\Connector\Model\FileDownloadHistory
     */
    public function setCustomerId(Identity $customerId)
    {
        $this->_customerId = $customerId;
        return $this;
    }
    
    /**
     * @return Identity
     */
    public function getCustomerId()
    {
        return $this->_customerId;
    }
    /**
     * @param Identity $customerOrderId
     * @return \jtl\Connector\Model\FileDownloadHistory
     */
    public function setCustomerOrderId(Identity $customerOrderId)
    {
        $this->_customerOrderId = $customerOrderId;
        return $this;
    }
    
    /**
     * @return Identity
     */
    public function getCustomerOrderId()
    {
        return $this->_customerOrderId;
    }
    /**
     * @param string $created
     * @return \jtl\Connector\Model\FileDownloadHistory
     */
    public function setCreated($created)
    {
        $this->_created = (string)$created;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCreated()
    {
        return $this->_created;
    }
}
<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage 
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ToDo: Remove (deprecated)
 *
 * @access public
 */
class FileDownloadHistory extends DataModel
{
    /**
     * @var string
     */
    protected $_id = '0';             
    
    /**
     * @var string
     */
    protected $_fileDownloadId = '0';             
    
    /**
     * @var string
     */
    protected $_customerId = '0';             
    
    /**
     * @var string
     */
    protected $_customerOrderId = '0';             
    
    /**
     * @var string
     */
    protected $_created = null;             
    
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
                case "_created":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id
     * @return \jtl\Connector\Model\FileDownloadHistory
     */
    public function setId($id)
    {
        $this->_id = (string)$id;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param string $fileDownloadId
     * @return \jtl\Connector\Model\FileDownloadHistory
     */
    public function setFileDownloadId($fileDownloadId)
    {
        $this->_fileDownloadId = (string)$fileDownloadId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getFileDownloadId()
    {
        return $this->_fileDownloadId;
    }
    /**
     * @param string $customerId
     * @return \jtl\Connector\Model\FileDownloadHistory
     */
    public function setCustomerId($customerId)
    {
        $this->_customerId = (string)$customerId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCustomerId()
    {
        return $this->_customerId;
    }
    /**
     * @param string $customerOrderId
     * @return \jtl\Connector\Model\FileDownloadHistory
     */
    public function setCustomerOrderId($customerOrderId)
    {
        $this->_customerOrderId = (string)$customerOrderId;
        return $this;
    }
    
    /**
     * @return string
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
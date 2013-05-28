<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * FileDownloadHistory Model
 * @access public
 */
class FileDownloadHistory extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_fileDownloadId;
    
    /**
     * @var int
     */
    protected $_customerId;
    
    /**
     * @var int
     */
    protected $_customerOrderId;
    
    /**
     * @var string
     */
    protected $_created;
    
    /**
     * FileDownloadHistory Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_id":
            case "_fileDownloadId":
            case "_customerId":
            case "_customerOrderId":
            
                $this->$name = (int)$value;
                break;
        
            case "_created":
            
                $this->$name = (string)$value;
                break;
        
        }
    }
    
    /**
     * FileDownloadHistory Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}
?>
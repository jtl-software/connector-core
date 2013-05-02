<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * Warehouse Model
 * @access public
 */
abstract class Warehouse extends Model
{
    /**
     * @var 
     */
    protected $_id;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\Warehouse
     */
    public function setId($id)
    {
        $this->_id = ()$id;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/Warehouse/Warehouse.json", $this->getPublic(array()));
    }
}
?>
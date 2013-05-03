<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Warehouse Model
 * @access public
 */
abstract class Warehouse extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\Warehouse
     */
    public function setId($id)
    {
        $this->_id = (int)$id;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }
}
?>
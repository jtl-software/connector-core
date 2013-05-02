<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * ShippingClass Model
 * @access public
 */
abstract class ShippingClass extends Model
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\ShippingClass
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
    
    /**
     * @param string $name
     * @return \jtl\Connector\Model\ShippingClass
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/shippingclass/shippingclass.json", $this->getPublic(array()));
    }
}
?>
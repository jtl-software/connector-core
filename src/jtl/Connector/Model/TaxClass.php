<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * TaxClass Model
 * @access public
 */
abstract class TaxClass extends Model
{
    /**
     * @var 
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_name;
    
    /**
     * @var string
     */
    protected $_default;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\TaxClass
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
     * @param int $name
     * @return \jtl\Connector\Model\TaxClass
     */
    public function setName($name)
    {
        $this->_name = (int)$name;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getName()
    {
        return $this->_name;
    }
    
    /**
     * @param string $default
     * @return \jtl\Connector\Model\TaxClass
     */
    public function setDefault($default)
    {
        $this->_default = (string)$default;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getDefault()
    {
        return $this->_default;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/TaxClass/TaxClass.json", $this->getPublic(array()));
    }
}
?>
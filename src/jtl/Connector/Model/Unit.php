<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * Unit Model
 * @access public
 */
abstract class Unit extends Model
{
    /**
     * @var 
     */
    protected $_id;
    
    /**
     * @var 
     */
    protected $_languageIso;
    
    /**
     * @var int
     */
    protected $_name;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\Unit
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
     * @param  $languageIso
     * @return \jtl\Connector\Model\Unit
     */
    public function setLanguageIso($languageIso)
    {
        $this->_languageIso = ()$languageIso;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getLanguageIso()
    {
        return $this->_languageIso;
    }
    
    /**
     * @param int $name
     * @return \jtl\Connector\Model\Unit
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
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/Unit/Unit.json", $this->getPublic(array()));
    }
}
?>
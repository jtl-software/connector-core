<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * SpecificValueI18n Model
 * @access public
 */
class SpecificValueI18n extends DataModel
{
    /**
     * @var string
     */
    protected $_localeName = '';
    
    /**
     * @var int
     */
    protected $_specificValueId = 0;
    
    /**
     * @var string
     */
    protected $_value = '';
    
    /**
     * @var string
     */
    protected $_url = '';
    
    /**
     * @var string
     */
    protected $_description = '';
    
    /**
     * @var string
     */
    protected $_metaDescription = '';
    
    /**
     * @var string
     */
    protected $_metaKeywords = '';
    
    /**
     * @var string
     */
    protected $_titleTag = '';
    
    /**
     * SpecificValueI18n Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if ($value === null) {
            $this->$name = null;
            return;
        }
        
        switch ($name) {
            case "_localeName":
            case "_value":
            case "_url":
            case "_description":
            case "_metaDescription":
            case "_metaKeywords":
            case "_titleTag":
            
                $this->$name = (string)$value;
                break;
        
            case "_specificValueId":
            
                $this->$name = (int)$value;
                break;
        
        }
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
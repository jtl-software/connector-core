<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * SpecificValue Model
 * @access public
 */
abstract class SpecificValue extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_specificId;
    
    /**
     * @var int
     */
    protected $_sort;
    
    /**
     * @var int
     */
    protected $_languageIso;
    
    /**
     * @var int
     */
    protected $_specificValueId;
    
    /**
     * @var string
     */
    protected $_value;
    
    /**
     * @var string
     */
    protected $_url;
    
    /**
     * @var string
     */
    protected $_description;
    
    /**
     * @var string
     */
    protected $_metaDescription;
    
    /**
     * @var string
     */
    protected $_metaKeywords;
    
    /**
     * @var string
     */
    protected $_titleTag;
    
    /**
     * SpecificValue Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_id":
            case "_specificId":
            case "_sort":
            case "_languageIso":
            case "_specificValueId":
            
                $this->$name = (int)$value;
                break;
        
            case "_value":
            case "_url":
            case "_description":
            case "_metaDescription":
            case "_metaKeywords":
            case "_titleTag":
            
                $this->$name = (string)$value;
                break;
        
        }
    }
    
    /**
     * SpecificValue Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>
<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * EmailTemplateI18n Model
 * @access public
 */
class EmailTemplateI18n extends DataModel
{
    /**
     * @var int
     */
    protected $_emailTemplateId;
    
    /**
     * @var string
     */
    protected $_localeName;
    
    /**
     * @var string
     */
    protected $_description;
    
    /**
     * @var string
     */
    protected $_contentHtml;
    
    /**
     * @var string
     */
    protected $_contentText;
    
    /**
     * @var string
     */
    protected $_pdf;
    
    /**
     * @var string
     */
    protected $_filename;
    
    /**
     * EmailTemplateI18n Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_emailTemplateId":
            
                $this->$name = (int)$value;
                break;
        
            case "_localeName":
            case "_description":
            case "_contentHtml":
            case "_contentText":
            case "_pdf":
            case "_filename":
            
                $this->$name = (string)$value;
                break;
        
        }
    }
    
    /**
     * EmailTemplateI18n Getter
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
<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage 
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Shop3 only
 *
 * @access public
 * @subpackage 
 */
class EmailTemplate extends DataModel
{
    /**
     * @var string
     */
    protected $_id = '0';
    
    /**
     * @var string
     */
    protected $_name = '';
    
    /**
     * @var string
     */
    protected $_description = '';
    
    /**
     * @var string
     */
    protected $_emailType = '';
    
    /**
     * @var string
     */
    protected $_moduleId = '0';
    
    /**
     * @var string
     */
    protected $_filename = '';
    
    /**
     * @var bool
     */
    protected $_isActive = false;
    
    /**
     * @var bool
     */
    protected $_isOii = false;
    
    /**
     * @var bool
     */
    protected $_isAgb = false;
    
    /**
     * @var bool
     */
    protected $_isWrb = false;
    
    /**
     * @var int
     */
    protected $_error = 0;
    
    /**
     * EmailTemplate Setter
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
                case "_name":
                case "_description":
                case "_emailType":
                case "_moduleId":
                case "_filename":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_isActive":
                case "_isOii":
                case "_isAgb":
                case "_isWrb":
                
                    $this->$name = (bool)$value;
                    break;
            
                case "_error":
                
                    $this->$name = (int)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $id
     * @return \jtl\Connector\Model\EmailTemplate
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
     * @param string $name
     * @return \jtl\Connector\Model\EmailTemplate
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
     * @param string $description
     * @return \jtl\Connector\Model\EmailTemplate
     */
    public function setDescription($description)
    {
        $this->_description = (string)$description;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->_description;
    }
    /**
     * @param string $emailType
     * @return \jtl\Connector\Model\EmailTemplate
     */
    public function setEmailType($emailType)
    {
        $this->_emailType = (string)$emailType;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getEmailType()
    {
        return $this->_emailType;
    }
    /**
     * @param string $moduleId
     * @return \jtl\Connector\Model\EmailTemplate
     */
    public function setModuleId($moduleId)
    {
        $this->_moduleId = (string)$moduleId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getModuleId()
    {
        return $this->_moduleId;
    }
    /**
     * @param string $filename
     * @return \jtl\Connector\Model\EmailTemplate
     */
    public function setFilename($filename)
    {
        $this->_filename = (string)$filename;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getFilename()
    {
        return $this->_filename;
    }
    /**
     * @param bool $isActive
     * @return \jtl\Connector\Model\EmailTemplate
     */
    public function setIsActive($isActive)
    {
        $this->_isActive = (bool)$isActive;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getIsActive()
    {
        return $this->_isActive;
    }
    /**
     * @param bool $isOii
     * @return \jtl\Connector\Model\EmailTemplate
     */
    public function setIsOii($isOii)
    {
        $this->_isOii = (bool)$isOii;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getIsOii()
    {
        return $this->_isOii;
    }
    /**
     * @param bool $isAgb
     * @return \jtl\Connector\Model\EmailTemplate
     */
    public function setIsAgb($isAgb)
    {
        $this->_isAgb = (bool)$isAgb;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getIsAgb()
    {
        return $this->_isAgb;
    }
    /**
     * @param bool $isWrb
     * @return \jtl\Connector\Model\EmailTemplate
     */
    public function setIsWrb($isWrb)
    {
        $this->_isWrb = (bool)$isWrb;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getIsWrb()
    {
        return $this->_isWrb;
    }
    /**
     * @param int $error
     * @return \jtl\Connector\Model\EmailTemplate
     */
    public function setError($error)
    {
        $this->_error = (int)$error;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getError()
    {
        return $this->_error;
    }
}
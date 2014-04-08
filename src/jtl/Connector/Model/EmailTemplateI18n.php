<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage 
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * 
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage 
 */
class EmailTemplateI18n extends DataModel
{
    /**
     * @var string
     */
    protected $_emailTemplateId = '0';             
    
    /**
     * @var string
     */
    protected $_localeName = '';             
    
    /**
     * @var string
     */
    protected $_subject = '';             
    
    /**
     * @var string
     */
    protected $_contentHtml = '';             
    
    /**
     * @var string
     */
    protected $_contentText = '';             
    
    /**
     * @var string
     */
    protected $_pdf = '';             
    
    /**
     * @var string
     */
    protected $_filename = '';             
    
    /**
     * EmailTemplateI18n Setter
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
                case "_emailTemplateId":
                case "_localeName":
                case "_subject":
                case "_contentHtml":
                case "_contentText":
                case "_pdf":
                case "_filename":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param string $emailTemplateId
     * @return \jtl\Connector\Model\EmailTemplateI18n
     */
    public function setEmailTemplateId($emailTemplateId)
    {
        $this->_emailTemplateId = (string)$emailTemplateId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getEmailTemplateId()
    {
        return $this->_emailTemplateId;
    }
    /**
     * @param string $localeName
     * @return \jtl\Connector\Model\EmailTemplateI18n
     */
    public function setLocaleName($localeName)
    {
        $this->_localeName = (string)$localeName;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getLocaleName()
    {
        return $this->_localeName;
    }
    /**
     * @param string $subject
     * @return \jtl\Connector\Model\EmailTemplateI18n
     */
    public function setSubject($subject)
    {
        $this->_subject = (string)$subject;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->_subject;
    }
    /**
     * @param string $contentHtml
     * @return \jtl\Connector\Model\EmailTemplateI18n
     */
    public function setContentHtml($contentHtml)
    {
        $this->_contentHtml = (string)$contentHtml;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getContentHtml()
    {
        return $this->_contentHtml;
    }
    /**
     * @param string $contentText
     * @return \jtl\Connector\Model\EmailTemplateI18n
     */
    public function setContentText($contentText)
    {
        $this->_contentText = (string)$contentText;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getContentText()
    {
        return $this->_contentText;
    }
    /**
     * @param string $pdf
     * @return \jtl\Connector\Model\EmailTemplateI18n
     */
    public function setPdf($pdf)
    {
        $this->_pdf = (string)$pdf;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getPdf()
    {
        return $this->_pdf;
    }
    /**
     * @param string $filename
     * @return \jtl\Connector\Model\EmailTemplateI18n
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
}
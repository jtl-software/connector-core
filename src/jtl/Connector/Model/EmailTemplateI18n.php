<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Internal
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Internal
 */
class EmailTemplateI18n extends DataModel
{
    /**
     * @var Identity 
     */
    protected $emailTemplateId = null;

    /**
     * @var string 
     */
    protected $contentHtml = '';

    /**
     * @var string 
     */
    protected $contentText = '';

    /**
     * @var string 
     */
    protected $filename = '';

    /**
     * @var string 
     */
    protected $localeName = '';

    /**
     * @var string 
     */
    protected $pdf = '';

    /**
     * @var string 
     */
    protected $subject = '';

    /**
     * @param  Identity $emailTemplateId 
     * @return \jtl\Connector\Model\EmailTemplateI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setEmailTemplateId(Identity $emailTemplateId)
    {
        return $this->setProperty('emailTemplateId', $emailTemplateId, 'Identity');
    }

    /**
     * @return Identity 
     */
    public function getEmailTemplateId()
    {
        return $this->emailTemplateId;
    }

    /**
     * @param  string $contentHtml 
     * @return \jtl\Connector\Model\EmailTemplateI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setContentHtml($contentHtml)
    {
        return $this->setProperty('contentHtml', $contentHtml, 'string');
    }

    /**
     * @return string 
     */
    public function getContentHtml()
    {
        return $this->contentHtml;
    }

    /**
     * @param  string $contentText 
     * @return \jtl\Connector\Model\EmailTemplateI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setContentText($contentText)
    {
        return $this->setProperty('contentText', $contentText, 'string');
    }

    /**
     * @return string 
     */
    public function getContentText()
    {
        return $this->contentText;
    }

    /**
     * @param  string $filename 
     * @return \jtl\Connector\Model\EmailTemplateI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setFilename($filename)
    {
        return $this->setProperty('filename', $filename, 'string');
    }

    /**
     * @return string 
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param  string $localeName 
     * @return \jtl\Connector\Model\EmailTemplateI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setLocaleName($localeName)
    {
        return $this->setProperty('localeName', $localeName, 'string');
    }

    /**
     * @return string 
     */
    public function getLocaleName()
    {
        return $this->localeName;
    }

    /**
     * @param  string $pdf 
     * @return \jtl\Connector\Model\EmailTemplateI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setPdf($pdf)
    {
        return $this->setProperty('pdf', $pdf, 'string');
    }

    /**
     * @return string 
     */
    public function getPdf()
    {
        return $this->pdf;
    }

    /**
     * @param  string $subject 
     * @return \jtl\Connector\Model\EmailTemplateI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setSubject($subject)
    {
        return $this->setProperty('subject', $subject, 'string');
    }

    /**
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

 
}

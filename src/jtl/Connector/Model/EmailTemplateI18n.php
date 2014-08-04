<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * .
 *
 * @access public
 * @package jtl\Connector\Model
 */
class EmailTemplateI18n extends DataModel
{
    /**
     * @type Identity 
     */
    protected $emailTemplateId = null;

    /**
     * @type string 
     */
    protected $contentHtml = '';

    /**
     * @type string 
     */
    protected $contentText = '';

    /**
     * @type string 
     */
    protected $filename = '';

    /**
     * @type string 
     */
    protected $localeName = '';

    /**
     * @type string 
     */
    protected $pdf = '';

    /**
     * @type string 
     */
    protected $subject = '';

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'emailTemplateId',
    );

    /**
     * @param  Identity $emailTemplateId 
     * @return \jtl\Connector\Model\EmailTemplateI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setEmailTemplateId(Identity $emailTemplateId)
    {
        return $this->setProperty('EmailTemplateId', $emailTemplateId, 'Identity');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setContentHtml(Identity $contentHtml)
    {
        return $this->setProperty('ContentHtml', $contentHtml, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setContentText(Identity $contentText)
    {
        return $this->setProperty('ContentText', $contentText, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setFilename(Identity $filename)
    {
        return $this->setProperty('Filename', $filename, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setLocaleName(Identity $localeName)
    {
        return $this->setProperty('LocaleName', $localeName, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setPdf(Identity $pdf)
    {
        return $this->setProperty('Pdf', $pdf, 'string');
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
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSubject(Identity $subject)
    {
        return $this->setProperty('Subject', $subject, 'string');
    }

    /**
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

 
}

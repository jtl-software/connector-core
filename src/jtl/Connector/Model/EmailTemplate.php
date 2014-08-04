<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Shop3 only.
 *
 * @access public
 * @package jtl\Connector\Model
 */
class EmailTemplate extends DataModel
{
    /**
     * @type Identity 
     */
    protected $id = null;

    /**
     * @type string 
     */
    protected $description = '';

    /**
     * @type string 
     */
    protected $emailType = '';

    /**
     * @type int 
     */
    protected $error = 0;

    /**
     * @type string 
     */
    protected $filename = '';

    /**
     * @type bool 
     */
    protected $isActive = false;

    /**
     * @type bool 
     */
    protected $isAgb = false;

    /**
     * @type bool 
     */
    protected $isOii = false;

    /**
     * @type bool 
     */
    protected $isWrb = false;

    /**
     * @type string 
     */
    protected $moduleId = '';

    /**
     * @type string 
     */
    protected $name = '';

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'id',
    );

    /**
     * @param  Identity $id 
     * @return \jtl\Connector\Model\EmailTemplate
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('Id', $id, 'Identity');
    }

    /**
     * @return Identity 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  string $description 
     * @return \jtl\Connector\Model\EmailTemplate
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setDescription(Identity $description)
    {
        return $this->setProperty('Description', $description, 'string');
    }

    /**
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param  string $emailType 
     * @return \jtl\Connector\Model\EmailTemplate
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setEmailType(Identity $emailType)
    {
        return $this->setProperty('EmailType', $emailType, 'string');
    }

    /**
     * @return string 
     */
    public function getEmailType()
    {
        return $this->emailType;
    }

    /**
     * @param  int $error 
     * @return \jtl\Connector\Model\EmailTemplate
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setError(Identity $error)
    {
        return $this->setProperty('Error', $error, 'int');
    }

    /**
     * @return int 
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param  string $filename 
     * @return \jtl\Connector\Model\EmailTemplate
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
     * @param  bool $isActive 
     * @return \jtl\Connector\Model\EmailTemplate
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setIsActive(Identity $isActive)
    {
        return $this->setProperty('IsActive', $isActive, 'bool');
    }

    /**
     * @return bool 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param  bool $isAgb 
     * @return \jtl\Connector\Model\EmailTemplate
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setIsAgb(Identity $isAgb)
    {
        return $this->setProperty('IsAgb', $isAgb, 'bool');
    }

    /**
     * @return bool 
     */
    public function getIsAgb()
    {
        return $this->isAgb;
    }

    /**
     * @param  bool $isOii 
     * @return \jtl\Connector\Model\EmailTemplate
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setIsOii(Identity $isOii)
    {
        return $this->setProperty('IsOii', $isOii, 'bool');
    }

    /**
     * @return bool 
     */
    public function getIsOii()
    {
        return $this->isOii;
    }

    /**
     * @param  bool $isWrb 
     * @return \jtl\Connector\Model\EmailTemplate
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setIsWrb(Identity $isWrb)
    {
        return $this->setProperty('IsWrb', $isWrb, 'bool');
    }

    /**
     * @return bool 
     */
    public function getIsWrb()
    {
        return $this->isWrb;
    }

    /**
     * @param  string $moduleId 
     * @return \jtl\Connector\Model\EmailTemplate
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setModuleId(Identity $moduleId)
    {
        return $this->setProperty('ModuleId', $moduleId, 'string');
    }

    /**
     * @return string 
     */
    public function getModuleId()
    {
        return $this->moduleId;
    }

    /**
     * @param  string $name 
     * @return \jtl\Connector\Model\EmailTemplate
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setName(Identity $name)
    {
        return $this->setProperty('Name', $name, 'string');
    }

    /**
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

 
}

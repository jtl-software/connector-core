<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Internal
 */

namespace jtl\Connector\Model;

use \DateTime;

/**
 * Shop3 only.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Internal
 */
class EmailTemplate extends DataModel
{
    /**
     * @var Identity 
     */
    protected $id = null;

    /**
     * @var string 
     */
    protected $description = '';

    /**
     * @var string 
     */
    protected $emailType = '';

    /**
     * @var int 
     */
    protected $error = 0;

    /**
     * @var string 
     */
    protected $filename = '';

    /**
     * @var bool 
     */
    protected $isActive = false;

    /**
     * @var bool 
     */
    protected $isAgb = false;

    /**
     * @var bool 
     */
    protected $isOii = false;

    /**
     * @var bool 
     */
    protected $isWrb = false;

    /**
     * @var string 
     */
    protected $moduleId = '';

    /**
     * @var string 
     */
    protected $name = '';

    /**
     * @param  Identity $id 
     * @return \jtl\Connector\Model\EmailTemplate
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setDescription($description)
    {
        return $this->setProperty('description', $description, 'string');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setEmailType($emailType)
    {
        return $this->setProperty('emailType', $emailType, 'string');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setError($error)
    {
        return $this->setProperty('error', $error, 'int');
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
     * @param  bool $isActive 
     * @return \jtl\Connector\Model\EmailTemplate
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setIsActive($isActive)
    {
        return $this->setProperty('isActive', $isActive, 'bool');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setIsAgb($isAgb)
    {
        return $this->setProperty('isAgb', $isAgb, 'bool');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setIsOii($isOii)
    {
        return $this->setProperty('isOii', $isOii, 'bool');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'bool'.
     */
    public function setIsWrb($isWrb)
    {
        return $this->setProperty('isWrb', $isWrb, 'bool');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setModuleId($moduleId)
    {
        return $this->setProperty('moduleId', $moduleId, 'string');
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
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }

    /**
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

 
}

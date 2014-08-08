<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Internal
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Shop3 only.
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Internal
 * 
 * @Serializer\AccessType("public_method")
 */
class EmailTemplate extends DataModel
{
    /**
     * @var Identity 
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;

    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("description")
     * @Serializer\Accessor(getter="getDescription",setter="setDescription")
     */
    protected $description = '';

    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("emailType")
     * @Serializer\Accessor(getter="getEmailType",setter="setEmailType")
     */
    protected $emailType = '';

    /**
     * @var int 
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("error")
     * @Serializer\Accessor(getter="getError",setter="setError")
     */
    protected $error = 0;

    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("filename")
     * @Serializer\Accessor(getter="getFilename",setter="setFilename")
     */
    protected $filename = '';

    /**
     * @var bool 
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isActive")
     * @Serializer\Accessor(getter="getIsActive",setter="setIsActive")
     */
    protected $isActive = false;

    /**
     * @var bool 
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isAgb")
     * @Serializer\Accessor(getter="getIsAgb",setter="setIsAgb")
     */
    protected $isAgb = false;

    /**
     * @var bool 
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isOii")
     * @Serializer\Accessor(getter="getIsOii",setter="setIsOii")
     */
    protected $isOii = false;

    /**
     * @var bool 
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isWrb")
     * @Serializer\Accessor(getter="getIsWrb",setter="setIsWrb")
     */
    protected $isWrb = false;

    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("moduleId")
     * @Serializer\Accessor(getter="getModuleId",setter="setModuleId")
     */
    protected $moduleId = '';

    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';


    public function __construct()
    {
        $this->id = new Identity;
    }

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

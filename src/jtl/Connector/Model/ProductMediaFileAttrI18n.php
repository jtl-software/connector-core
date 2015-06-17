<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * 
 * @Serializer\AccessType("public_method")
 */
class ProductMediaFileAttrI18n extends DataModel
{
    /**
     * @var Identity 
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("productMediaFileAttrId")
     * @Serializer\Accessor(getter="getProductMediaFileAttrId",setter="setProductMediaFileAttrId")
     */
    protected $productMediaFileAttrId = null;

    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("languageISO")
     * @Serializer\Accessor(getter="getLanguageISO",setter="setLanguageISO")
     */
    protected $languageISO = '';

    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';

    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("value")
     * @Serializer\Accessor(getter="getValue",setter="setValue")
     */
    protected $value = '';

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productMediaFileAttrId = new Identity();
    }

    /**
     * @param Identity $productMediaFileAttrId 
     * @return \jtl\Connector\Model\ProductMediaFileAttrI18n
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductMediaFileAttrId(Identity $productMediaFileAttrId)
    {
        return $this->setProperty('productMediaFileAttrId', $productMediaFileAttrId, 'Identity');
    }

    /**
     * @return Identity 
     */
    public function getProductMediaFileAttrId()
    {
        return $this->productMediaFileAttrId;
    }

    /**
     * @param string $languageISO 
     * @return \jtl\Connector\Model\ProductMediaFileAttrI18n
     */
    public function setLanguageISO($languageISO)
    {
        return $this->setProperty('languageISO', $languageISO, 'string');
    }

    /**
     * @return string 
     */
    public function getLanguageISO()
    {
        return $this->languageISO;
    }

    /**
     * @param string $name 
     * @return \jtl\Connector\Model\ProductMediaFileAttrI18n
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

    /**
     * @param string $value 
     * @return \jtl\Connector\Model\ProductMediaFileAttrI18n
     */
    public function setValue($value)
    {
        return $this->setProperty('value', $value, 'string');
    }

    /**
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }
}

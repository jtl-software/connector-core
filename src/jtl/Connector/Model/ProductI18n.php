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
class ProductI18n extends DataModel
{
    /**
     * @type Identity Reference to product
     */
    protected $productId = null;

    /**
     * @type string 
     */
    protected $description = '';

    /**
     * @type string locale
     */
    protected $localeName = '';

    /**
     * @type string 
     */
    protected $metaDescription = '';

    /**
     * @type string 
     */
    protected $metaKeywords = '';

    /**
     * @type string 
     */
    protected $name = '';

    /**
     * @type string 
     */
    protected $shortDescription = '';

    /**
     * @type string 
     */
    protected $titleTag = '';

    /**
     * @type string 
     */
    protected $urlPath = '';


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'productId',
    );

    /**
     * @type array list of navigations
     */
    protected $navigations = array(
    );


    /**
     * @param  string $name 
     * @return \jtl\Connector\Model\ProductI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $description 
     * @return \jtl\Connector\Model\ProductI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
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
     * @param  string $shortDescription 
     * @return \jtl\Connector\Model\ProductI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setShortDescription($shortDescription)
    {
        return $this->setProperty('shortDescription', $shortDescription, 'string');
    }
    
    /**
     * @return string 
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * @param  string $urlPath 
     * @return \jtl\Connector\Model\ProductI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setUrlPath($urlPath)
    {
        return $this->setProperty('urlPath', $urlPath, 'string');
    }
    
    /**
     * @return string 
     */
    public function getUrlPath()
    {
        return $this->urlPath;
    }

    /**
     * @param  string $titleTag 
     * @return \jtl\Connector\Model\ProductI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setTitleTag($titleTag)
    {
        return $this->setProperty('titleTag', $titleTag, 'string');
    }
    
    /**
     * @return string 
     */
    public function getTitleTag()
    {
        return $this->titleTag;
    }

    /**
     * @param  string $metaKeywords 
     * @return \jtl\Connector\Model\ProductI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setMetaKeywords($metaKeywords)
    {
        return $this->setProperty('metaKeywords', $metaKeywords, 'string');
    }
    
    /**
     * @return string 
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }

    /**
     * @param  string $metaDescription 
     * @return \jtl\Connector\Model\ProductI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setMetaDescription($metaDescription)
    {
        return $this->setProperty('metaDescription', $metaDescription, 'string');
    }
    
    /**
     * @return string 
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * @param  Identity $productId Reference to product
     * @return \jtl\Connector\Model\ProductI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('productId', $productId, 'Identity');
    }
    
    /**
     * @return Identity Reference to product
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param  string $localeName locale
     * @return \jtl\Connector\Model\ProductI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setLocaleName($localeName)
    {
        return $this->setProperty('localeName', $localeName, 'string');
    }
    
    /**
     * @return string locale
     */
    public function getLocaleName()
    {
        return $this->localeName;
    }
}


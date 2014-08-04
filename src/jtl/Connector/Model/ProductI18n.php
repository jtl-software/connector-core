<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Locale specific texts for product.
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
     * @type string Optional product description
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
     * @type string Product name / title
     */
    protected $name = '';

    /**
     * @type string Optional product shortdescription
     */
    protected $shortDescription = '';

    /**
     * @type string 
     */
    protected $titleTag = '';

    /**
     * @type string Optional path of product URL
     */
    protected $urlPath = '';

    /**
     * @type array list of identities
     */
     protected $identities = array(
        'productId',
    );

    /**
     * @param  Identity $productId Reference to product
     * @return \jtl\Connector\Model\ProductI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('ProductId', $productId, 'Identity');
    }

    /**
     * @return Identity Reference to product
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param  string $description Optional product description
     * @return \jtl\Connector\Model\ProductI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setDescription(Identity $description)
    {
        return $this->setProperty('Description', $description, 'string');
    }

    /**
     * @return string Optional product description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param  string $localeName locale
     * @return \jtl\Connector\Model\ProductI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setLocaleName(Identity $localeName)
    {
        return $this->setProperty('LocaleName', $localeName, 'string');
    }

    /**
     * @return string locale
     */
    public function getLocaleName()
    {
        return $this->localeName;
    }

    /**
     * @param  string $metaDescription 
     * @return \jtl\Connector\Model\ProductI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMetaDescription(Identity $metaDescription)
    {
        return $this->setProperty('MetaDescription', $metaDescription, 'string');
    }

    /**
     * @return string 
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * @param  string $metaKeywords 
     * @return \jtl\Connector\Model\ProductI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setMetaKeywords(Identity $metaKeywords)
    {
        return $this->setProperty('MetaKeywords', $metaKeywords, 'string');
    }

    /**
     * @return string 
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }

    /**
     * @param  string $name Product name / title
     * @return \jtl\Connector\Model\ProductI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setName(Identity $name)
    {
        return $this->setProperty('Name', $name, 'string');
    }

    /**
     * @return string Product name / title
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param  string $shortDescription Optional product shortdescription
     * @return \jtl\Connector\Model\ProductI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setShortDescription(Identity $shortDescription)
    {
        return $this->setProperty('ShortDescription', $shortDescription, 'string');
    }

    /**
     * @return string Optional product shortdescription
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * @param  string $titleTag 
     * @return \jtl\Connector\Model\ProductI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setTitleTag(Identity $titleTag)
    {
        return $this->setProperty('TitleTag', $titleTag, 'string');
    }

    /**
     * @return string 
     */
    public function getTitleTag()
    {
        return $this->titleTag;
    }

    /**
     * @param  string $urlPath Optional path of product URL
     * @return \jtl\Connector\Model\ProductI18n
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setUrlPath(Identity $urlPath)
    {
        return $this->setProperty('UrlPath', $urlPath, 'string');
    }

    /**
     * @return string Optional path of product URL
     */
    public function getUrlPath()
    {
        return $this->urlPath;
    }

 
}

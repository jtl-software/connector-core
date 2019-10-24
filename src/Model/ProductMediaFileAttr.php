<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 */

namespace Jtl\Connector\Core\Model;

use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;

/**
 * Monolingual mediafile attribute.
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductMediaFileAttr extends DataModel
{
    /**
     * @var Identity
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("productMediaFileId")
     * @Serializer\Accessor(getter="getProductMediaFileId",setter="setProductMediaFileId")
     */
    protected $productMediaFileId = null;
    
    /**
     * @var ProductMediaFileAttrI18n[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ProductMediaFileAttrI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected $i18ns = [];
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productMediaFileId = new Identity();
    }
    
    /**
     * @param Identity $productMediaFileId
     * @return ProductMediaFileAttr
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductMediaFileId(Identity $productMediaFileId): ProductMediaFileAttr
    {
        $this->productMediaFileId = $productMediaFileId;
        
        return $this;
    }
    
    /**
     * @return Identity
     */
    public function getProductMediaFileId(): Identity
    {
        return $this->productMediaFileId;
    }
    
    /**
     * @param ProductMediaFileAttrI18n $i18n
     * @return ProductMediaFileAttr
     */
    public function addI18n(ProductMediaFileAttrI18n $i18n): ProductMediaFileAttr
    {
        $this->i18ns[] = $i18n;
        
        return $this;
    }
    
    /**
     * @param array $i18ns
     * @return ProductMediaFileAttr
     */
    public function setI18ns(array $i18ns): ProductMediaFileAttr
    {
        $this->i18ns = $i18ns;
        
        return $this;
    }
    
    /**
     * @return ProductMediaFileAttrI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }
    
    /**
     * @return ProductMediaFileAttr
     */
    public function clearI18ns(): ProductMediaFileAttr
    {
        $this->i18ns = [];
        
        return $this;
    }
}

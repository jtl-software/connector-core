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
 * ProductVariation Model. Each product defines its own variations, that means  variations are not global  in contrast to specifics.
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductVariation extends AbstractDataModel implements IdentityInterface
{
    /**
     * @var string - Multiple values displayed as radio buttons.
     */
    const TYPE_RADIO = 'radio';
    /**
     * @var string - Multiple values displayed as drop down.
     */
    const TYPE_SELECT = 'select';
    /**
     * @var string - boxes showing a text
     */
    const TYPE_TEXTBOX = 'textbox';
    /**
     * @var string - Optional text input (no values)
     */
    const TYPE_FREE_TEXT = 'freetext';
    /**
     * @var string - Required text input (no values)
     */
    const TYPE_FREE_TEXT_OBLIGATORY = 'obligatory_freetext';
    /**
     * @var string - boxes showing a color
     */
    const TYPE_IMAGE_SWATCHES = 'image_swatches';
    
    /**
     * @var Identity Unique productVariation id
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;

    /**
     * @var integer Optional sort number
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("sort")
     * @Serializer\Accessor(getter="getSort",setter="setSort")
     */
    protected $sort = 0;
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("type")
     * @Serializer\Accessor(getter="getType",setter="setType")
     */
    protected $type = '';
    
    /**
     * @var ProductVariationI18n[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ProductVariationI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected $i18ns = [];
    
    /**
     * @var ProductVariationInvisibility[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ProductVariationInvisibility>")
     * @Serializer\SerializedName("invisibilities")
     * @Serializer\AccessType("reflection")
     */
    protected $invisibilities = [];
    
    /**
     * @var ProductVariationValue[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ProductVariationValue>")
     * @Serializer\SerializedName("values")
     * @Serializer\AccessType("reflection")
     */
    protected $values = [];
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
    }
    
    /**
     * @param Identity $id Unique productVariation id
     * @return ProductVariation
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): ProductVariation
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity Unique productVariation id
     */
    public function getId(): Identity
    {
        return $this->id;
    }

    /**
     * @param integer $sort Optional sort number
     * @return ProductVariation
     */
    public function setSort(int $sort): ProductVariation
    {
        $this->sort = $sort;
        
        return $this;
    }
    
    /**
     * @return integer Optional sort number
     */
    public function getSort(): int
    {
        return $this->sort;
    }
    
    /**
     * @param string $type
     * @return ProductVariation
     */
    public function setType(string $type): ProductVariation
    {
        $this->type = $type;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    
    /**
     * @param ProductVariationI18n $i18n
     * @return ProductVariation
     */
    public function addI18n(ProductVariationI18n $i18n): ProductVariation
    {
        $this->i18ns[] = $i18n;
        
        return $this;
    }

    /**
     * @param ProductVariationI18n ...$i18ns
     * @return ProductVariation
     */
    public function setI18ns(ProductVariationI18n ...$i18ns): ProductVariation
    {
        $this->i18ns = $i18ns;
        
        return $this;
    }
    
    /**
     * @return ProductVariationI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }
    
    /**
     * @return ProductVariation
     */
    public function clearI18ns(): ProductVariation
    {
        $this->i18ns = [];
        
        return $this;
    }
    
    /**
     * @param ProductVariationInvisibility $invisibility
     * @return ProductVariation
     */
    public function addInvisibility(ProductVariationInvisibility $invisibility): ProductVariation
    {
        $this->invisibilities[] = $invisibility;
        
        return $this;
    }

    /**
     * @param ProductVariationInvisibility ...$invisibilities
     * @return ProductVariation
     */
    public function setInvisibilities(ProductVariationInvisibility ...$invisibilities): ProductVariation
    {
        $this->invisibilities = $invisibilities;
        
        return $this;
    }
    
    /**
     * @return ProductVariationInvisibility[]
     */
    public function getInvisibilities(): array
    {
        return $this->invisibilities;
    }
    
    /**
     * @return ProductVariation
     */
    public function clearInvisibilities(): ProductVariation
    {
        $this->invisibilities = [];
        
        return $this;
    }
    
    /**
     * @param ProductVariationValue $value
     * @return ProductVariation
     */
    public function addValue(ProductVariationValue $value): ProductVariation
    {
        $this->values[] = $value;
        
        return $this;
    }

    /**
     * @param ProductVariationValue ...$values
     * @return ProductVariation
     */
    public function setValues(ProductVariationValue ...$values): ProductVariation
    {
        $this->values = $values;
        
        return $this;
    }
    
    /**
     * @return ProductVariationValue[]
     */
    public function getValues(): array
    {
        return $this->values;
    }
    
    /**
     * @return ProductVariation
     */
    public function clearValues(): ProductVariation
    {
        $this->values = [];
        
        return $this;
    }
}

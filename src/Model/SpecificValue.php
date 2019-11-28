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
 * Specific value properties to define a new specificValue with a sort number.
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class SpecificValue extends AbstractDataModel implements IdentityInterface
{
    /**
     * @var Identity Unique specificValue id
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
     * @var SpecificValueI18n[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\SpecificValueI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected $i18ns = [];
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
    }
    
    /**
     * @param Identity $id Unique specificValue id
     * @return SpecificValue
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): SpecificValue
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity Unique specificValue id
     */
    public function getId(): Identity
    {
        return $this->id;
    }

    /**
     * @param integer $sort Optional sort number
     * @return SpecificValue
     */
    public function setSort(int $sort): SpecificValue
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
     * @param SpecificValueI18n $i18n
     * @return SpecificValue
     */
    public function addI18n(SpecificValueI18n $i18n): SpecificValue
    {
        $this->i18ns[] = $i18n;
        
        return $this;
    }

    /**
     * @param SpecificValueI18n ...$i18ns
     * @return SpecificValue
     */
    public function setI18ns(SpecificValueI18n ...$i18ns): SpecificValue
    {
        $this->i18ns = $i18ns;
        
        return $this;
    }
    
    /**
     * @return SpecificValueI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }
    
    /**
     * @return SpecificValue
     */
    public function clearI18ns(): SpecificValue
    {
        $this->i18ns = [];
        
        return $this;
    }
}

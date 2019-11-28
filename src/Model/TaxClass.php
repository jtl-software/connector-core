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
 * Tax class model (set in JTL-Wawi ERP)
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class TaxClass extends AbstractDataModel implements IdentityInterface
{
    /**
     * @var Identity Unique taxClass id
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;
    
    /**
     * @var boolean Optional: Flag default tax class. Default is false. Exact 1 taxClass has to be marked as default.
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isDefault")
     * @Serializer\Accessor(getter="getIsDefault",setter="setIsDefault")
     */
    protected $isDefault = false;
    
    /**
     * @var string Optional tax class name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
    }
    
    /**
     * @param Identity $id Unique taxClass id
     * @return TaxClass
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): TaxClass
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity Unique taxClass id
     */
    public function getId(): Identity
    {
        return $this->id;
    }
    
    /**
     * @param boolean $isDefault Optional: Flag default tax class. Default is false. Exact 1 taxClass has to be marked as default.
     * @return TaxClass
     */
    public function setIsDefault(bool $isDefault): TaxClass
    {
        $this->isDefault = $isDefault;
        
        return $this;
    }
    
    /**
     * @return boolean Optional: Flag default tax class. Default is false. Exact 1 taxClass has to be marked as default.
     */
    public function getIsDefault(): bool
    {
        return $this->isDefault;
    }
    
    /**
     * @param string $name Optional tax class name
     * @return TaxClass
     */
    public function setName(string $name): TaxClass
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return string Optional tax class name
     */
    public function getName(): string
    {
        return $this->name;
    }
}

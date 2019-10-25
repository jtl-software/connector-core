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
 * Specifies product units like "piece", "bottle", "package".
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class Unit extends DataModel
{
    /**
     * @var Identity Unit id
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;
    
    /**
     * @var UnitI18n[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\UnitI18n>")
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
     * @param Identity $id Unit id
     * @return Unit
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): Unit
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return Identity Unit id
     */
    public function getId(): Identity
    {
        return $this->id;
    }
    
    /**
     * @param UnitI18n $i18n
     * @return Unit
     */
    public function addI18n(UnitI18n $i18n): Unit
    {
        $this->i18ns[] = $i18n;
        
        return $this;
    }

    /**
     * @param UnitI18n ...$i18ns
     * @return Unit
     */
    public function setI18ns(UnitI18n ...$i18ns): Unit
    {
        $this->i18ns = $i18ns;
        
        return $this;
    }
    
    /**
     * @return UnitI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }
    
    /**
     * @return Unit
     */
    public function clearI18ns(): Unit
    {
        $this->i18ns = [];
        
        return $this;
    }
}

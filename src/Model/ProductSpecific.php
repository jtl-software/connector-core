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
 * Product to specificValue Assignment. Product specifics are used to assign characteristic product attributes like color or  size... When different products have common specifics, products are similar.
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductSpecific extends AbstractIdentity
{
    /**
     * @var Identity Reference to specificValue
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("specificValueId")
     * @Serializer\Accessor(getter="getSpecificValueId",setter="setSpecificValueId")
     */
    protected $specificValueId = null;

    /**
     * Constructor.
     * @param string $endpoint
     * @param int $host
     */
    public function __construct(string $endpoint = '', int $host = 0)
    {
        parent::__construct($endpoint, $host);
        $this->specificValueId = new Identity();
    }

    /**
     * @param Identity $specificValueId Reference to specificValue
     * @return ProductSpecific
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setSpecificValueId(Identity $specificValueId): ProductSpecific
    {
        $this->specificValueId = $specificValueId;
        
        return $this;
    }
    
    /**
     * @return Identity Reference to specificValue
     */
    public function getSpecificValueId(): Identity
    {
        return $this->specificValueId;
    }
}

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
 * Localized customer group name.
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CustomerGroupI18n extends AbstractI18n
{
    /**
     * @var string Localized customer group name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';

    /**
     * @param string $name Localized customer group name
     * @return CustomerGroupI18n
     */
    public function setName(string $name): CustomerGroupI18n
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @return string Localized customer group name
     */
    public function getName(): string
    {
        return $this->name;
    }
}

<?php
/**
 * @copyright 2010-2019 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */

namespace Jtl\Connector\Core\Serializer;

use JMS\Serializer\Construction\ObjectConstructorInterface;
use JMS\Serializer\DeserializationContext as Context;
use JMS\Serializer\Metadata\ClassMetadata;
use JMS\Serializer\Visitor\DeserializationVisitorInterface as Visitor;

/**
 * Class ObjectConstructor
 * @package Jtl\Connector\Core\Serializer
 */
class ObjectConstructor implements ObjectConstructorInterface
{
    /**
     * @param Visitor $visitor
     * @param ClassMetadata $metadata
     * @param mixed $data
     * @param array $type
     * @param Context $context
     * @return object|null
     */
    public function construct(Visitor $visitor, ClassMetadata $metadata, $data, array $type, Context $context): ?object
    {
        $className = $metadata->name;
        return new $className();
    }
}

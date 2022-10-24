<?php
namespace Jtl\Connector\Core\Serializer\Handler;

use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\JsonDeserializationVisitor;
use Jtl\Connector\Core\Definition\Model;
use Jtl\Connector\Core\Model\Identity;
use Jtl\Connector\Core\Exception\DefinitionException;
use ReflectionException;

class IdentityHandler implements SubscribingHandlerInterface
{
    /**
     * @var Identity[]
     */
    protected $identities;

    /**
     * @return array<int, array<string, string|int>>
     */
    public static function getSubscribingMethods()
    {
        return [
            [
                'direction' => GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => Identity::class,
                'method' => 'deserializeIdentity',
            ],
            [
                'direction' => GraphNavigatorInterface::DIRECTION_SERIALIZATION,
                'format' => 'json',
                'type' => Identity::class,
                'method' => 'serializeIdentity',
            ]
        ];
    }

    /**
     * @param JsonDeserializationVisitor $visitor
     * @param array $identity
     * @param array $type
     * @param Context $context
     * @return Identity
     * @throws DefinitionException
     */
    public function deserializeIdentity(
        JsonDeserializationVisitor $visitor,
        array $identity,
        array $type,
        Context $context
    ) {
        $identityObject = new Identity($identity[0], $identity[1]);
        $currentObject  = $visitor->getCurrentObject();
        if ($identity[1] > 0 && !\is_null($currentObject)) {
            $modelName    = (new \ReflectionClass($currentObject))->getShortName();
            $currentPath  = $context->getCurrentPath();
            $propertyName = \end($currentPath);
            if (Model::isIdentityProperty($modelName, $propertyName)) {
                $identityType = Model::getPropertyIdentityType($modelName, $propertyName);
                if (!isset($this->identities[$identityType][$identity[1]])) {
                    $this->identities[$identityType][$identity[1]] = $identityObject;
                }

                $identityObject = $this->identities[$identityType][$identity[1]];
            }
        }

        return $identityObject;
    }

    /**
     * @param JsonSerializationVisitor $visitor
     * @param Identity $identity
     * @param array $type
     * @param Context $context
     * @return array<int, string|int>
     */
    public function serializeIdentity(
        JsonSerializationVisitor $visitor,
        Identity $identity,
        array $type,
        Context $context
    ) {
        return [$identity->getEndpoint(), $identity->getHost()];
    }
}

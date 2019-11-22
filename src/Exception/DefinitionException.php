<?php
namespace Jtl\Connector\Core\Exception;

class DefinitionException extends \Exception
{
    const MODEL_MAPPING_NOT_EXISTS = 10;
    const UNKNOWN_IDENTITY_PROPERTY = 20;
    const UNKNOWN_MODEL = 30;
    const IDENTITY_TYPE_MAPPING_NOT_EXISTS = 40;
    const UNKNOWN_IDENTITY_TYPE = 50;
    const UNKNOWN_CONTROLLER = 60;

    /**
     * @param string $model
     * @return DefinitionException
     */
    public static function modelMappingNotExists(string $model): DefinitionException
    {
        $msg = sprintf('Identity type for model (%s) not found', $model);
        return new static($msg, self::MODEL_MAPPING_NOT_EXISTS);
    }

    /**
     * @param int $type
     * @return DefinitionException
     */
    public static function identityTypeMappingNotExists(int $type): DefinitionException
    {
        $msg = sprintf('Model for identity type (%s) not found', $type);
        return new static($msg, self::IDENTITY_TYPE_MAPPING_NOT_EXISTS);
    }

    /**
     * @param integer $type
     * @return DefinitionException
     */
    public static function unknownIdentityType(int $type): DefinitionException
    {
        $msg = sprintf('Identity type (%s) does not exist', $type);
        return new static($msg, self::UNKNOWN_IDENTITY_TYPE);
    }

    /**
     * @param string $model
     * @param string $property
     * @return DefinitionException
     */
    public static function unknownIdentityProperty(string $model, string $property): DefinitionException
    {
        $msg = sprintf('Unknown identity property (%s) in model (%s)', $property, $model);
        return new static($msg, self::UNKNOWN_IDENTITY_PROPERTY);
    }

    /**
     * @param string $model
     * @return DefinitionException
     */
    public static function unknownModel(string $model): DefinitionException
    {
        $msg = sprintf('Model (%s) does not exist', $model);
        return new static($msg, self::UNKNOWN_MODEL);
    }

    /**
     * @param string $controller
     * @return DefinitionException
     */
    public static function unknownController(string $controller): DefinitionException
    {
        $msg = sprintf('Controller (%s) does not exist', $controller);
        return new static($msg, self::UNKNOWN_CONTROLLER);
    }
}
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
    const UNKNOWN_CONFIG_OPTION = 70;
    const DEFAULT_VALUE_NOT_EXISTS = 80;
    const UNKNOWN_ACTION = 90;
    const UNKNOWN_MOMENT = 100;

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

    /**
     * @param string $option
     * @return DefinitionException
     */
    public static function unknownConfigOption(string $option): DefinitionException
    {
        $msg = sprintf('Unknown config option (%s)', $option);
        return new static($msg, self::UNKNOWN_CONFIG_OPTION);
    }

    /**
     * @param string $option
     * @return DefinitionException
     */
    public static function defaultValueNotExists(string $option): DefinitionException
    {
        $msg = sprintf('Default value for config option (%s) does not exist', $option);
        return new static($msg, self::DEFAULT_VALUE_NOT_EXISTS);
    }

    /**
     * @param string $action
     * @return DefinitionException
     */
    public static function unknownAction(string $action): DefinitionException
    {
        $msg = sprintf('Unknown action (%s)', $action);
        return new static($msg, self::UNKNOWN_ACTION);
    }

    /**
     * @param string $moment
     * @return DefinitionException
     */
    public static function unknownMoment(string $moment): DefinitionException
    {
        $msg = sprintf('Unknown moment (%s)', $moment);
        return new static($msg, self::UNKNOWN_MOMENT);
    }
}

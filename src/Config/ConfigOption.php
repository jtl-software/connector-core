<?php

namespace Jtl\Connector\Core\Config;

use Jtl\Connector\Core\Exception\ConfigException;

class ConfigOption
{
    public const
        TYPE_BOOLEAN = 'boolean',
        TYPE_DOUBLE = 'double',
        TYPE_INTEGER = 'integer',
        TYPE_STRING = 'string';

    /**
     * @var string[]
     */
    protected static $types = [
        self::TYPE_BOOLEAN,
        self::TYPE_DOUBLE,
        self::TYPE_INTEGER,
        self::TYPE_STRING,
    ];

    /**
     * @var string
     */
    protected $key;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var mixed
     */
    protected $defaultValue;

    /**
     * Option constructor.
     * @param string $key
     * @param string $type
     * @throws ConfigException
     */
    public function __construct(string $key, string $type)
    {
        $this->setKey($key);
        $this->setType($type);
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     * @return $this
     * @throws ConfigException
     */
    protected function setKey(string $key): ConfigOption
    {
        if (empty($key)) {
            throw ConfigException::keyIsEmpty();
        }

        $this->key = $key;
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
     * @param string $type
     * @return $this
     * @throws ConfigException
     */
    protected function setType(string $type): ConfigOption
    {
        if (!self::isType($type)) {
            throw ConfigException::unknownType($type);
        }
        $this->type = $type;
        return $this;
    }

    /**
     * @return boolean
     */
    public function hasDefaultValue(): bool
    {
        return !is_null($this->defaultValue);
    }

    /**
     * @return mixed
     */
    public function getDefaultValue()
    {
        return $this->defaultValue;
    }

    /**
     * @param $defaultValue
     * @return $this
     * @throws ConfigException
     */
    public function setDefaultValue($defaultValue): ConfigOption
    {
        if (!is_null($defaultValue) && !$this->isValidValue($defaultValue)) {
            throw ConfigException::wrongType($this->getType(), gettype($defaultValue));
        }
        $this->defaultValue = $defaultValue;
        return $this;
    }

    /**
     * @param string $value
     * @return boolean
     */
    public function isValidValue($value): bool
    {
        return gettype($value) === $this->getType();
    }

    /**
     * @param string $type
     * @return boolean
     */
    public static function isType(string $type): bool
    {
        return in_array($type, self::$types, true);
    }

    /**
     * @param string $key
     * @param string $type
     * @param null $defaultValue
     * @return ConfigOption
     * @throws ConfigException
     */
    public static function create(string $key, string $type = self::TYPE_STRING, $defaultValue = null): ConfigOption
    {
        return (new static($key, $type))->setDefaultValue($defaultValue);
    }
}

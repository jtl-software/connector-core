<?php

namespace Jtl\Connector\Core\Config;

use Jtl\Connector\Core\Exception\ConfigException;
use Jtl\Connector\Core\Exception\ConfigSchemaValidationException;
use Jtl\Connector\Core\Logger\Logger;
use Noodlehaus\ConfigInterface;

class ConfigSchema
{
    public const
        LOG_LEVEL = 'log_level',
        MAIN_LANGUAGE = 'main_language';

    /**
     * @var ConfigSchemaOption[]
     */
    protected $options = [];

    /**
     * @param string $key
     * @return boolean
     */
    public function isOption(string $key): bool
    {
        return isset($this->options[$key]);
    }

    /**
     * @param string $key
     * @return ConfigSchemaOption
     * @throws ConfigException
     */
    public function getOption(string $key): ConfigSchemaOption
    {
        if (!$this->isOption($key)) {
            throw ConfigException::unknownOption($key);
        }
        return $this->options[$key];
    }

    /**
     * @param ConfigSchemaOption $option
     * @return ConfigSchema
     */
    public function setOption(ConfigSchemaOption $option): self
    {
        $this->options[$option->getKey()] = $option;
        return $this;
    }

    /**
     * @return mixed[]
     */
    public function getOptions(): array
    {
        return array_values($this->options);
    }

    /**
     * @param ConfigSchemaOption ...$options
     * @return ConfigSchema
     */
    public function setOptions(ConfigSchemaOption ...$options): self
    {
        foreach ($options as $option) {
            $this->setOption($option);
        }
        return $this;
    }

    /**
     * @return mixed[]
     */
    public function getDefaultValues(): array
    {
        return array_map(function (ConfigSchemaOption $option) {
            return $option->getDefaultValue();
        }, array_filter($this->options, function (ConfigSchemaOption $option) {
            return $option->hasDefaultValue();
        }));
    }

    /**
     * @param ConfigInterface $config
     * @throws ConfigException
     */
    public function validateConfig(ConfigInterface $config): void
    {
        $invalidValues = [];
        $missingProperties = [];
        foreach($this->options as $option) {
            $configValue = $config->get($option->getKey());
            if(!is_null($configValue) && !$option->isValidValue($configValue)) {
                $invalidValues[] = $option->getKey();
            } elseif (is_null($configValue) && $option->isRequired()) {
                $missingProperties[] = $option->getKey();
            }
        }

        if(count($invalidValues) > 0 || count($missingProperties) > 0) {
            throw ConfigException::schemaValidationErrors($invalidValues, $missingProperties);
        }
    }

    /**
     * @return ConfigSchemaOption[]
     * @throws ConfigException
     */
    public static function createDefaultOptions(): array
    {
        return [
            ConfigSchemaOption::create(self::LOG_LEVEL, ConfigSchemaOption::TYPE_STRING, true, Logger::INFO),
            ConfigSchemaOption::create(self::MAIN_LANGUAGE, ConfigSchemaOption::TYPE_STRING, true, 'de')
        ];
    }
}

<?php

namespace Jtl\Connector\Core\Config;

use Jtl\Connector\Core\Exception\ConfigException;
use Jtl\Connector\Core\Logger\Logger;
use Noodlehaus\ConfigInterface;

class ConfigSchema
{
    public const
        LOG_LEVEL = 'log_level',
        MAIN_LANGUAGE = 'main_language';

    /**
     * @var ConfigParameter[]
     */
    protected $parameters = [];

    /**
     * @param string $key
     * @return boolean
     */
    public function hasParameter(string $key): bool
    {
        return isset($this->parameters[$key]);
    }

    /**
     * @param string $key
     * @return ConfigParameter
     * @throws ConfigException
     */
    public function getParameter(string $key): ConfigParameter
    {
        if (!$this->hasParameter($key)) {
            throw ConfigException::unknownParameter($key);
        }
        return $this->parameters[$key];
    }

    /**
     * @param ConfigParameter $parameter
     * @return ConfigSchema
     */
    public function setParameter(ConfigParameter $parameter): self
    {
        $this->parameters[$parameter->getKey()] = $parameter;
        return $this;
    }

    /**
     * @return ConfigParameter[]
     */
    public function getParameters(): array
    {
        return array_values($this->parameters);
    }

    /**
     * @param ConfigParameter ...$parameters
     * @return ConfigSchema
     */
    public function setParameters(ConfigParameter ...$parameters): self
    {
        foreach ($parameters as $option) {
            $this->setParameter($option);
        }
        return $this;
    }

    /**
     * @return mixed[]
     */
    public function getDefaultValues(): array
    {
        return array_map(function (ConfigParameter $option) {
            return $option->getDefaultValue();
        }, array_filter($this->parameters, function (ConfigParameter $option) {
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
        foreach($this->parameters as $option) {
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
     * @return ConfigParameter[]
     * @throws ConfigException
     */
    public static function createDefaultParameters(): array
    {
        return [
            ConfigParameter::create(self::LOG_LEVEL, ConfigParameter::TYPE_STRING, true, true, Logger::INFO),
            ConfigParameter::create(self::MAIN_LANGUAGE, ConfigParameter::TYPE_STRING, true, true, 'de')
        ];
    }
}

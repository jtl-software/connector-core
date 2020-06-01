<?php

namespace Jtl\Connector\Core\Config;

use Jtl\Connector\Core\Exception\ConfigException;
use Noodlehaus\ConfigInterface;
use Psr\Log\LogLevel;

class ConfigSchema
{
    public const
        LOG_LEVEL = 'log_level',
        MAIN_LANGUAGE = 'main_language',
        CONNECTOR_DIR = 'connector_dir',
        LOG_DIR = 'log_dir',
        CACHE_DIR = 'cache_dir',
        PLUGINS_DIR = 'plugins_dir',
        FEATURES_PATH = 'features_path',
        DEBUG = 'debug';

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
        foreach ($parameters as $parameter) {
            $this->setParameter($parameter);
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
        foreach ($this->parameters as $parameter) {
            $configValue = $config->get($parameter->getKey());
            if (!is_null($configValue) && !$parameter->isValidValue($configValue)) {
                $invalidValues[] = $parameter->getKey();
            } elseif (is_null($configValue) && $parameter->isRequired()) {
                $missingProperties[] = $parameter->getKey();
            }
        }

        if (count($invalidValues) > 0 || count($missingProperties) > 0) {
            throw ConfigException::schemaValidationErrors($invalidValues, $missingProperties);
        }
    }

    /**
     * @param string $connectorDir
     * @return ConfigParameter[]
     * @throws ConfigException
     */
    public static function createDefaultParameters(string $connectorDir): array
    {
        return [
            ConfigParameter::create(self::LOG_LEVEL, ConfigParameter::TYPE_STRING, true, true, LogLevel::INFO),
            ConfigParameter::create(self::MAIN_LANGUAGE, ConfigParameter::TYPE_STRING, true, true, 'de'),
            ConfigParameter::create(self::CONNECTOR_DIR, ConfigParameter::TYPE_STRING, true, true, $connectorDir),
            ConfigParameter::create(self::LOG_DIR, ConfigParameter::TYPE_STRING, true, true, sprintf('%s/var/log', $connectorDir)),
            ConfigParameter::create(self::CACHE_DIR, ConfigParameter::TYPE_STRING, true, false, sprintf('%s/var/cache', $connectorDir)),
            ConfigParameter::create(self::PLUGINS_DIR, ConfigParameter::TYPE_STRING, true, false, sprintf('%s/plugins', $connectorDir)),
            ConfigParameter::create(self::FEATURES_PATH, ConfigParameter::TYPE_STRING, true, false, sprintf('%s/config/features.json', $connectorDir)),
            ConfigParameter::create(self::DEBUG, ConfigParameter::TYPE_BOOLEAN, true, true, false),
        ];
    }
}

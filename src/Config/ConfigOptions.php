<?php

namespace Jtl\Connector\Core\Config;

use Jtl\Connector\Core\Exception\ConfigException;
use Jtl\Connector\Core\Logger\Logger;

class ConfigOptions
{
    public const
        LOG_LEVEL = 'log_level',
        MAIN_LANGUAGE = 'main_language';

    /**
     * @var ConfigOption[]
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
     * @return ConfigOption
     * @throws ConfigException
     */
    public function getOption(string $key): ConfigOption
    {
        if (!$this->isOption($key)) {
            throw ConfigException::unknownOption($key);
        }
        return $this->options[$key];
    }

    /**
     * @param ConfigOption $option
     * @return ConfigOptions
     */
    public function setOption(ConfigOption $option): self
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
     * @param ConfigOption ...$options
     * @return ConfigOptions
     */
    public function setOptions(ConfigOption ...$options): self
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
        return array_map(function (ConfigOption $option) {
            return $option->getDefaultValue();
        }, array_filter($this->options, function (ConfigOption $option) {
            return $option->hasDefaultValue();
        }));
    }

    /**
     * @return ConfigOption[]
     * @throws ConfigException
     */
    public static function createDefaultOptions(): array
    {
        return [
            ConfigOption::create(self::LOG_LEVEL, ConfigOption::TYPE_STRING, Logger::INFO),
            ConfigOption::create(self::MAIN_LANGUAGE, ConfigOption::TYPE_STRING, 'de')
        ];
    }
}

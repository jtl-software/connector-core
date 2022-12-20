<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Config;

use Jtl\Connector\Core\Exception\ConfigException;
use Noodlehaus\Config;
use Noodlehaus\Parser\Json;

/**
 * Config Class
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.com>
 */
class FileConfig extends Config implements CoreConfigInterface
{
    protected string $filePath = '';

    protected ConfigSchema $configSchema;

    /**
     * FileConfig constructor.
     *
     * @param string            $filePath
     * @param ConfigSchema|null $configSchema
     */
    public function __construct(string $filePath, ?ConfigSchema $configSchema = null)
    {
        if (!\is_file($filePath) && \is_dir(\dirname($filePath))) {
            parent::__construct('{}', new Json(), true);
        } else {
            parent::__construct($filePath);
        }

        $this->configSchema = $configSchema ?? new ConfigSchema();
        $this->filePath     = $filePath;
    }

    /**
     * @inheritDoc
     */
    public function getConfigSchema(): ConfigSchema
    {
        return $this->configSchema;
    }

    /**
     * @inheritDoc
     */
    public function setConfigSchema(ConfigSchema $configSchema): self
    {
        $this->configSchema = $configSchema;

        return $this;
    }

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return void
     * @throws ConfigException
     */
    public function set($key, $value): void
    {
        if (empty($key)) {
            throw ConfigException::keyIsEmpty();
        }

        parent::set($key, $value);
    }

    public function write(): void
    {
        $this->toFile($this->filePath);
    }

    /**
     * @inheritDoc
     */
    public function getBool(string $valueName, ?bool $default = null): bool
    {
        if ($this->check($valueName) === false) {
            self::throwTypeError($valueName, ConfigParameter::TYPE_BOOLEAN);
        }

        return (bool)$this->get($valueName, $default);
    }

    /**
     * @param string $valueName
     *
     * @return bool
     * @throws ConfigException
     */
    private function check(string $valueName): bool
    {
        return $this->configSchema->getParameter($valueName)->isValidValue($valueName);
    }

    /**
     * @param string $valueName
     * @param string $type
     *
     * @return void
     * @throws \TypeError
     */
    private static function throwTypeError(string $valueName, string $type): void
    {
        throw new \TypeError($valueName . ' is not valid type ' . $type . '.');
    }

    /**
     * @inheritDoc
     */
    public function getString(string $valueName, ?string $default = null): string
    {
        if ($this->check($valueName) === false) {
            self::throwTypeError($valueName, ConfigParameter::TYPE_STRING);
        }

        return (string)$this->get($valueName, $default);
    }
}

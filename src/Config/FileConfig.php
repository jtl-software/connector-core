<?php

/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Config
 */
namespace Jtl\Connector\Core\Config;

use Noodlehaus\Config;

/**
 * Config Class
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.com>
 */
class FileConfig implements ConfigInterface
{
    /**
     * @var string
     */
    protected $filePath = '';

    /**
     * @var Config
     */
    protected $config;

    /**
     * Config constructor.
     * @param string $filePath
     * @throws \InvalidArgumentException
     */
    public function __construct(string $filePath)
    {
        if (!file_exists($filePath)) {
            throw new \InvalidArgumentException(sprintf('File %s does not exist', $filePath));
        }

        $this->filePath = $filePath;
        $this->config = new Config($filePath);
    }

    /**
     * @param string $name
     * @param null $default
     * @return mixed|null
     */
    public function get(string $name, $default = null)
    {
        return $this->config->get($name, $default);
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return mixed|void
     */
    public function set(string $name, $value)
    {
        $this->config->set($name, $value);
        $this->config->toFile($this->filePath);
    }
}

<?php

namespace Jtl\Connector\Core\Config;

use Noodlehaus\AbstractConfig;
use Noodlehaus\ConfigInterface;

class RuntimeConfig implements ConfigInterface
{
    /**
     * @var RuntimeConfig
     */
    protected static $instance;

    /**
     * @var mixed[]
     */
    protected $options = [];

    /**
     * @var AbstractConfig
     */
    protected $config;

    private function __construct()
    {
        $this->config = new ArrayConfig([]);
    }

    /**
     * @return RuntimeConfig
     */
    public static function getInstance(): RuntimeConfig
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    /**
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return $this->config->get($key, $default);
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public function set($key, $value)
    {
        $this->config->set($key, $value);
    }

    /**
     * @param string $key
     * @return boolean
     */
    public function has($key)
    {
        return $this->config->has($key);
    }

    /**
     * @return mixed[]
     */
    public function all()
    {
        return $this->config->all();
    }
}

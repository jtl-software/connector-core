<?php
namespace Jtl\Connector\Core\Config;

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

    private function __construct()
    {
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
        if($this->has($key)) {
            return $this->options[$key];
        }
        return $default;
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public function set($key, $value)
    {
        $this->options[$key] = $value;
    }

    /**
     * @param string $key
     * @return boolean
     */
    public function has($key)
    {
        return isset($this->options[$key]);
    }

    /**
     * @return mixed[]
     */
    public function all()
    {
        return $this->options;
    }
}

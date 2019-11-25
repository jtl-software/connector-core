<?php
namespace Jtl\Connector\Core\Config;


use Jtl\Connector\Core\Definition\ConfigOption;

class EnvConfig implements ConfigInterface
{
    /**
     * @var EnvConfig
     */
    protected static $instance;

    private function __construct()
    {
    }

    /**
     * @return EnvConfig
     */
    public static function getInstance(): EnvConfig
    {
        if(is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    /**
     * @param string $name
     * @param mixed $default
     * @return mixed
     */
    public function get(string $name, $default = null)
    {
        $value = \getenv(strtoupper($name));
        $type = ConfigOption::getType($name);
        if ($value === false) {
            return $default;
        }

        switch ($type) {
            case ConfigOption::TYPE_BOOLEAN:
                $returnValue = boolval($value);
                if ($value === 'false') {
                    $returnValue = false;
                }
                break;
            case ConfigOption::TYPE_INTEGER:
                $returnValue = intval($value);
                break;
            case ConfigOption::TYPE_FLOAT:
                $returnValue = floatval($value);
                break;
            default:
                $returnValue = $value;
                break;
        }

        return $returnValue;
    }

    public function set(string $name, $value)
    {
        $setting = sprintf('%s=%s', strtoupper($name), $value);
        \putenv($setting);
    }
}
<?php

namespace Jtl\Connector\Core\Config;


interface ConfigInterface
{
    /**
     * @param string $name
     * @param mixed $default
     * @return mixed
     */
    public function get(string $name, $default = null);

    /**
     * @param string $name
     * @param mixed $value
     * @return mixed
     */
    public function set(string $name, $value);
}
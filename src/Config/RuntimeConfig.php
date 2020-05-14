<?php

namespace Jtl\Connector\Core\Config;

class RuntimeConfig extends ArrayConfig
{
    /**
     * @var RuntimeConfig
     */
    protected static $instance;

    /**
     * RuntimeConfig constructor.
     */
    private function __construct()
    {
        parent::__construct([]);
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
}

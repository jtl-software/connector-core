<?php

namespace Jtl\Connector\Core\Config;

class GlobalConfig extends ArrayConfig
{
    /**
     * @var GlobalConfig
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
     * @return GlobalConfig
     */
    public static function getInstance(): GlobalConfig
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}

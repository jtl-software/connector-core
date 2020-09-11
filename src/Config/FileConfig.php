<?php

/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Config
 */
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
class FileConfig extends Config
{
    /**
     * @var string
     */
    protected $filePath = '';

    /**
     * FileConfig constructor.
     * @param string $filePath
     */
    public function __construct(string $filePath)
    {
        if (!is_file($filePath) && is_dir(dirname($filePath))) {
            parent::__construct('{}', new Json(), true);
        } else {
            parent::__construct($filePath);
        }

        $this->filePath = $filePath;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return mixed|void
     * @throws ConfigException
     */
    public function set($key, $value)
    {
        if (empty($key)) {
            throw ConfigException::keyIsEmpty();
        }

        parent::set($key, $value);
    }

    public function write(): void
    {
        parent::toFile($this->filePath);
    }
}

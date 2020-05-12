<?php

/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Config
 */
namespace Jtl\Connector\Core\Config;

use Jtl\Connector\Core\Exception\ConfigException;
use Noodlehaus\Config;

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
        parent::__construct($filePath);
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
        parent::toFile($this->filePath);
    }
}

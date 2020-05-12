<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Session
 */

namespace Jtl\Connector\Core\Session;

use Jtl\Connector\Core\Exception\SessionException;

class SessionHelper
{
    /**
     * @var string
     */
    protected $namespace;

    /**
     * SessionHelper constructor.
     * @param string $namespace
     * @throws SessionException
     */
    public function __construct(string $namespace = "default")
    {
        if ($namespace === "") {
            throw new SessionException("Session namespace must be a non-empty string.");
        }

        $this->namespace = $namespace;
    }

    /**
     * @param string $name
     * @param mixed $default
     * @return mixed
     */
    public function get(string $name, $default = null)
    {
        return $this->has($name) ? $_SESSION[$this->namespace][$name] : $default;
    }

    /**
     * @param string $name
     * @return boolean
     */
    public function has(string $name): bool
    {
        return isset($_SESSION[$this->namespace][$name]);
    }

    /**
     * @param string $name
     * @param $value
     * @return $this
     */
    public function set(string $name, $value): self
    {
        $_SESSION[$this->namespace][$name] = $value;
        return $this;
    }

    /**
     * @param $name
     * @param $value
     * @throws SessionException
     */
    public function __set(string $name, $value)
    {
        if ($name === "") {
            throw new SessionException("The '{$name}' key must be a non-empty string");
        }
        $this->set($name, $value);
    }

    /**
     * @param $name
     * @return mixed|null
     * @throws SessionException
     */
    public function & __get(string $name)
    {
        if ($name === "") {
            throw new SessionException("The '{$name}' key must be a non-empty string");
        }

        $value = $this->get($name);
        return $value;
    }

    /**
     * @param $name
     * @return bool
     * @throws SessionException
     */
    public function __isset(string $name)
    {
        if ($name === "") {
            throw new SessionException("The '{$name}' key must be a non-empty string");
        }

        return $this->has($name);
    }

    /**
     * @param $name
     * @throws SessionException
     */
    public function __unset(string $name)
    {
        if ($name === "") {
            throw new SessionException("The '{$name}' key must be a non-empty string");
        }

        if ($this->has($name)) {
            unset($_SESSION[$this->namespace][$name]);
        }
    }

    /**
     * @param object $object
     * @return static
     * @throws SessionException
     */
    public static function createByObjectClass(object $object): self
    {
        return new static(get_class($object));
    }
}

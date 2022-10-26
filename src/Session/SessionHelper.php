<?php

/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package   Jtl\Connector\Core\Session
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
     *
     * @param string $namespace
     *
     * @throws SessionException
     */
    public function __construct(string $namespace = 'default')
    {
        if ($namespace === '') {
            throw new SessionException('Session namespace must be a non-empty string.');
        }

        $this->namespace = $namespace;
    }

    /**
     * @param object $object
     *
     * @return static
     * @throws SessionException
     */
    public static function createByObjectClass(object $object): self
    {
        return new self(\get_class($object));
    }

    /**
     * @param string $name
     * @param mixed  $default
     *
     * @return mixed
     */
    public function get(string $name, $default = null)
    {
        return $_SESSION[$this->namespace][$name] ?? $default;
    }

    /**
     * @param $name
     *
     * @return mixed|null
     * @throws SessionException
     */
    public function & __get(string $name)
    {
        if ($name === '') {
            throw new SessionException("The '{$name}' key must be a non-empty string");
        }

        $value = &$_SESSION[$this->namespace][$name] ?? null;
        return $value;
    }

    /**
     * @param $name
     * @param $value
     *
     * @throws SessionException
     */
    public function __set(string $name, $value)
    {
        if ($name === '') {
            throw new SessionException("The '{$name}' key must be a non-empty string");
        }
        $this->set($name, $value);
    }

    /**
     * @param string $name
     * @param        $value
     *
     * @return $this
     */
    public function set(string $name, $value): self
    {
        $_SESSION[$this->namespace][$name] = $value;
        return $this;
    }

    /**
     * @param $name
     *
     * @return bool
     * @throws SessionException
     */
    public function __isset(string $name)
    {
        if ($name === '') {
            throw new SessionException("The '{$name}' key must be a non-empty string");
        }

        return $this->has($name);
    }

    /**
     * @param string $name
     *
     * @return boolean
     */
    public function has(string $name): bool
    {
        return isset($_SESSION[$this->namespace][$name]);
    }

    /**
     * @param $name
     *
     * @throws SessionException
     */
    public function __unset(string $name)
    {
        if ($name === '') {
            throw new SessionException("The '{$name}' key must be a non-empty string");
        }

        $this->unset($name);
    }

    /**
     * @param string $name
     *
     * @return SessionHelper
     */
    public function unset(string $name): self
    {
        if ($this->has($name)) {
            unset($_SESSION[$this->namespace][$name]);
        }
        return $this;
    }
}

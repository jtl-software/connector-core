<?php
/**
 * @copyright JTL-Software GmbH
 * @package jtl\Connector\Core\Model
 */

namespace jtl\Connector\Core\Model;

/**
 * Collection Class
 *
 * @access public
 */
class Collection implements \IteratorAggregate, \Countable
{
    protected $list;
    
    public function __construct(array $list = [])
    {
        $this->list = $list;
    }
    
    /**
     * @return array
     */
    public function all(): array
    {
        return $this->list;
    }
    
    /**
     * @return array
     */
    public function keys(): array
    {
        return array_keys($this->list);
    }
    
    /**
     * @param array $list
     */
    public function replace(array $list = []): void
    {
        $this->list = $list;
    }
    
    /**
     * @param array $list
     */
    public function add(array $list = []): void
    {
        $this->list = array_replace($this->list, $list);
    }
    
    /**
     * @param $key
     * @param null $default
     * @return mixed|null
     */
    public function get($key, $default = null)
    {
        return array_key_exists($key, $this->list) ? $this->list[$key] : $default;
    }
    
    /**
     * @param $key
     * @param $value
     */
    public function set(string $key, $value)
    {
        $this->list[$key] = $value;
    }
    
    /**
     * @param $key
     * @param $value
     */
    public function append(string $key, $value): void
    {
        if (!$this->has($key)) {
            $this->set($key, []);
        }
        
        if (!is_array($this->list[$key])) {
            throw new \InvalidArgumentException(sprintf('Key "%s" is not an array', $key));
        }
        
        $this->list[$key][] = $value;
    }
    
    /**
     * @param $key
     * @return bool
     */
    public function has(string $key): bool
    {
        return array_key_exists($key, $this->list);
    }
    
    /**
     * @param $key
     */
    public function remove(string $key): void
    {
        unset($this->list[$key]);
    }
    
    /**
     * @param $key
     * @param string $default
     * @param bool $deep
     * @return string|string[]|null
     */
    public function getAlpha(string $key, string $default = '', bool $deep = false)
    {
        return preg_replace('/[^[:alpha:]]/', '', $this->get($key, $default, $deep));
    }
    
    /**
     * @param $key
     * @param string $default
     * @param bool $deep
     * @return string|string[]|null
     */
    public function getAlnum(string $key, string $default = '', bool $deep = false)
    {
        return preg_replace('/[^[:alnum:]]/', '', $this->get($key, $default, $deep));
    }
    
    /**
     * @param $key
     * @param string $default
     * @param bool $deep
     * @return mixed
     */
    public function getDigits(string $key, string $default = '', bool $deep = false)
    {
        return str_replace(['-', '+'], '', $this->filter($key, $default, $deep, FILTER_SANITIZE_NUMBER_INT));
    }
    
    /**
     * @param $key
     * @param int $default
     * @param bool $deep
     * @return int
     */
    public function getInt(string $key, int $default = 0, bool $deep = false): int
    {
        return (int)$this->get($key, $default, $deep);
    }
    
    /**
     * @return \ArrayIterator|\Traversable
     */
    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->list);
    }
    
    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->list);
    }
}

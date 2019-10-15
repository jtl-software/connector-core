<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Internal
 */

namespace jtl\Connector\Model;

use InvalidArgumentException;
use stdClass;

/**
 * Statistic Model
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Internal
 */
class Statistic extends DataModel
{
    /**
     * @type int
     */
    protected $available = 0;
    
    /**
     * @type string
     */
    protected $controllerName = '';
    
    /**
     * (non-PHPdoc)
     * @param bool $toWawi
     * @param stdClass|null $obj
     * @see \jtl\Connector\Core\Model\DataModel::map()
     */
    public function map(bool $toWawi = false, stdClass $obj = null): void
    {
    
    }
    
    /**
     * @return integer
     */
    public function getAvailable(): int
    {
        return $this->available;
    }
    
    /**
     * @param integer $available
     * @return Statistic
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setAvailable(int $available): Statistic
    {
        $this->available = $available;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getControllerName(): string
    {
        return $this->controllerName;
    }
    
    /**
     * @param string $controllerName
     * @return Statistic
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setControllerName(string $controllerName): Statistic
    {
        $this->controllerName = $controllerName;
        
        return $this;
    }
}

<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Application
 */

namespace jtl\Connector\Checksum;

use jtl\Connector\Model\Identity;

interface IChecksum
{
    /**
     * @param Identity $foreignKey
     * @return self
     */
    public function setForeignKey(Identity $foreignKey);
    
    /**
     * @return Identity
     */
    public function getForeignKey(): Identity;
    
    /**
     * @param string $endpoint
     * @return self
     */
    public function setEndpoint(string $endpoint);
    
    /**
     * @return string
     */
    public function getEndpoint(): string;
    
    /**
     * @param string $host
     * @return self
     */
    public function setHost(string $host);
    
    /**
     * @return string
     */
    public function getHost(): string;
    
    /**
     * @param int $type
     * @return self
     */
    public function setType(int $type);
    
    /**
     * @return int
     */
    public function getType(): int;
    
    /**
     * @param boolean $hasChanged
     * @return self
     */
    public function setHasChanged(bool $hasChanged);
    
    /**
     * @return boolean
     */
    public function hasChanged(): bool;
}

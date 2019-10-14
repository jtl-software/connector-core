<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Mapper
 */

namespace jtl\Connector\Mapper;

interface IPrimaryKeyMapper
{
    /**
     * Host ID getter
     *
     * @param string $endpointId
     * @param integer $type
     * @return integer|null
     */
    public function getHostId(string $endpointId, int $type): int;
    
    /**
     * Endpoint ID getter
     *
     * @param integer $hostId
     * @param integer $type
     * @param string $relationType
     * @return string|null
     */
    public function getEndpointId(int $hostId, int $type, string $relationType = null): string;
    
    /**
     * Save link to database
     *
     * @param string $endpointId
     * @param integer $hostId
     * @param integer $type
     * @return boolean
     */
    public function save(string $endpointId, int $hostId, int $type): bool;
    
    //public function update($endpointId = null, $hostId = null, $type);
    
    /**
     * Delete link from database
     *
     * @param string $endpointId
     * @param integer $hostId
     * @param integer $type
     * @return boolean
     */
    public function delete(string $endpointId = null, int $hostId = null, int $type): bool;
    
    /**
     * Clears the entire link table
     *
     * @return boolean
     */
    public function clear(): bool;
    
    /**
     * Garbage Collect the entire link table
     *
     * @return boolean
     */
    public function gc(): bool;
}

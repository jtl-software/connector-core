<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Mapper
 */
namespace Jtl\Connector\Core\Mapper;

interface IPrimaryKeyMapper
{
    /**
     * Host ID getter
     *
     * @param integer $type
     * @param string $endpointId
     * @return integer|null
     */
    public function getHostId(int $type, string $endpointId): ?int;

    /**
     * Endpoint ID getter
     *
     * @param integer $type
     * @param integer $hostId
     * @param string $relationType
     * @return string|null
     */
    public function getEndpointId(int $type, int $hostId, string $relationType = null): ?string;

    /**
     * Save link to database
     *
     * @param integer $type
     * @param string $endpointId
     * @param integer $hostId
     * @return boolean
     */
    public function save(int $type, string $endpointId, int $hostId): bool;

    /**
     * Delete link from database
     *
     * @param integer $type
     * @param string $endpointId
     * @param integer $hostId
     * @return boolean
     */
    public function delete(int $type, string $endpointId = null, int $hostId = null): bool;
    
    /**
     * Clears the entire link table
     *
     * @param integer|null $type
     * @return boolean
     */
    public function clear(int $type = null): bool;
}

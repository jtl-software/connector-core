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
     * @param integer $type
     * @param string $endpointId
     * @return integer|null
     */
    public function getHostId($type, $endpointId);

    /**
     * Endpoint ID getter
     *
     * @param integer $type
     * @param integer $hostId
     * @param string $relationType
     * @return string|null
     */
    public function getEndpointId($type, $hostId, $relationType = null);

    /**
     * Save link to database
     *
     * @param integer $type
     * @param string $endpointId
     * @param integer $hostId
     * @return boolean
     */
    public function save($type, $endpointId, $hostId);

    /**
     * Delete link from database
     *
     * @param integer $type
     * @param string $endpointId
     * @param integer $hostId
     * @return boolean
     */
    public function delete($type, $endpointId = null, $hostId = null);
    
    /**
     * Clears the entire link table
     *
     * @param null $type
     * @return boolean
     */
    public function clear($type = null);
}

<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Mapper
 */
namespace jtl\Connector\Mapper;

interface IPrimaryKeyMapper
{
    public function getHostId($endpointId, $type);
    public function getEndpointId($hostId, $type);
    public function save($endpointId, $hostId, $type);
    //public function update($endpointId = null, $hostId = null, $type);
    public function delete($endpointId = null, $hostId = null, $type);
}

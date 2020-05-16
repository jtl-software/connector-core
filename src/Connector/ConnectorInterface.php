<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */
namespace Jtl\Connector\Core\Connector;

use DI\Container;
use Jtl\Connector\Core\Authentication\TokenValidatorInterface;
use Jtl\Connector\Core\Mapper\PrimaryKeyMapperInterface;
use Noodlehaus\ConfigInterface;

interface ConnectorInterface
{
    /**
     * @param Container $container
     * @param ConfigInterface $config
     */
    public function initialize(Container $container, ConfigInterface $config): void;
    
    /**
     * @return PrimaryKeyMapperInterface
     */
    public function getPrimaryKeyMapper(): PrimaryKeyMapperInterface;

    /**
     * @return TokenValidatorInterface
     */
    public function getTokenValidator(): TokenValidatorInterface;

    /**
     * @return string
     */
    public function getControllerNamespace(): string;

    /**
     * @return string
     */
    public function getEndpointVersion(): string;

    /**
     * @return string
     */
    public function getPlatformVersion(): string;

    /**
     * @return string
     */
    public function getPlatformName(): string;
}

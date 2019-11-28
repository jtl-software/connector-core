<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Base
 */
namespace Jtl\Connector\Core\Connector;

use Jtl\Connector\Core\Application\Application;
use Jtl\Connector\Core\Application\Request;
use Jtl\Connector\Core\Application\Response;
use Jtl\Connector\Core\Authentication\TokenValidatorInterface;
use Jtl\Connector\Core\Mapper\PrimaryKeyMapperInterface;

/**
 * Base Connector
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
class CoreConnector implements ConnectorInterface
{
    /**
     * @var PrimaryKeyMapperInterface
     */
    protected $primaryKeyMapper;

    /**
     * @var TokenValidatorInterface
     */
    protected $tokenValidator;

    /**
     * @var string
     */
    protected $controllerNamespace = 'Jtl\Connector\Core\Controller';

    /**
     * CoreConnector constructor.
     * @param PrimaryKeyMapperInterface $primaryKeyMapper
     * @param TokenValidatorInterface $tokenValidator
     */
    public function __construct(PrimaryKeyMapperInterface $primaryKeyMapper, TokenValidatorInterface $tokenValidator)
    {
        $this->primaryKeyMapper = $primaryKeyMapper;
        $this->tokenValidator = $tokenValidator;
    }


    public function initialize(Application $application)
    {
    }

    /**
     * Returns primary key mapper
     *
     * @return PrimaryKeyMapperInterface
     */
    public function getPrimaryKeyMapper(): PrimaryKeyMapperInterface
    {
        return $this->primaryKeyMapper;
    }

    /**
     * @return TokenValidatorInterface
     */
    public function getTokenValidator(): TokenValidatorInterface
    {
        return $this->tokenValidator;
    }

    /**
     * @return string
     */
    public function getControllerNamespace(): string
    {
        return $this->controllerNamespace;
    }
}

<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Controller
 */

namespace Jtl\Connector\Core\Controller;

use Jtl\Connector\Core\Application\Application;

/**
 * Base Controller Class
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
abstract class AbstractController
{
    /**
     * @var Application
     */
    protected $application;

    /**
     * AbstractController constructor.
     * @param Application $application
     */
    public function __construct(Application $application)
    {
        $this->application = $application;
        $this->init();
    }

    protected function init()
    {
    }
}

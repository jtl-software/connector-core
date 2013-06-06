<?php

/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Feature
 */

namespace jtl\Connector\Feature;

use jtl\Connector\Feature\Base\Base as BaseClass;
use jtl\Connector\Feature\Exception\Manager as ExceptionManager;
use jtl\Connector\Feature\Producer;
use jtl\Connector\Feature\Importer\IImporter;
use jtl\Connector\Feature\Exporter\IExporter;

/**
 * Manager class for managing features inside of the connector.
 *
 * @access public
 * @author David Spickers <david.spickers@jtl-software.de>
 */
final class Manager extends BaseClass
{

    protected $_namespace = '';
    protected $_methods; //= array('pull', 'push');
    protected $_parameters; // = array('supported' => true, 'comment' => true);
    protected $_producer;

    public function __construct(Producer $producer = null)
    {
        if (empty($producer)) {
            $producer = new Producer();
        }
        $producer->setManager($this);
        $this->_producer = $producer;
        parent::__construct('Manager');
    }

    public function setProducer(Producer $producer)
    {
        $producer->setManager($this);
        $this->_producer = $producer;
    }

    public function getProducer()
    {
        return $this->_producer;
    }

    public function getParameters()
    {
        return $this->_parameters;
    }

    public function registerParameter($name)
    {
        if ($this->existsParameter($name)) {
            throw new ExceptionManager(sprintf('The parameter "%s" is already registered', $name));
        }
        $this->_parameters[$name] = true;
    }

    public function registerParameters(array $parameters)
    {
        foreach ($parameters as $key => $value) {
            $this->registerParameter($value);
        }
    }

    protected function existsParameter($name)
    {
        return (isset($this->_parameters) && array_key_exists($name, $this->_parameters));
    }

    public function getMethods()
    {
        return $this->_methods;
    }

    public function registerMethod($name)
    {
        if ($this->existsMethod($name)) {
            throw new ExceptionManager(sprintf('The method "%s" is already registered', $name));
        }
        $this->_methods[$name] = true;
    }

    public function registerMethods(array $methods)
    {
        foreach ($methods as $key => $value) {
            $this->registerMethod($value);
        }
    }

    protected function existsMethod($name)
    {
        return (isset($this->_methods) && array_key_exists($name, $this->_methods));
    }

    public function import(IImporter $importer)
    {
        if (empty($this->_producer)) {
            throw new ExceptionManager('Import not possible, producer missing!');
        }
        return $this->_producer->import($importer);
    }

    public function export(IWriter $writer)
    {
        if (empty($this->_producer)) {
            throw new ExceptionManager('Export not possible, producer missing!');
        }
        return $this->_producer->export($writer);
    }

    public function transform(IImporter $from, IWriter $to)
    {
        return $this->_producer->transform($from, $to);
    }

}
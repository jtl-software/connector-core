<?php

namespace jtl\Connector\Feature\Feature;

use jtl\Connector\Feature\Feature\IFeature;
use jtl\Connector\Feature\Exception\Method as ExceptionMethod;
use jtl\Connector\Feature\Base\Base as BaseClass;
use jtl\Connector\Feature\Method\IMethod;

abstract class Base extends BaseClass implements IFeature
{

    protected $_methods;

    public function addMethod(IMethod $method)
    {
        if ($this->existsMethod($method->getName())) {
            throw new ExceptionMethod(sprintf('The method "%s" is already added to feature "%s"', $method->getName(), $this->_name));
        }
        $this->_methods[$method->getName()] = $method;
    }

    public function delMethod($name)
    {
        if ($this->existsMethod($name)) {
            throw new ExceptionMethod(sprintf('The method "%s" doesn\'t exist in feature "%s"', $name, $this->_name));
        }
        unset($this->_methods[$name]);
    }

    public function existsMethod($name)
    {
        return isset($this->_methods) && array_key_exists($name, $this->_methods);
    }

    public function getMethod($name)
    {
        return $this->_methods[$name];
    }

}
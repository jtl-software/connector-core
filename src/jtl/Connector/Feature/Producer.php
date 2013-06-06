<?php

namespace jtl\Connector\Feature;

use jtl\Connector\Feature\Importer\IImporter;
use jtl\Connector\Feature\Exception\Producer as ExceptionProducer;
use jtl\Connector\Feature\Manager;
use jtl\Connector\Feature\Feature\Feature;
use jtl\Connector\Feature\Group\Image as GroupImage;
use jtl\Connector\Feature\Group\Standard as GroupStandard;

class Producer
{

    const FEATURES_KEY = 'features';

    protected $_importer;
    protected $_importer_data;
    protected $_features;
    protected $_active_group;
    protected $_groups;
    protected $_methods;
    protected $_parameters;
    protected $_methods_cmp_str;
    protected $_parameters_cmp_str;
    protected $_layers;
    protected $_manager;

    public function __construct(Manager $manager = null)
    {
        $this->_manager = $manager;
    }

    public function setManager(Manager $manager)
    {
        $this->_manager = $manager;
    }

    public function getManager()
    {
        return $this->_manager;
    }

    public function getGroups()
    {
        return $this->_groups;
    }

    public function getFeatures()
    {
        return $this->_features;
    }

    public function getMethods()
    {
        return $this->_methods;
    }

    public function import(IImporter $importer)
    {
        $this->_importer = $importer;
        return $this->parse();
    }

    public function export(IWriter $writer)
    {
        return $writer->load(array(
            self::FEATURES_KEY => $this->_importer_data
        ));
    }

    public function transform(IImporter $from, IWriter $to)
    {
        $this->import($from);
        $this->export($to);
    }

    protected function validate()
    {
        $datas = $this->_importer->dump();
        if (empty($datas)) {
            throw new ExceptionProducer(sprintf('The importer "%s" is unable to serve your request', $this->_importer->getName()));
        }
        if (!is_array($datas)) {
            throw new ExceptionProducer(sprintf('The importer "%s" served invalid datas: %s ', $this->_importer->getName(), var_export($datas, true)));
        }
        if (!array_key_exists(self::FEATURES_KEY, $datas)) {
            throw new ExceptionProducer(sprintf('Can\'t find "%s" as a key for your datas', self::FEATURES_KEY));
        }
        $this->_importer_data = $datas[self::FEATURES_KEY];
    }

    protected function parse()
    {
        $this->validate();
        $this->extractLayers();
    }

    protected function extractLayers()
    {
        $methods = $this->_manager->getMethods();
        if (empty($methods)) {
            throw new ExceptionProducer('Unable to extract layers, methods missing!');
        }
        $this->_methods = array_keys($methods);
        asort($this->_methods);
        $this->_methods_cmp_str = implode(':', $this->_methods);

        $parameters = $this->_manager->getParameters();
        if (empty($parameters)) {
            throw new ExceptionProducer('Unable to extract layers, parameters missing!');
        }
        $this->_parameters = $parameters;
        asort($this->_parameters);
        $this->_parameters_cmp_str = implode(':', $this->_parameters);

        asort($this->_importer_data);
        foreach ($this->_importer_data as $key => &$value) {
            $this->extractLayer($key, $value);
        }
    }

    protected function extractLayer($key, $layer, $nested = 0)
    {
        $nested++;
        if (is_array($layer)) {
            $n_keys = array_keys($layer);
            asort($n_keys);
            if (implode(':', $n_keys) == $this->_methods_cmp_str) { //Feature
                return $this->addFeature($key, $layer);
            }
            else { //Group
                $this->addGroup($key, $layer);
                foreach ($layer as $key => $value) {
                    $this->extractLayer($key, $value, $nested);
                }
            }
        }
    }

    protected function addFeature($name, array $methods)
    {
        $feature = new Feature($name);
        foreach ($methods as $method => $parameters) {
            $feature->addMethod($this->createMethod($method, $parameters));
        }
        $this->_features[] = $feature;
        return $feature;
    }

    protected function addGroup($name, $value)
    {
        $class = '\\jtl\\Connector\\Feature\\Group\\' . ucfirst(strtolower($name));
        if (class_exists($class)) {
            $group = new $class($value);
            $this->_active_group[] = $group;
            $this->_groups[] = $group;
        }
        else {
            $group = new GroupStandard($name);
            $this->_active_group[] = $group;
            $this->_groups[] = $group;
        }
        return $this->_active_group;
    }

    protected function createMethod($method, array $params)
    {
        $class = '\\jtl\\Connector\\Feature\\Method\\' . ucfirst(strtolower($method));
        if (!class_exists($class)) {
            throw new ExceptionProducer(sprintf('The method "%s" doesn\'t exist', $method));
        }
        $obj = new $class($method);
        foreach ($params as $name => $value) {
            $setter = 'set' . ucfirst(strtolower($name));
            if (!method_exists($obj, $setter)) {
                throw new ExceptionProducer(sprintf('The method "%s" doesn\'t exist in class "%s"', $setter, $method));
            }
            call_user_method($setter, $obj, $value);
        }
        return $obj;
    }

}
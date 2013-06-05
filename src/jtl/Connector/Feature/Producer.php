<?php

namespace jtl\Connector\Feature;

use jtl\Connector\Feature\Importer\IImporter;
use jtl\Connector\Feature\Exception\Producer as ExceptionProducer;

class Producer
{

    const FEATURES_KEY = 'features';
    const TYPE_FEATURE = 1;
    const TYPE_GROUP = 2;

    protected $_importer;
    protected $_importer_data;
    protected $_features;
    protected $_groups;
    protected $_methods;
    protected $_layers;

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
        foreach ($this->_importer_data as $key => $value) {
            $this->extractLayer($key, $value);
        }
    }

    protected function extractLayer($key, $layer)
    {
        if (is_array($layer)) {
            $next_key = key($layer);
            $next_values = $layer[$next_key];
            var_dump($next_key);
            var_dump($next_values);
            
            die();

            if (key($layer))
            $m = array(
              array('pull', 'push'), 
              array('pull', 'push')
            );
            $p = array(
              array('supported', 'comment'),
              array('comment', 'comment')
            );
            $k = array_keys($layer);
            
            var_dump($layer);
            
            $is_feature = $m[0] == $k || $m[1] == $k;
            $is_method = $p[0] == $k || $p[1] == $k;
            $is_parameter = !$is_feature && !$is_method;
            
            $is_feature = $m[0] == $k || $m[1] == $k;
            $is_parameter = $p[0] == $k || $p[1] == $k;
            
            var_dump($m);
            var_dump($k);
            var_dump($m == $k);
            if (true)
            {
                var_dump($k);
                die('method');
            } else if ($p == $k)
            {
                die('parameter');
            } else
            {
                die('group');
            }
            $this->_layers[] = $layer;
        } 
        
        var_dump($key);
        var_dump($layer);
        die();
    }

}
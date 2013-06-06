<?php

namespace jtl\Connector\Feature\Feature;

use jtl\Connector\Feature\Feature\IFeature;
use jtl\Connector\Feature\Exception\FeatureExist as ExceptionFeatureExist;
use jtl\Connector\Feature\Base as BaseClass;

abstract class Base extends BaseClass implements IFeature
{

    protected $_name;
    protected $_comment;
    protected $_relations = array();

    public function __construct($name)
    {
        parent::__constructor($name);
    }

    public function addRelation($feature = '')
    {
        if ($this->existsRelation($feature)) {
            throw new FeatureExistException($feature);
        }
    }

    public function setRelations(array $features)
    {
        foreach ($features as $feature) {
            $this->addRelation($feature);
        }
    }

    protected function existsRelation($name)
    {
        return (isset($this->_relations) && array_key_exists($name, $this->_relations));
    }

    public function getRelation($name)
    {
//        return $this->_relationsTypes;
    }

}
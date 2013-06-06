<?php

namespace jtl\Connector\Feature\Group;

use jtl\Connector\Feature\Group\IGroup;
use jtl\Connector\Feature\Group\Base as BaseGroup;

class Image extends BaseGroup
{

    protected $_relation_types;

    public function __construct(array &$params)
    {
        if (array_key_exists('relationTypes', $params)) {
            $this->_relation_types = $params['relationTypes'];
            unset($params['relationTypes']);
        }
        parent::__construct('Image');
    }

    public function getRelations()
    {
        return $this->_relation_types;
    }

}
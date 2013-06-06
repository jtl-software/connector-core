<?php

namespace jtl\Connector\Feature\Group;

use jtl\Connector\Feature\Group\IGroup;
use jtl\Connector\Feature\Base\Base as BaseClass;

abstract class Base extends BaseClass implements IGroup
{

    protected $_children;

    public function addChildren($children)
    {
        $this->_children[] = $children;
    }

    public function getChildren()
    {
        return $this->_children;
    }

}
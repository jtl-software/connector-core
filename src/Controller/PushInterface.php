<?php
/**
 * @copyright 2010-2019 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */

namespace Jtl\Connector\Core\Controller;

use Jtl\Connector\Core\Model\AbstractDataModel;

interface PushInterface
{
    /**
     * Insert or update
     *
     * @param AbstractDataModel $model
     * @return AbstractDataModel
     */
    public function push(AbstractDataModel $model) : AbstractDataModel;
}

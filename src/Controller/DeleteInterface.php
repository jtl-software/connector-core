<?php

/**
 * @copyright 2010-2019 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */

namespace Jtl\Connector\Core\Controller;

use Jtl\Connector\Core\Model\AbstractModel;

interface DeleteInterface
{
    /**
     * Delete
     *
     * @param AbstractModel $model
     * @return AbstractModel
     */
    public function delete(AbstractModel $model): AbstractModel;
}

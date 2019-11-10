<?php
/**
 * @copyright 2010-2019 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */

namespace Jtl\Connector\Core\Controller;

use Jtl\Connector\Core\Model\AbstractDataModel;

interface DeleteInterface
{
    /**
     * Delete
     *
     * @param AbstractDataModel $model
     * @return AbstractDataModel
     */
    public function delete(AbstractDataModel $model): AbstractDataModel;
}
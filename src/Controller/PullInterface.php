<?php
/**
 * @copyright 2010-2019 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */

namespace Jtl\Connector\Core\Controller;

use Jtl\Connector\Core\Model\AbstractDataModel;
use Jtl\Connector\Core\Model\QueryFilter;

interface PullInterface
{
    /**
     * Select
     *
     * @param QueryFilter $queryFilter
     * @return AbstractDataModel[]
     */
    public function pull(QueryFilter $queryFilter): array;
}

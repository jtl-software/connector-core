<?php

/**
 * @copyright 2010-2019 JTL-Software GmbH
 * @package   Jtl\Connector\Core\Application
 */

namespace Jtl\Connector\Core\Controller;

use Jtl\Connector\Core\Model\QueryFilter;

interface StatisticInterface
{
    /**
     * Statistic
     *
     * @param QueryFilter $queryFilter
     *
     * @return int
     */
    public function statistic(QueryFilter $queryFilter): int;
}

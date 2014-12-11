<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Core\Controller
 */

namespace jtl\Connector\Core\Controller;

use \jtl\Connector\Core\Model\QueryFilter;
use \jtl\Connector\Core\Model\DataModel;

/**
 * Controller Interface
 */
Interface IController
{
    /**
     * Insert or update
     *
     * @param \jtl\Connector\Core\Model\DataModel $model
     * @return \jtl\Connector\Result\Action
     */
    public function push(DataModel $model);
    
    /**
     * Select
     *
     * @param \jtl\Connector\Core\Model\QueryFilter $queryFilter
     * @return \jtl\Connector\Result\Action
     */
    public function pull(QueryFilter $queryFilter);

    /**
     * Statistic
     *
     * @param \jtl\Connector\Core\Model\QueryFilter $queryFilter
     * @return \jtl\Connector\Result\Action
     */
    public function statistic(QueryFilter $queryFilter);
}
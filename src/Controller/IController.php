<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Controller
 */
namespace jtl\Connector\Controller;

use jtl\Connector\Model\QueryFilter;
use jtl\Connector\Model\DataModel;

/**
 * Controller Interface
 */
interface IController
{
    /**
     * Insert or update
     *
     * @param \jtl\Connector\Model\DataModel $model
     * @return \jtl\Connector\Result\Action
     */
    public function push(DataModel $model);
    
    /**
     * Select
     *
     * @param \jtl\Connector\Model\QueryFilter $queryFilter
     * @return \jtl\Connector\Result\Action
     */
    public function pull(QueryFilter $queryFilter);

    /**
     * Delete
     *
     * @param \jtl\Connector\Model\DataModel $model
     * @return \jtl\Connector\Result\Action
     */
    public function delete(DataModel $model);

    /**
     * Statistic
     *
     * @param \jtl\Connector\Model\QueryFilter $queryFilter
     * @return \jtl\Connector\Result\Action
     */
    public function statistic(QueryFilter $queryFilter);
}

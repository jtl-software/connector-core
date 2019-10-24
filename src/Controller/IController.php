<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Controller
 */
namespace Jtl\Connector\Core\Controller;

use Jtl\Connector\Core\Model\QueryFilter;
use Jtl\Connector\Core\Model\DataModel;

/**
 * Controller Interface
 */
interface IController
{
    /**
     * Insert or update
     *
     * @param \Jtl\Connector\Core\Model\DataModel $model
     * @return \Jtl\Connector\Core\Result\Action
     */
    public function push(DataModel $model);
    
    /**
     * Select
     *
     * @param \Jtl\Connector\Core\Model\QueryFilter $queryFilter
     * @return \Jtl\Connector\Core\Result\Action
     */
    public function pull(QueryFilter $queryFilter);

    /**
     * Delete
     *
     * @param \Jtl\Connector\Core\Model\DataModel $model
     * @return \Jtl\Connector\Core\Result\Action
     */
    public function delete(DataModel $model);

    /**
     * Statistic
     *
     * @param \Jtl\Connector\Core\Model\QueryFilter $queryFilter
     * @return \Jtl\Connector\Core\Result\Action
     */
    public function statistic(QueryFilter $queryFilter);
}

<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Result;

/**
 * Result Model
 * Transaction result object
 *
 * @access public
 */
final class Transaction extends \jtl\Core\Result\Transaction
{
    /**
     * @var \jtl\Connector\Model\Identity
     */
    protected $id = null;

    /**
     * @return \jtl\Connector\Model\Identity
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param \jtl\Connector\Model\Identity $id
     * @return \jtl\Connector\Result\Transaction
     */
    public function setId(\jtl\Connector\Model\Identity $id)
    {
        $this->id = $id;
        return $this;
    }
}
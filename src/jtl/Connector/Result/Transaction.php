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
     * @var string Unique connector id
     */
    protected $id = '';
    
    /**
     * @var string Unique host id
     */
    protected $hostId = '';

    /**
     * @return string Unique connector id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id Unique connector id
     * @return \jtl\Connector\Result\Transaction
     */
    public function setId($id)
    {
        $this->id = (string)$id;
        return $this;
    }

    /**
     * @return string Unique host id
     */
    public function getHostId()
    {
        return $this->hostId;
    }

    /**
     * @param string $hostId Unique host id
     * @return \jtl\Connector\Result\Transaction
     */
    public function setHostId($hostId)
    {
        $this->hostId = (string)$hostId;
        return $this;
    }
}
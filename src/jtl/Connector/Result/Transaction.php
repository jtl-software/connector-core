<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Result;

use \jtl\Core\Exception\ModelException;

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
    protected $_id = null;

    /**
     * @return \jtl\Connector\Model\Identity
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param \jtl\Connector\Model\Identity $id
     * @return \jtl\Connector\Result\Transaction
     */
    public function setId(\jtl\Connector\Model\Identity $id)
    {
        $this->_id = $id;
        return $this;
    }

    /**
     * Magic Member Getter
     *
     * @param string $name
     * @return mixed
     * @throws \jtl\Core\Exception\ModelException
     */
    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $name == '_id' ? $this->$name->getEndpoint() : $this->$name;
        }

        throw new ModelException("Class (" . get_called_class() . ") does not have the member ({$name})");
    }
}
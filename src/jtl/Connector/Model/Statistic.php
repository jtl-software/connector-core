<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * Statistic Model
 * @access public
 * @package jtl\Connector\Model
 */
class Statistic extends DataModel
{
    /**
     * @var int
     */
    protected $_available;

    /**
     * @var int
     */
    protected $_pending;

    /**
     * @var string
     */
    protected $_controllerName;

    /**
     * Statistic Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if ($value === null) {
            $this->$name = null;
            return;
        }

        switch ($name) {
            case "_available":
            case "_pending":
            
                $this->$name = (int)$value;
                break;

            case "_controllerName":

                $this->$name = $value;
                break;
        }
    }

    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}
?>
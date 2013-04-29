<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;

abstract class Product extends Model
{
    protected $_id;
    protected $_name;
    
    abstract function setId($id);
    abstract function getId();
    abstract function setName($name);
    abstract function getName();
    abstract function convert(\stdClass $obj);
}
?>
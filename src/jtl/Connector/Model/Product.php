<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\ValidationException;
use \jtl\Core\Exception\SchemaException;
use \jtl\Core\Validator\Schema;

/**
 * Product Model
 * @access public
 */
abstract class Product extends Model
{
    /**
     * @var int
     */
    protected $_id = 0;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @var string
     */
    protected $_sku;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\Product
     */
    public function setId($id)
    {
        $this->_id = (int)$id;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param string $name
     * @return \jtl\Connector\Model\Product
     */
    public function setName($name)
    {
        $this->_name = substr($name, 0, 255);
        return $this;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }
    
    /**
     * @param string $sku
     * @return \jtl\Connector\Model\Product
     */
    public function setSku($sku)
    {
        $this->_sku = substr($sku, 0, 255);
        return $this;
    }
    
    /**
     * @return string
     */
    public function getSku()
    {
        return $this->_sku;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        try {
            Schema::validateAction(CONNECTOR_DIR . "schema/product/product.json", $this->getPublic(array()));
        }
        catch (ValidationException $exc) {
            throw new SchemaException($exc->getMessage());
        }
    }
}
?>
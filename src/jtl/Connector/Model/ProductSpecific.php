<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * ProductSpecific Model
 * @access public
 */
abstract class ProductSpecific extends Model
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var int
     */
    protected $_specificValueId;
    
    /**
     * @var int
     */
    protected $_productId;
    
    /**
     * @param int $id
     * @return \jtl\Connector\Model\ProductSpecific
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
     * @param int $specificValueId
     * @return \jtl\Connector\Model\ProductSpecific
     */
    public function setSpecificValueId($specificValueId)
    {
        $this->_specificValueId = (int)$specificValueId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getSpecificValueId()
    {
        return $this->_specificValueId;
    }
    
    /**
     * @param int $productId
     * @return \jtl\Connector\Model\ProductSpecific
     */
    public function setProductId($productId)
    {
        $this->_productId = (int)$productId;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getProductId()
    {
        return $this->_productId;
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\Model::validate()
     */
    public function validate()
    {
        Schema::validateModel(CONNECTOR_DIR . "schema/ProductSpecific/ProductSpecific.json", $this->getPublic(array()));
    }
}
?>
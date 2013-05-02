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
     * @var 
     */
    protected $_id;
    
    /**
     * @var 
     */
    protected $_specificValueId;
    
    /**
     * @var 
     */
    protected $_productId;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\ProductSpecific
     */
    public function setId($id)
    {
        $this->_id = ()$id;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getId()
    {
        return $this->_id;
    }
    
    /**
     * @param  $specificValueId
     * @return \jtl\Connector\Model\ProductSpecific
     */
    public function setSpecificValueId($specificValueId)
    {
        $this->_specificValueId = ()$specificValueId;
        return $this;
    }
    
    /**
     * @return 
     */
    public function getSpecificValueId()
    {
        return $this->_specificValueId;
    }
    
    /**
     * @param  $productId
     * @return \jtl\Connector\Model\ProductSpecific
     */
    public function setProductId($productId)
    {
        $this->_productId = ()$productId;
        return $this;
    }
    
    /**
     * @return 
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
<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\Model;
use \jtl\Core\Validator\Schema;

/**
 * CrossSelling Model
 * @access public
 */
abstract class CrossSelling extends Model
{
    /**
     * @var 
     */
    protected $_id;
    
    /**
     * @var string
     */
    protected $_crossSellingProductId;
    
    /**
     * @var string
     */
    protected $_crossSellingGroupId;
    
    /**
     * @var 
     */
    protected $_productId;
    
    /**
     * @param  $id
     * @return \jtl\Connector\Model\CrossSelling
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
     * @param string $crossSellingProductId
     * @return \jtl\Connector\Model\CrossSelling
     */
    public function setCrossSellingProductId($crossSellingProductId)
    {
        $this->_crossSellingProductId = (string)$crossSellingProductId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCrossSellingProductId()
    {
        return $this->_crossSellingProductId;
    }
    
    /**
     * @param string $crossSellingGroupId
     * @return \jtl\Connector\Model\CrossSelling
     */
    public function setCrossSellingGroupId($crossSellingGroupId)
    {
        $this->_crossSellingGroupId = (string)$crossSellingGroupId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getCrossSellingGroupId()
    {
        return $this->_crossSellingGroupId;
    }
    
    /**
     * @param  $productId
     * @return \jtl\Connector\Model\CrossSelling
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
        Schema::validateModel(CONNECTOR_DIR . "schema/CrossSelling/CrossSelling.json", $this->getPublic(array()));
    }
}
?>
<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class ProductPriceOld extends DataModel
{
    /**
     * @type Identity 
     */
    public $_customerGroupId = null;

    /**
     * @type Identity 
     */
    public $_productId = null;

    /**
     * @type integer 
     */
    public $_connectorId = 0;

    /**
     * @type float|null 
     */
    public $_netPercent1 = 0.0;

    /**
     * @type float|null 
     */
    public $_netPercent2 = 0.0;

    /**
     * @type float|null 
     */
    public $_netPercent3 = 0.0;

    /**
     * @type float|null 
     */
    public $_netPercent4 = 0.0;

    /**
     * @type float|null 
     */
    public $_netPercent5 = 0.0;

    /**
     * @type float 
     */
    public $_netPrice = 0.0;

    /**
     * @type float 
     */
    public $_netPrice1 = 0.0;

    /**
     * @type float 
     */
    public $_netPrice2 = 0.0;

    /**
     * @type float 
     */
    public $_netPrice3 = 0.0;

    /**
     * @type float 
     */
    public $_netPrice4 = 0.0;

    /**
     * @type float 
     */
    public $_netPrice5 = 0.0;

    /**
     * @type float|null 
     */
    public $_percent = 0.0;

    /**
     * @type integer|null 
     */
    public $_quantity1 = 0;

    /**
     * @type integer|null 
     */
    public $_quantity2 = 0;

    /**
     * @type integer|null 
     */
    public $_quantity3 = 0;

    /**
     * @type integer|null 
     */
    public $_quantity4 = 0;

    /**
     * @type integer|null 
     */
    public $_quantity5 = 0;


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_customerGroupId',
        '_productId',
    );

    /**
     * @type array list of navigations
     */
    public $_navigations = array(
    );

    /**
     * @return array 
     */
    public function getIdentities()
    {
        return $this->_identities;
    }

    /**
     * @return array 
     */
    public function getNavigations()
    {
        return $this->_navigations;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function setProperty($name, $value, $type)
    {
        if (!$this->validateType($value, $type)) {
            throw new InvalidArgumentException(sprintf("expected type %s, given value %s.", $type, gettype($value)));
        }
        $this->{$name} = $value;
        return $this;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function validateType($value, $type)
    {
        switch ($type)
        {
            case 'boolean':
                return is_bool($value);
            case 'integer':
                return is_integer($value);
            case 'float':
                return is_float($value);
            case 'string':
                return is_string($value);
            case 'array':
                return is_array($value);
            default:
                throw new InvalidArgumentException('type validator not found');
        }
    }

    /**
     * @param  integer $connectorId 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setConnectorId($connectorId)
    {
        return $this->setProperty('_connectorId', $connectorId, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getConnectorId()
    {
        return $this->_connectorId;
    }

    /**
     * @param  integer $quantity1 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setQuantity1($quantity1)
    {
        return $this->setProperty('_quantity1', $quantity1, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getQuantity1()
    {
        return $this->_quantity1;
    }

    /**
     * @param  integer $quantity2 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setQuantity2($quantity2)
    {
        return $this->setProperty('_quantity2', $quantity2, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getQuantity2()
    {
        return $this->_quantity2;
    }

    /**
     * @param  integer $quantity3 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setQuantity3($quantity3)
    {
        return $this->setProperty('_quantity3', $quantity3, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getQuantity3()
    {
        return $this->_quantity3;
    }

    /**
     * @param  integer $quantity4 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setQuantity4($quantity4)
    {
        return $this->setProperty('_quantity4', $quantity4, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getQuantity4()
    {
        return $this->_quantity4;
    }

    /**
     * @param  integer $quantity5 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setQuantity5($quantity5)
    {
        return $this->setProperty('_quantity5', $quantity5, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getQuantity5()
    {
        return $this->_quantity5;
    }

    /**
     * @param  float $percent 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setPercent($percent)
    {
        return $this->setProperty('_percent', $percent, 'float');
    }
    
    /**
     * @return float 
     */
    public function getPercent()
    {
        return $this->_percent;
    }

    /**
     * @param  float $netPercent1 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setNetPercent1($netPercent1)
    {
        return $this->setProperty('_netPercent1', $netPercent1, 'float');
    }
    
    /**
     * @return float 
     */
    public function getNetPercent1()
    {
        return $this->_netPercent1;
    }

    /**
     * @param  float $netPercent2 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setNetPercent2($netPercent2)
    {
        return $this->setProperty('_netPercent2', $netPercent2, 'float');
    }
    
    /**
     * @return float 
     */
    public function getNetPercent2()
    {
        return $this->_netPercent2;
    }

    /**
     * @param  float $netPercent3 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setNetPercent3($netPercent3)
    {
        return $this->setProperty('_netPercent3', $netPercent3, 'float');
    }
    
    /**
     * @return float 
     */
    public function getNetPercent3()
    {
        return $this->_netPercent3;
    }

    /**
     * @param  float $netPercent4 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setNetPercent4($netPercent4)
    {
        return $this->setProperty('_netPercent4', $netPercent4, 'float');
    }
    
    /**
     * @return float 
     */
    public function getNetPercent4()
    {
        return $this->_netPercent4;
    }

    /**
     * @param  float $netPercent5 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setNetPercent5($netPercent5)
    {
        return $this->setProperty('_netPercent5', $netPercent5, 'float');
    }
    
    /**
     * @return float 
     */
    public function getNetPercent5()
    {
        return $this->_netPercent5;
    }

    /**
     * @param  Identity $customerGroupId 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerGroupId(Identity $customerGroupId)
    {
        return $this->setProperty('_customerGroupId', $customerGroupId, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getCustomerGroupId()
    {
        return $this->_customerGroupId;
    }

    /**
     * @param  Identity $productId 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('_productId', $productId, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getProductId()
    {
        return $this->_productId;
    }

    /**
     * @param  float $netPrice 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setNetPrice($netPrice)
    {
        return $this->setProperty('_netPrice', $netPrice, 'float');
    }
    
    /**
     * @return float 
     */
    public function getNetPrice()
    {
        return $this->_netPrice;
    }

    /**
     * @param  float $netPrice1 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setNetPrice1($netPrice1)
    {
        return $this->setProperty('_netPrice1', $netPrice1, 'float');
    }
    
    /**
     * @return float 
     */
    public function getNetPrice1()
    {
        return $this->_netPrice1;
    }

    /**
     * @param  float $netPrice2 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setNetPrice2($netPrice2)
    {
        return $this->setProperty('_netPrice2', $netPrice2, 'float');
    }
    
    /**
     * @return float 
     */
    public function getNetPrice2()
    {
        return $this->_netPrice2;
    }

    /**
     * @param  float $netPrice3 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setNetPrice3($netPrice3)
    {
        return $this->setProperty('_netPrice3', $netPrice3, 'float');
    }
    
    /**
     * @return float 
     */
    public function getNetPrice3()
    {
        return $this->_netPrice3;
    }

    /**
     * @param  float $netPrice4 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setNetPrice4($netPrice4)
    {
        return $this->setProperty('_netPrice4', $netPrice4, 'float');
    }
    
    /**
     * @return float 
     */
    public function getNetPrice4()
    {
        return $this->_netPrice4;
    }

    /**
     * @param  float $netPrice5 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setNetPrice5($netPrice5)
    {
        return $this->setProperty('_netPrice5', $netPrice5, 'float');
    }
    
    /**
     * @return float 
     */
    public function getNetPrice5()
    {
        return $this->_netPrice5;
    }
}


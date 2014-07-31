<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * .
 *
 * @access public
 * @package jtl\Connector\Model
 */
class ProductPriceOld extends DataModel
{
    /**
     * @type Identity 
     */
    protected $customerGroupId = null;

    /**
     * @type Identity 
     */
    protected $productId = null;

    /**
     * @type integer 
     */
    protected $connectorId = 0;

    /**
     * @type float|null 
     */
    protected $netPercent1 = 0.0;

    /**
     * @type float|null 
     */
    protected $netPercent2 = 0.0;

    /**
     * @type float|null 
     */
    protected $netPercent3 = 0.0;

    /**
     * @type float|null 
     */
    protected $netPercent4 = 0.0;

    /**
     * @type float|null 
     */
    protected $netPercent5 = 0.0;

    /**
     * @type float 
     */
    protected $netPrice = 0.0;

    /**
     * @type float 
     */
    protected $netPrice1 = 0.0;

    /**
     * @type float 
     */
    protected $netPrice2 = 0.0;

    /**
     * @type float 
     */
    protected $netPrice3 = 0.0;

    /**
     * @type float 
     */
    protected $netPrice4 = 0.0;

    /**
     * @type float 
     */
    protected $netPrice5 = 0.0;

    /**
     * @type float|null 
     */
    protected $percent = 0.0;

    /**
     * @type integer|null 
     */
    protected $quantity1 = 0;

    /**
     * @type integer|null 
     */
    protected $quantity2 = 0;

    /**
     * @type integer|null 
     */
    protected $quantity3 = 0;

    /**
     * @type integer|null 
     */
    protected $quantity4 = 0;

    /**
     * @type integer|null 
     */
    protected $quantity5 = 0;


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'customerGroupId',
        'productId',
    );

    /**
     * @param  integer $connectorId 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setConnectorId($connectorId)
    {
        return $this->setProperty('connectorId', $connectorId, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getConnectorId()
    {
        return $this->connectorId;
    }

    /**
     * @param  integer $quantity1 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setQuantity1($quantity1)
    {
        return $this->setProperty('quantity1', $quantity1, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getQuantity1()
    {
        return $this->quantity1;
    }

    /**
     * @param  integer $quantity2 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setQuantity2($quantity2)
    {
        return $this->setProperty('quantity2', $quantity2, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getQuantity2()
    {
        return $this->quantity2;
    }

    /**
     * @param  integer $quantity3 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setQuantity3($quantity3)
    {
        return $this->setProperty('quantity3', $quantity3, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getQuantity3()
    {
        return $this->quantity3;
    }

    /**
     * @param  integer $quantity4 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setQuantity4($quantity4)
    {
        return $this->setProperty('quantity4', $quantity4, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getQuantity4()
    {
        return $this->quantity4;
    }

    /**
     * @param  integer $quantity5 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setQuantity5($quantity5)
    {
        return $this->setProperty('quantity5', $quantity5, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getQuantity5()
    {
        return $this->quantity5;
    }

    /**
     * @param  float $percent 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setPercent($percent)
    {
        return $this->setProperty('percent', $percent, 'float');
    }
    
    /**
     * @return float 
     */
    public function getPercent()
    {
        return $this->percent;
    }

    /**
     * @param  float $netPercent1 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setNetPercent1($netPercent1)
    {
        return $this->setProperty('netPercent1', $netPercent1, 'float');
    }
    
    /**
     * @return float 
     */
    public function getNetPercent1()
    {
        return $this->netPercent1;
    }

    /**
     * @param  float $netPercent2 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setNetPercent2($netPercent2)
    {
        return $this->setProperty('netPercent2', $netPercent2, 'float');
    }
    
    /**
     * @return float 
     */
    public function getNetPercent2()
    {
        return $this->netPercent2;
    }

    /**
     * @param  float $netPercent3 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setNetPercent3($netPercent3)
    {
        return $this->setProperty('netPercent3', $netPercent3, 'float');
    }
    
    /**
     * @return float 
     */
    public function getNetPercent3()
    {
        return $this->netPercent3;
    }

    /**
     * @param  float $netPercent4 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setNetPercent4($netPercent4)
    {
        return $this->setProperty('netPercent4', $netPercent4, 'float');
    }
    
    /**
     * @return float 
     */
    public function getNetPercent4()
    {
        return $this->netPercent4;
    }

    /**
     * @param  float $netPercent5 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setNetPercent5($netPercent5)
    {
        return $this->setProperty('netPercent5', $netPercent5, 'float');
    }
    
    /**
     * @return float 
     */
    public function getNetPercent5()
    {
        return $this->netPercent5;
    }

    /**
     * @param  Identity $customerGroupId 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerGroupId(Identity $customerGroupId)
    {
        return $this->setProperty('customerGroupId', $customerGroupId, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getCustomerGroupId()
    {
        return $this->customerGroupId;
    }

    /**
     * @param  Identity $productId 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('productId', $productId, 'Identity');
    }
    
    /**
     * @return Identity 
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param  float $netPrice 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setNetPrice($netPrice)
    {
        return $this->setProperty('netPrice', $netPrice, 'float');
    }
    
    /**
     * @return float 
     */
    public function getNetPrice()
    {
        return $this->netPrice;
    }

    /**
     * @param  float $netPrice1 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setNetPrice1($netPrice1)
    {
        return $this->setProperty('netPrice1', $netPrice1, 'float');
    }
    
    /**
     * @return float 
     */
    public function getNetPrice1()
    {
        return $this->netPrice1;
    }

    /**
     * @param  float $netPrice2 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setNetPrice2($netPrice2)
    {
        return $this->setProperty('netPrice2', $netPrice2, 'float');
    }
    
    /**
     * @return float 
     */
    public function getNetPrice2()
    {
        return $this->netPrice2;
    }

    /**
     * @param  float $netPrice3 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setNetPrice3($netPrice3)
    {
        return $this->setProperty('netPrice3', $netPrice3, 'float');
    }
    
    /**
     * @return float 
     */
    public function getNetPrice3()
    {
        return $this->netPrice3;
    }

    /**
     * @param  float $netPrice4 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setNetPrice4($netPrice4)
    {
        return $this->setProperty('netPrice4', $netPrice4, 'float');
    }
    
    /**
     * @return float 
     */
    public function getNetPrice4()
    {
        return $this->netPrice4;
    }

    /**
     * @param  float $netPrice5 
     * @return \jtl\Connector\Model\ProductPriceOld
     * @throws InvalidArgumentException if the provided argument is not of type 'float'.
     */
    public function setNetPrice5($netPrice5)
    {
        return $this->setProperty('netPrice5', $netPrice5, 'float');
    }
    
    /**
     * @return float 
     */
    public function getNetPrice5()
    {
        return $this->netPrice5;
    }
}


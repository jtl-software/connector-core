<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Linker
 */
namespace jtl\Connector\Linker;

use \jtl\Connector\Mapper\IPrimaryKeyMapper;
use \jtl\Connector\Model\DataModel;
use \jtl\Connector\Exception\LinkerException;
use \jtl\Connector\Model\Identity;
use \jtl\Connector\Core\Logger\Logger;

/**
 * Identity Connector Linker
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.com>
 */
class IdentityLinker
{
    const CACHE_TYPE_HOST = 'h';
    const CACHE_TYPE_ENDPOINT = 'e';

    /**
     * Session Database Mapper
     *
     * @var \jtl\Connector\Core\Database\IDatabase
     */
    protected static $mapper;
    public static $useCache;
    protected static $cache = array();
    protected static $instance;

    protected static $types = array(
        'Category' => 0,
        'CategoryAttr' => 1,
        'CategoryAttrI18n' => 2,
        'CategoryCustomerGroup' => 3,
        'CategoryFunctionAttr' => 4,
        'CategoryI18n' => 5,
        'CategoryInvisibility' => 6,
        'Company' => 7,
        'ConfigGroup' => 8,
        'ConfigGroupI18n' => 9,
        'ConfigItem' => 10,
        'ConfigItemI18n' => 11,
        'ConfigItemPrice' => 12,
        'CrossSelling' => 13,
        'CrossSellingGroup' => 14,
        'Currency' => 15,
        'Customer' => 16,
        'CustomerAttr' => 17,
        'CustomerGroup' => 18,
        'CustomerGroupAttr' => 19,
        'CustomerGroupI18n' => 20,
        'CustomerOrder' => 21,
        'CustomerOrderAttr' => 22,
        'CustomerOrderBasket' => 23,
        'CustomerOrderBillingAddress' => 24,
        'CustomerOrderItem' => 25,
        'CustomerOrderItemVariation' => 26,
        'CustomerOrderPaymentInfo' => 27,
        'CustomerOrderShippingAddress' => 28,
        'DeliveryNote' => 29,
        'DeliveryNoteItem' => 30,
        'DeliveryStatus' => 31,
        'EmailTemplate' => 32,
        'EmailTemplateI18n' => 33,
        'FileDownload' => 34,
        'FileDownloadHistory' => 35,
        'FileDownloadI18n' => 36,
        'FileUpload' => 37,
        'GlobalData' => 38,
        'Image' => 39,
        'Language' => 40,
        'Manufacturer' => 41,
        'ManufacturerI18n' => 42,
        'MeasurementUnit' => 43,
        'MeasurementUnitI18n' => 44,
        'MediaFile' => 45,
        'MediaFileAttr' => 46,
        'MediaFileI18n' => 47,
        'PartsList' => 48,
        'PaymentMethod' => 49,
        'Product' => 50,
        'Product2Category' => 51,
        'ProductAttr' => 52,
        'ProductAttrI18n' => 53,
        'ProductConfigGroup' => 54,
        'ProductFileDownload' => 55,
        'ProductFunctionAttr' => 56,
        'ProductI18n' => 57,
        'ProductInvisibility' => 58,
        'ProductPrice' => 59,
        'ProductPriceItem' => 60,
        'ProductSpecialPrice' => 61,
        'ProductSpecific' => 62,
        'ProductType' => 63,
        'ProductVarCombination' => 64,
        'ProductVariation' => 65,
        'ProductVariationI18n' => 66,
        'ProductVariationInvisibility' => 67,
        'ProductVariationValue' => 68,
        'ProductVariationValueDependency' => 69,
        'ProductVariationValueExtraCharge' => 70,
        'ProductVariationValueI18n' => 71,
        'ProductVariationValueInvisibility' => 72,
        'ProductWarehouseInfo' => 73,
        'Shipment' => 74,
        'ShippingClass' => 75,
        'ProductSpecialPriceItem' => 76,
        'Specific' => 77,
        'SpecificI18n' => 78,
        'SpecificValue' => 79,
        'SpecificValueI18n' => 80,
        'Statistic' => 81,
        'TaxClass' => 82,
        'TaxRate' => 83,
        'TaxZone' => 84,
        'TaxZoneCountry' => 85,
        'Unit' => 86,
        'UnitI18n' => 87,
        'Warehouse' => 88,
        'WarehouseI18n' => 89
    );

    protected static $mappings = array(
        'Category' => array(
            'id' => 0,
            'parentCategoryId' => 0
        ),
        'CategoryI18n' => array(
            'categoryId' => 0
        ),
        'Specific' => array(
            'id' => 77
        ),
        'SpecificI18n' => array(
            'specificId' => 77
        ),
        'SpecificValue' => array(
            'id' => 79,
            'specificId' => 77
        ),
        'SpecificValueI18n' => array(
            'specificValueId' => 79
        ),
        'ProductPrice' => array(
            'id' => 59,
            'productId' => 50,
            'customerGroupId' => 18
        ),
        'ProductPriceItem' => array(
            'productPriceId' => 59
        ),
        'Manufacturer' => array(
            'id' => 41
        ),
        'ManufacturerI18n' => array(
            'manufacturerId' => 41
        ),
        'Customer' => array(
            'id' => 16,
            'customerGroupId' => 18
        ),
        'CustomerAttr' => array(
            'customerId' => 16,
            'id' => 17
        ),
        'CustomerOrder' => array(
            'id' => 21,
            'billingAddressId' => 24,
            'shippingAddressId' => 28,
            'customerId' => 16
        ),
        'CustomerOrderAttr' => array(
            'customerOrderId' => 21,
            'id' => 22
        ),
        'CustomerOrderBillingAddress' => array(
            'id' => 24,
            'customerId' => 16
        ),
        'CustomerOrderShippingAddress' => array(
            'id' => 28,
            'customerId' => 16
        ),
        'CustomerOrderPaymentInfo' => array(
            'customerOrderId' => 21,
            'id' => 27
        ),
        'Currency' => array(
            'id' => 15
        ),
        'Product' => array(
            'id' => 50,
            'masterProductId' => 50,
            'manufacturerId' => 41,
            'deliveryStatusId' => 31,
            'unitId' => 86,
            'shippingClassId' => 75,
            'partsListId' => 48,
            'productTypeId' => 63,
            'measurementUnitId' => 43
        ),
        'ProductSpecialPrice' => array(
            'productId' => 50,
            'id' => 61
        ),
        'ProductSpecific' => array(
            'productId' => 50,
            'id' => 62,
            'specificValueId' => 79
        ),
        'DeliveryNote' => array(
            'id' => 29,
            'customerOrderId' => 21
        ),
        'DeliveryNoteItem' => array(
            'deliveryNoteId' => 29,
            'id' => 30,
            'customerOrderItemId' => 25,
            'warehouseId' => 88
        ),
        'CategoryInvisibility' => array(
            'categoryId' => 0,
            'customerGroupId' => 18
        ),
        'CategoryCustomerGroup' => array(
            'categoryId' => 0,
            'customerGroupId' => 18
        ),
        'CategoryAttr' => array(
            'categoryId' => 0,
            'id' => 1
        ),
        'ProductFileDownload' => array(
            'productId' => 50,
            'fileDownloadId' => 34
        ),
        'Product2Category' => array(
            'productId' => 50,
            'id' => 51,
            'categoryId' => 0
        ),
        'MediaFile' => array(
            'id' => 45,
            'productId' => 50
        ),
        'MediaFileI18n' => array(
            'mediaFileId' => 45
        ),
        'Language' => array(
            'id' => 40
        ),
        'CustomerGroup' => array(
            'id' => 18
        ),
        'CustomerGroupAttr' => array(
            'customerGroupId' => 18,
            'id' => 19
        ),
        'CustomerGroupI18n' => array(
            'customerGroupId' => 18
        ),
        'ProductConfigGroup' => array(
            'productId' => 50,
            'id' => 54,
            'configGroupId' => 8
        ),
        'ProductInvisibility' => array(
            'productId' => 50,
            'customerGroupId' => 18
        ),
        'CrossSelling' => array(
            'productId' => 50,
            'id' => 13,
            'crossSellingProductId' => 50,
            'crossSellingGroupId' => 14
        ),
        'PartsList' => array(
            'productId' => 50,
            'id' => 48
        ),
        'MediaFileAttr' => array(
            'mediaFileId' => 45,
            'id' => 46
        ),
        'ProductVariation' => array(
            'productId' => 50,
            'id' => 65
        ),
        'ProductVariationI18n' => array(
            'productVariationId' => 65
        ),
        'ProductVariationInvisibility' => array(
            'productVariationId' => 65,
            'customerGroupId' => 18
        ),
        'ProductVariationValue' => array(
            'productVariationId' => 65,
            'id' => 68
        ),
        'ProductVariationValueDependency' => array(
            'productVariationValueId' => 68
        ),
        'ProductVariationValueExtraCharge' => array(
            'productVariationValueId' => 68,
            'customerGroupId' => 18
        ),
        'ProductVariationValueI18n' => array(
            'productVariationValueId' => 68
        ),
        'ProductVariationValueInvisibility' => array(
            'productVariationValueId' => 68,
            'customerGroupId' => 18
        ),
        'ProductSpecialPriceItem' => array(
            'productSpecialPriceId' => 61,
            'customerGroupId' => 18
        ),
        'CustomerOrderItem' => array(
            'id' => 25,
            'productId' => 50,
            'shippingClassId' => 75,
            'customerOrderId' => 21,
            'configItemId' => 10
        ),
        'CustomerOrderItemVariation' => array(
            'customerOrderItemId' => 25,
            'id' => 26,
            'productVariationId' => 65,
            'productVariationValueId' => 68
        ),
        'ConfigItem' => array(
            'id' => 10,
            'configGroupId' => 8,
            'productId' => 50
        ),
        'ConfigItemPrice' => array(
            'configItemId' => 10,
            'customerGroupId' => 18
        ),
        'ConfigItemI18n' => array(
            'configItemId' => 10
        ),
        'ConfigGroup' => array(
            'id' => 8
        ),
        'ConfigGroupI18n' => array(
            'configGroupId' => 8
        ),
        'FileDownload' => array(
            'id' => 34
        ),
        'FileDownloadI18n' => array(
            'fileDownloadId' => 34
        ),
        'ProductI18n' => array(
            'productId' => 50
        ),
        'Unit' => array(
            'id' => 86
        ),
        'UnitI18n' => array(
            'unitId' => 86
        ),
        'ProductFunctionAttr' => array(
            'id' => 56,
            'productId' => 50
        ),
        'Warehouse' => array(
            'id' => 88
        ),
        'TaxClass' => array(
            'id' => 82
        ),
        'FileUpload' => array(
            'id' => 37,
            'productId' => 50
        ),
        'ProductWarehouseInfo' => array(
            'productId' => 50,
            'warehouseId' => 88
        ),
        'WarehouseI18n' => array(
            'warehouseId' => 88
        ),
        'MeasurementUnit' => array(
            'id' => 43
        ),
        'MeasurementUnitI18n' => array(
            'measurementUnitId' => 43
        ),
        'TaxRate' => array(
            'id' => 83,
            'taxZoneId' => 84,
            'taxClassId' => 82
        ),
        'ProductType' => array(
            'id' => 63
        ),
        'FileDownloadHistory' => array(
            'id' => 35,
            'fileDownloadId' => 34,
            'customerId' => 16,
            'customerOrderId' => 21
        ),
        'Company' => array(
            'id' => 7
        ),
        'ProductVarCombination' => array(
            'productId' => 50,
            'productVariationId' => 65,
            'productVariationValueId' => 68
        ),
        'ProductAttr' => array(
            'id' => 52,
            'productId' => 50
        ),
        'PaymentMethod' => array(
            'id' => 49
        ),
        'TaxZone' => array(
            'id' => 84
        ),
        'CrossSellingGroup' => array(
            'id' => 14
        ),
        'TaxZoneCountry' => array(
            'id' => 85,
            'taxZoneId' => 84
        ),
        'Shipment' => array(
            'id' => 74,
            'deliveryNoteId' => 29
        ),
        'DeliveryStatus' => array(
            'id' => 31
        ),
        'EmailTemplate' => array(
            'id' => 32
        ),
        'Image' => array(
            'id' => 39,
            'foreignKey' => 39
        ),
        'EmailTemplateI18n' => array(
            'emailTemplateId' => 32
        ),
        'CategoryFunctionAttr' => array(
            'id' => 4,
            'categoryId' => 0
        ),
        'ProductAttrI18n' => array(
            'productAttrId' => 52
        ),
        'ShippingClass' => array(
            'id' => 75
        ),
        'CustomerOrderBasket' => array(
            'id' => 23,
            'customerId' => 16,
            'shippingAddressId' => 28,
            'customerOrderPaymentInfoId' => 27
        ),
        'CategoryAttrI18n' => array(
            'categoryAttrId' => 1
        )
    );

    /**
     * Singleton
     *
     * @param boolean $useCache
     * @return \jtl\Connector\Linker\IdentityLinker
     */
    public static function getInstance($useCache = true)
    {
        if (self::$instance === null) {
            self::$instance = new self($useCache);
        } else {
            self::$instance->useCache($useCache);
        }
        
        return self::$instance;
    }

    /**
     * Constructor
     *
     * @param boolean $useCache
     */
    protected function __construct($useCache = true)
    {
        self::$useCache = (bool)$useCache;
    }

    /**
     * Constructor
     *
     * @param boolean $useCache
     * @return \jtl\Connector\Linker\IdentityLinker
     */
    public function useCache($useCache)
    {
        self::$useCache = (bool)$useCache;
    }

    /**
     * Database setter
     *
     * @param \jtl\Connector\Mapper\IPrimaryKeyMapper $mapper
     */
    public function setPrimaryKeyMapper(IPrimaryKeyMapper $mapper)
    {
        self::$mapper = $mapper;
    }

    /**
     * Database setter
     *
     * @param \jtl\Connector\Model\DataModel $model
     * @param bool $isDeleted
     * @throws \jtl\Connector\Exception\LinkerException
     */
    public function linkModel(DataModel &$model, $isDeleted = false)
    {
        $reflect = new \ReflectionClass($model);

        foreach ($model->getModelType()->getProperties() as $propertyInfo) {
            $property = ucfirst($propertyInfo->getName());
            $setter = 'set' . $property;
            $getter = 'get' . $property;

            if ($propertyInfo->isNavigation()) {

                if (is_array($model->{$getter}())) {
                    foreach ($identity = $model->{$getter}() as &$entity) {
                        if ($entity instanceof DataModel) {
                            $this->linkModel($entity);
                        } else {
                            Logger::write(
                                sprintf('Property (%s) from model (%s) is not an instance of DataModel', $propertyInfo->getName(), $reflect->getShortName()), 
                                Logger::WARNING, 'linker'
                            );
                        }
                    }
                } else {
                    Logger::write(
                        sprintf('Property (%s) from model (%s) is not an array', $propertyInfo->getName(), $reflect->getShortName()), 
                        Logger::WARNING, 'linker'
                    );
                }
            } elseif ($propertyInfo->isIdentity()) {
                $identity = $model->{$getter}();

                if (!($identity instanceof Identity)) {
                    continue;
                }

                if (strlen($identity->getEndpoint()) > 0 && $identity->getHost() > 0) {
                    if ($isDeleted) {
                        $this->delete($identity->getEndpoint(), $identity->getHost(), $reflect->getShortName());
                    } elseif (!$this->exists(null, $identity->getHost(), $reflect->getShortName(), $property)) {
                        $this->save($identity->getEndpoint(), $identity->getHost(), $reflect->getShortName(), $property);
                    }

                    continue;
                } else {
                    if ($identity->getHost() > 0) {
                        if ($isDeleted) {
                            $this->delete(null, $identity->getHost(), $reflect->getShortName());
                        } elseif ($this->exists(null, $identity->getHost(), $reflect->getShortName(), $property)) {
                            $identity->setEndpoint($this->getEndpointId($identity->getHost(), $reflect->getShortName(), $property));

                            $model->{$setter}($identity);
                        }
                    } elseif (strlen($identity->getEndpoint()) > 0) {
                        if ($isDeleted) {
                            $this->delete($identity->getEndpoint(), null, $reflect->getShortName());
                        } elseif ($this->exists($identity->getEndpoint(), null, $reflect->getShortName(), $property)) {
                            $identity->setHost($this->getHostId($identity->getEndpoint(), $reflect->getShortName(), $property));

                            $model->{$setter}($identity);
                        }
                    }
                }
            }
        }
    }

    /**
     * Type id getter
     *
     * @param string $modelName
     * @param string $property
     * @throws \jtl\Connector\Exception\LinkerException
     * @return int
     */
    public function getType($modelName, $property = null)
    {
        $modelName = ucfirst($modelName);

        if ($property === null) {
            if (!isset(self::$types[$modelName])) {
                throw new LinkerException(sprintf('Type for model (%s) not found', $modelName));
            }

            return self::$types[$modelName];
        }

        $property = lcfirst($property);

        if (!isset(self::$mappings[$modelName])) {
            throw new LinkerException(sprintf('Type for model (%s) not found', $modelName));
        }

        if (!isset(self::$mappings[$modelName][$property])) {
            throw new LinkerException(sprintf('Type for model (%s) and property (%s) not found', $modelName, $property));
        }

        return self::$mappings[$modelName][$property];
    }

    /**
     * Model name getter
     *
     * @param int $type
     * @throws \jtl\Connector\Exception\LinkerException
     * @return string
     */
    public function getModelName($type)
    {
        $modelName = array_search($type, self::$types);
        if ($modelName === false) {
            throw new LinkerException(sprintf('Model for type (%s) not found', $type));
        }

        return $modelName;
    }

    /**
     * Checks if link exists
     *
     * @param string $endpointId
     * @param integer $hostId
     * @param string $modelName
     * @param string $property
     * @throws \jtl\Connector\Exception\LinkerException
     */
    public function exists($endpointId = null, $hostId = null, $modelName, $property)
    {
        if ($endpointId === null && $hostId === null) {
            throw new LinkerException('Both parameters (endpointId, hostId) can not be null');
        }

        $type = $this->getType($modelName, $property);

        $id = null;
        $cacheType = null;
        if ($endpointId !== null) {
            $id = $endpointId;
            $cacheType = self::CACHE_TYPE_ENDPOINT;
        } elseif ($hostId !== null) {
            $id = $hostId;
            $cacheType = self::CACHE_TYPE_HOST;
        }

        if ($this->checkCache($id, $type, $cacheType)) {
            return true;
        }

        if ($endpointId !== null) {
            $hostId = self::$mapper->getHostId($endpointId, $type);
        } elseif ($hostId !== null) {
            $endpointId = self::$mapper->getEndpointId($hostId, $type);
        }

        if ($endpointId !== null && $hostId !== null) {
            $this->saveCache($endpointId, $hostId, $type, $cacheType);

            return true;
        }

        return false;
    }

    /**
     * Save link to database
     *
     * @param string $endpointId
     * @param integer $hostId
     * @param string $modelName
     * @param string $property
     * @return boolean
     * @throws \jtl\Connector\Exception\LinkerException
     */
    public function save($endpointId, $hostId, $modelName, $property = null)
    {
        $type = $this->getType($modelName, $property);

        $result = self::$mapper->save($endpointId, $hostId, $type);
        if ($result) {
            $this->saveCache($endpointId, $hostId, $type, self::CACHE_TYPE_ENDPOINT);
            $this->saveCache($endpointId, $hostId, $type, self::CACHE_TYPE_HOST);

            return true;
        }

        return false;
    }

    /**
     * Delete link from database
     *
     * @param string $endpointId
     * @param integer $hostId
     * @param string $modelName
     * @return boolean
     */
    public function delete($endpointId = null, $hostId = null, $modelName)
    {
        $type = $this->getType($modelName);

        $result = self::$mapper->delete($endpointId, $hostId, $type);
        if ($result) {
            $this->deleteCache($endpointId, null, $type, self::CACHE_TYPE_ENDPOINT);
            $this->deleteCache(null, $hostId, $type, self::CACHE_TYPE_HOST);

            return true;
        }

        return false;
    }

    /**
     * Clears the entire link table
     *
     * @return boolean
     */
    public function clear()
    {
        return self::$mapper->clear();
    }

    /**
     * Endpoint ID getter
     *
     * @param integer $hostId
     * @param string $modelName
     * @param string $property
     */
    public function getEndpointId($hostId, $modelName, $property)
    {
        $type = $this->getType($modelName, $property);

        if (($endpointId = $this->loadCache($hostId, $type, self::CACHE_TYPE_HOST)) !== null) {
            return $endpointId;
        }

        $endpointId = self::$mapper->getEndpointId($hostId, $type);

        if ($endpointId !== null) {
            $this->saveCache($endpointId, $hostId, $type, self::CACHE_TYPE_HOST);

            return $endpointId;
        }

        return null;
    }

    /**
     * Host ID getter
     *
     * @param string $endpointId
     * @param string $modelName
     * @param string $property
     */
    public function getHostId($endpointId, $modelName, $property)
    {
        $type = $this->getType($modelName, $property);

        if (($hostId = $this->loadCache($endpointId, $type, self::CACHE_TYPE_ENDPOINT)) !== null) {
            return $hostId;
        }

        $hostId = self::$mapper->getHostId($endpointId, $type);

        if ($hostId !== null) {
            $this->saveCache($endpointId, $hostId, $type, self::CACHE_TYPE_ENDPOINT);

            return $hostId;
        }

        return null;
    }

    protected function checkCache($id, $type, $cacheType)
    {
        return (self::$useCache && isset(self::$cache[$this->buildKey($id, $type, $cacheType)]));
    }

    protected function loadCache($id, $type, $cacheType)
    {
        return $this->checkCache($id, $type, $cacheType) ? self::$cache[$this->buildKey($id, $type, $cacheType)] : null;
    }

    protected function saveCache($endpointId, $hostId, $type, $cacheType)
    {
        if (self::$useCache) {
            switch ($cacheType) {
                case self::CACHE_TYPE_ENDPOINT:
                    self::$cache[$this->buildKey($endpointId, $type, $cacheType)] = $hostId;
                    break;
                case self::CACHE_TYPE_ENDPOINT:
                    self::$cache[$this->buildKey($hostId, $type, $cacheType)] = $endpointId;
                    break;
            }
        }
    }

    protected function deleteCache($endpointId = null, $hostId = null, $type, $cacheType)
    {
        if (self::$useCache) {
            switch ($cacheType) {
                case self::CACHE_TYPE_ENDPOINT:
                    unset(self::$cache[$this->buildKey($endpointId, $type, $cacheType)]);
                    break;
                case self::CACHE_TYPE_ENDPOINT:
                    unset(self::$cache[$this->buildKey($hostId, $type, $cacheType)]);
                    break;
            }
        }
    }

    protected function buildKey($id, $type, $cacheType)
    {
        return sprintf('%s_%s_%s', $cacheType, $id, $type);
    }
}

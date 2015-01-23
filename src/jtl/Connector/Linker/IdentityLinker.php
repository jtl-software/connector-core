<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Linker
 */
namespace jtl\Connector\Linker;

use \jtl\Connector\Core\Database\IDatabase;
use \jtl\Connector\Model\DataModel;
use \jtl\Connector\Exception\LinkerException;

/**
 * Identity Connector Linker
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.com>
 */
class IdentityLinker
{
    /**
     * Session Database Mapper
     *
     * @var \jtl\Connector\Core\Database\IDatabase
     */
    protected static $db;
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
        'SpecialPrice' => 76,
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

    protected static $mappings = array();

    /**
     * Singleton
     *
     * @return \jtl\Connector\Linker\IdentityLinker
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        
        return self::$instance;
    }

    /**
     * Constructor
     *
     * @param \jtl\Connector\Core\Database\IDatabase $db
     * @param boolean $useCache
     */
    protected function __construct(IDatabase $db = null, $useCache = true)
    {
        self::$db = $db;
        self::$useCache = (bool)$useCache;

        self::$mappings = array(
            
        );
    }

    /**
     * Database setter
     *
     * @param \jtl\Connector\Core\Database\IDatabase $db
     */
    public function setDatabase(IDatabase $db)
    {
        self::$db = $db;
    }

    protected static function checkDatabase()
    {
        if (self::$db === null || !self::$db->isConnected()) {
            throw new \LinkerException('Database is not attached or not connected');
        }
    }

    /**
     * Database setter
     *
     * @param \jtl\Connector\Model\DataModel $model
     * @throws \jtl\Connector\Exception\LinkerException
     */
    public function linkModel(DataModel &$model)
    {
        self::checkDatabase();
        $reflect = new \ReflectionClass($model);

        foreach ($model->getModelType()->getProperties() as $propertyInfo) {
            if ($propertyInfo->isIdentity()) {
                $property = ucfirst($propertyInfo->getName());
                $setter = 'set' . $property;
                $getter = 'get' . $property;

                $identity = $model->{$getter}();

                if ($this->exists($identity->getHost(), $reflect->getShortName())) {
                    $identity->setEndpoint($this->getEndpointId($identity->getHost(), $reflect->getShortName()));

                    $model->{$setter}($identity);
                }
            }
        }
    }

    /**
     * Type id getter
     *
     * @param string $modelName
     * @throws \jtl\Connector\Exception\LinkerException
     */
    public function getType($modelName)
    {
        if (!isset(self::$types[$modelName])) {
            throw new \LinkerException(sprintf('Type for model (%s) not found', $modelName));
        }

        return self::$types[$modelName];
    }

    /**
     * Checks if link exists
     *
     * @param integer $host
     * @param string $modelName
     * @throws \jtl\Connector\Exception\LinkerException
     */
    public function exists($host, $modelName)
    {
        $type = $this->getType($modelName);

        if ($this->checkCache($host, $type)) {
            return true;
        }

        self::checkDatabase();
        $rows = self::$db->query("SELECT endpoint
                                    FROM link
                                    WHERE host = {$host}
                                        AND type = {$type}");

        if ($rows !== null && isset($rows[0])) {
            $this->saveCache($rows[0]['endpoint'], $host, $type);

            return true;
        }

        return false;
    }

    /**
     * Save link to database
     *
     * @param string $endpoint
     * @param integer $host
     * @param string $modelName
     * @throws \jtl\Connector\Exception\LinkerException
     */
    public function save($endpoint, $host, $modelName)
    {
        $type = $this->getType($modelName);

        $stmt = self::$db->prepare("INSERT INTO link (endpoint, host, type) VALUES(:endpoint, :host, :type)");
        $stmt->bindValue(":endpoint", $endpoint, SQLITE3_TEXT);
        $stmt->bindValue(":host", $host, SQLITE3_INTEGER);
        $stmt->bindValue(":type", $type, SQLITE3_INTEGER);
            
        $result = $stmt->execute();
        if ($result) {
            $this->saveCache($endpoint, $host, $type);

            return true;
        }

        return false;
    }

    /**
     * Save link to database
     *
     * @param integer $host
     * @param string $modelName
     */
    public function getEndpointId($host, $modelName)
    {
        $type = $this->getType($modelName);

        if (($endpointId = $this->loadCache($host, $type)) !== null) {
            return $endpointId;
        }

        self::checkDatabase();
        $rows = self::$db->query("SELECT endpoint
                                    FROM link
                                    WHERE host = {$host}
                                        AND type = {$type}");

        if ($rows !== null && isset($rows[0])) {
            $this->saveCache($rows[0]['endpoint'], $host, $type);

            return $rows[0]['endpoint'];
        }

        return null;
    }

    protected function checkCache($host, $type)
    {
        return (self::$useCache && isset(self::$cache[$this->buildKey($host, $type)]));
    }

    protected function loadCache($host, $type)
    {
        return $this->checkCache($host, $type) ? self::$cache[$this->buildKey($host, $type)] : null;
    }

    protected function saveCache($endpoint, $host, $type)
    {
        if (self::$useCache) {
            self::$cache[$this->buildKey($host, $type)] = $endpoint;
        }
    }

    protected function buildKey($host, $type)
    {
        return sprintf('%s_%s', $host, $type);
    }
}
<?php
/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use \jtl\Connector\Core\Model\Model;
use JMS\Serializer\Annotation as Serializer;

/**
 * Identity
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Internal
 * @Serializer\AccessType("public_method")
 */
class ConnectorIdentification extends Model
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("endpointVersion")
     * @Serializer\Accessor(getter="setEndpointVersion",setter="getEndpointVersion")
     */
    public $endpointVersion;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("platformName")
     * @Serializer\Accessor(getter="setPlatformName",setter="getPlatformName")
     */
    public $platformName;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("platformVersion")
     * @Serializer\Accessor(getter="setPlatformVersion",setter="getPlatformVersion")
     */
    public $platformVersion;

    /**
     * Gets the value of endpointVersion.
     *
     * @return string
     */
    public function getEndpointVersion()
    {
        return $this->endpointVersion;
    }

    /**
     * Sets the value of endpointVersion.
     *
     * @param string $endpointVersion the endpoint version
     *
     * @return self
     */
    public function setEndpointVersion($endpointVersion)
    {
        $this->endpointVersion = $endpointVersion;

        return $this;
    }

    /**
     * Gets the value of platformName.
     *
     * @return string
     */
    public function getPlatformName()
    {
        return $this->platformName;
    }

    /**
     * Sets the value of platformName.
     *
     * @param string $platformName the platform name
     *
     * @return self
     */
    public function setPlatformName($platformName)
    {
        $this->platformName = $platformName;

        return $this;
    }

    /**
     * Gets the value of platformVersion.
     *
     * @return string
     */
    public function getPlatformVersion()
    {
        return $this->platformVersion;
    }

    /**
     * Sets the value of platformVersion.
     *
     * @param string $platformVersion the platform version
     *
     * @return self
     */
    public function setPlatformVersion($platformVersion)
    {
        $this->platformVersion = $platformVersion;

        return $this;
    }
}

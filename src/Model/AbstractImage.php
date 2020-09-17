<?php
namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;
use Jtl\Connector\Core\Definition\Model;

/**
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 * @Serializer\Discriminator(
 *     field = "relationType",
 *     disabled = false,
 *     map = {
 *       "category": "Jtl\Connector\Core\Model\CategoryImage",
 *       "configGroup": "Jtl\Connector\Core\Model\ConfigGroupImage",
 *       "manufacturer": "Jtl\Connector\Core\Model\ManufacturerImage",
 *       "product": "Jtl\Connector\Core\Model\ProductImage",
 *       "productVariationValue": "Jtl\Connector\Core\Model\ProductVariationValueImage",
 *       "specific": "Jtl\Connector\Core\Model\SpecificImage",
 *       "specificValue": "Jtl\Connector\Core\Model\SpecificValueImage"
 *     }
 * )
 */
abstract class AbstractImage extends AbstractIdentity
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("filename")
     * @Serializer\Accessor(getter="getFilename",setter="setFilename")
     */
    protected $filename = '';

    /**
     * @var Identity
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("foreignKey")
     * @Serializer\Accessor(getter="getForeignKey",setter="setForeignKey")
     */
    protected $foreignKey = null;

    /**
     * @var ImageI18n[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ImageI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected $i18ns = [];

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("remoteUrl")
     * @Serializer\Accessor(getter="getRemoteUrl",setter="setRemoteUrl")
     */
    protected $remoteUrl = '';

    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("sort")
     * @Serializer\Accessor(getter="getSort",setter="setSort")
     */
    protected $sort = 0;

    /**
     * @var \ReflectionClass
     *
     * @Serializer\Exclude
     */
    protected $reflectionClass;

    /**
     * AbstractImage constructor.
     * @param string $endpoint
     * @param int $host
     */
    public function __construct(string $endpoint = '', int $host = 0)
    {
        parent::__construct($endpoint, $host);
        $this->foreignKey = new Identity();
    }

    /**
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * @param string $filename
     * @return AbstractImage
     */
    public function setFilename(string $filename): AbstractImage
    {
        $this->filename = $filename;
        return $this;
    }

    /**
     * @return Identity
     */
    public function getForeignKey(): Identity
    {
        return $this->foreignKey;
    }

    /**
     * @param Identity $foreignKey
     * @return AbstractImage
     */
    public function setForeignKey(Identity $foreignKey): AbstractImage
    {
        $this->foreignKey = $foreignKey;
        return $this;
    }

    /**
     * @param ImageI18n $i18n
     * @return $this
     */
    public function addI18n(ImageI18n $i18n): self
    {
        $this->i18ns[] = $i18n;

        return $this;
    }

    /**
     * @return $this
     */
    public function clearI18ns(): self
    {
        $this->i18ns = [];

        return $this;
    }

    /**
     * @return ImageI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }

    /**
     * @param ImageI18n ...$i18ns
     * @return $this
     */
    public function setI18ns(ImageI18n ...$i18ns): self
    {
        $this->i18ns = $i18ns;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return AbstractImage
     */
    public function setName(string $name): AbstractImage
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public function getRelationType(): string
    {
        if(is_null($this->reflectionClass)) {
            $this->reflectionClass = new \ReflectionClass($this);
        }

        $modelName = $this->reflectionClass->getShortName();
        $imagePos = strpos($modelName, 'Image');
        return Model::getRelationType(substr($modelName, 0, $imagePos));
    }

    /**
     * @return string
     */
    public function getRemoteUrl(): string
    {
        return $this->remoteUrl;
    }

    /**
     * @param string $remoteUrl
     * @return AbstractImage
     */
    public function setRemoteUrl(string $remoteUrl): AbstractImage
    {
        $this->remoteUrl = $remoteUrl;
        return $this;
    }

    /**
     * @return int
     */
    public function getSort(): int
    {
        return $this->sort;
    }

    /**
     * @param int $sort
     * @return AbstractImage
     */
    public function setSort(int $sort): AbstractImage
    {
        $this->sort = $sort;
        return $this;
    }
}

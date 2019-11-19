<?php
namespace Jtl\Connector\Core\Model;

use stdClass;

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
abstract class AbstractImage extends AbstractDataModel
{
    /**
     * @var Identity
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("foreignKey")
     * @Serializer\Accessor(getter="getForeignKey",setter="setForeignKey")
     */
    protected $foreignKey = null;

    /**
     * @var Identity
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("filename")
     * @Serializer\Accessor(getter="getFilename",setter="setFilename")
     */
    protected $filename = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("remoteUrl")
     * @Serializer\Accessor(getter="getRemoteUrl",setter="setRemoteUrl")
     */
    protected $remoteUrl = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';

    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("sort")
     * @Serializer\Accessor(getter="getSort",setter="setSort")
     */
    protected $sort = 0;

    /**
     * @var ImageI18n[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ImageI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected $i18ns = [];

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->foreignKey = new Identity();
        $this->id = new Identity();
    }

    public abstract function getRelationType(): string;

    /**
     * @param Identity $foreignKey
     * @return AbstractImage
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setForeignKey(Identity $foreignKey): AbstractImage
    {
        $this->foreignKey = $foreignKey;

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
     * @param Identity $id
     * @return AbstractImage
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id): AbstractImage
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Identity
     */
    public function getId(): Identity
    {
        return $this->id;
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
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename;
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
     * @return string
     */
    public function getRemoteUrl(): string
    {
        return $this->remoteUrl;
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
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param integer $sort
     * @return AbstractImage
     */
    public function setSort(int $sort): AbstractImage
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * @return integer
     */
    public function getSort(): int
    {
        return $this->sort;
    }

    /**
     * @param ImageI18n $i18n
     * @return AbstractImage
     */
    public function addI18n(ImageI18n $i18n): AbstractImage
    {
        $this->i18ns[] = $i18n;

        return $this;
    }

    /**
     * @param ImageI18n ...$i18ns
     * @return AbstractImage
     */
    public function setI18ns(ImageI18n ...$i18ns): AbstractImage
    {
        $this->i18ns = $i18ns;

        return $this;
    }

    /**
     * @return AbstractImageI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }

    /**
     * @return AbstractImage
     */
    public function clearI18ns(): AbstractImage
    {
        $this->i18ns = [];

        return $this;
    }

    /**
     * @param string[] $publics
     * @return stdClass
     */
    public function getPublic(array $publics = ['fields', 'isEncrypted', 'identities', 'modelType']): stdClass
    {
        $object = parent::getPublic($publics);
        $object->relationType = $this->getRelationType();
        return $object;
    }
}
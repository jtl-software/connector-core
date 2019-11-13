<?php
namespace Jtl\Connector\Core\Model;

/**
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
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
     * @Serializer\SerializedName("relationType")
     * @Serializer\AccessType("reflection")
     */
    protected $relationType = '';

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

        $this->relationType = $this->getRelationType();
    }

    public abstract function getRelationType(): string;

    /**
     * @param Identity $foreignKey
     * @return Image
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @return Image
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
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
     * @return Image
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
     * @return Image
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
     * @return Image
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
     * @return Image
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
     * @return Image
     */
    public function addI18n(ImageI18n $i18n): AbstractImage
    {
        $this->i18ns[] = $i18n;

        return $this;
    }

    /**
     * @param ImageI18n ...$i18ns
     * @return Image
     */
    public function setI18ns(ImageI18n ...$i18ns): AbstractImage
    {
        $this->i18ns = $i18ns;

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
     * @return Image
     */
    public function clearI18ns(): AbstractImage
    {
        $this->i18ns = [];

        return $this;
    }
}
<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Internal
 */

namespace Jtl\Connector\Core\Model;

use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;

/**
 * Identity
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Internal
 * @Serializer\AccessType("public_method")
 */
class Identity extends AbstractModel
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("endpoint")
     * @Serializer\Accessor(getter="getEndpoint",setter="setEndpoint")
     */
    protected $endpoint = '';
    
    /**
     * @var int
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("host")
     * @Serializer\Accessor(getter="getHost",setter="setHost")
     */
    protected $host = 0;
    
    /**
     * Constructor
     *
     * @param string $endpoint
     * @param int $host
     */
    public function __construct(string $endpoint = '', int $host = 0)
    {
        $this->endpoint = $endpoint;
        $this->host     = $host;
    }
    
    /**
     * Gets the value of endpoint.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }
    
    /**
     * Sets the value of endpoint.
     *
     * @param string $endpoint the endpoint
     * @return Identity
     */
    public function setEndpoint(string $endpoint): Identity
    {
        $this->endpoint = $endpoint;
        
        return $this;
    }
    
    /**
     * Gets the value of host.
     *
     * @return int
     */
    public function getHost(): int
    {
        return $this->host;
    }
    
    /**
     * Sets the value of host.
     *
     * @param int $host the host
     * @return Identity
     */
    public function setHost(int $host): Identity
    {
        $this->host = $host;
        
        return $this;
    }
    
    /**
     * Convert to Array
     *
     * @return array
     */
    public function toArray(): array
    {
        return [$this->endpoint, $this->host];
    }

    /**
     * Convert from Array
     *
     * @param array $data
     * @return Identity
     */
    public static function fromArray(array $data)
    {
        if (\count($data) !== 2 || !isset($data[0]) || !\is_string($data[0]) || !isset($data[1]) || !\is_int($data[1])) {
            throw new InvalidArgumentException('The argument is not valid. It must consist of exactly two fields. First field (0) must contain a string value and second field (1) must contain an integer value');
        }
        
        return new self($data[0], $data[1]);
    }
}

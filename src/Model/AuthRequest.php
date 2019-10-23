<?php
/**
 * @copyright JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * DataModel Class
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 * @Serializer\ExclusionPolicy("none");
 */
class AuthRequest extends Model
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("token")
     */
    protected $token = '';
    
    /**
     * Gets the value of token.
     *
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }
    
    /**
     * Sets the value of token.
     *
     * @param string $token the token
     * @return self
     */
    protected function setToken(string $token): AuthRequest
    {
        $this->token = $token;
        
        return $this;
    }
}


<?php

/**
 * @copyright 2010-2015 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * 
 * @Serializer\AccessType("public_method")
 */
class Identity extends DataModel
{

    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("endpointId")
     * @Serializer\Accessor(getter="getEndpointId",setter="setEndpointId")
     */
    protected $endpointId = '';


    /**
     * @var string 
     * @Serializer\Type("string")
     * @Serializer\SerializedName("hostId")
     * @Serializer\Accessor(getter="getHostId",setter="setHostId")
     */
    protected $hostId = '';



	public function __construct()
	{
	}
	
 
    /**
     * @param string $endpointId 
     * @return \jtl\Connector\Model\Identity
     */
    public function setEndpointId($endpointId)
    {
        return $this->setProperty('endpointId', $endpointId, 'string');
    }

    /**
     * @return string 
     */
    public function getEndpointId()
    {
        return $this->endpointId;
    }
	
 
    /**
     * @param string $hostId 
     * @return \jtl\Connector\Model\Identity
     */
    public function setHostId($hostId)
    {
        return $this->setProperty('hostId', $hostId, 'string');
    }

    /**
     * @return string 
     */
    public function getHostId()
    {
        return $this->hostId;
    }


}

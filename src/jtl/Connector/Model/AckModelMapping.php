
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
class AckModelMapping extends DataModel
{

    /**
     * @var jtl\Connector\Model\EntityType[] 
     * @Serializer\Type("array<jtl\Connector\Model\EntityType>")
     * @Serializer\SerializedName("identities")
     * @Serializer\AccessType("reflection")
     */
    protected $identities = array();



    /**
     * @param \jtl\Connector\Model\EntityType $identity
     * @return \jtl\Connector\Model\AckModelMapping
     */
    public function addIdentity(\jtl\Connector\Model\EntityType $identity)
    {
        $this->identities[] = $identity;
        return $this;
    }
    
    /**
     * @return jtl\Connector\Model\EntityType[]
     */
    public function getIdentities()
    {
        return $this->identities;
    }

    /**
     * @return \jtl\Connector\Model\AckModelMapping
     */
    public function clearIdentities()
    {
        $this->identities = array();
        return $this;
    }


}

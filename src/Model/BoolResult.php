<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package Jtl\Connector\Core\Model
 * @subpackage Ack
 */

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * BoolResult
 *
 * @access public
 * @package Jtl\Connector\Core\Model
 * @subpackage Internal
 * @Serializer\AccessType("public_method")
 */
class BoolResult extends DataModel
{
    /**
     * @var bool
     */
    protected $result = false;
    
    /**
     * @return bool
     */
    public function getResult(): bool
    {
        return $this->result;
    }
    
    /**
     * @param bool $result
     * @return BoolResult
     */
    public function setResult(bool $result): DataModel
    {
        $this->result = $result;
        
        return $this;
    }
}

<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package Jtl\Connector\Core\Type
 */

namespace Jtl\Connector\Core\Type;

use Jtl\Connector\Core\Type\PropertyInfo;

/**
 * @access public
 * @package Jtl\Connector\Core\Type
 */
class ConnectorIdentification extends AbstractDataType
{
    protected function loadProperties()
    {
        return [
            new PropertyInfo('endpointVersion', 'string', '', false, false, false),
            new PropertyInfo('platformName', 'string', '', false, false, false),
            new PropertyInfo('platformVersion', 'string', '', false, false, false),
            new PropertyInfo('protocolVersion', 'integer', '', false, false, false),
            new PropertyInfo('serverInfo', 'Jtl\Connector\Core\Model\CrossSellingItem', null, false, false, false),
        ];
    }

    public function isMain()
    {
        return false;
    }
}

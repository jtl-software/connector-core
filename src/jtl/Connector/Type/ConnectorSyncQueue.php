<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Type
 */

namespace jtl\Connector\Type;

use jtl\Connector\Type\PropertyInfo;

/**
 * @access public
 * @package jtl\Connector\Type
 */
class ConnectorSyncQueue extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'8D04BB52' => new PropertyInfo('action', '\jtl\Connector\Model\Byte[]', null, false, false, false),
			'569E932A' => new PropertyInfo('connectorId', 'integer', 0, false, false, false),
			'9AFD0062' => new PropertyInfo('key', 'integer', 0, false, false, false),
			'88DC6375' => new PropertyInfo('queueId', 'integer', 0, true, true, true),
			'D3E425E8' => new PropertyInfo('tryCount', 'integer', 0, false, false, false),
			'C15430A6' => new PropertyInfo('type', 'integer', 0, false, false, false),
        );
    }
}



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
class Product extends DataModel
{
    protected function loadProperties()
    {
        return array(
			new PropertyInfo('action', '\jtl\Connector\Model\Byte[]', null, false, false, false),
			new PropertyInfo('connectorId', 'integer', 0, false, false, false),
			new PropertyInfo('key', 'integer', 0, false, false, false),
			new PropertyInfo('queueId', 'integer', 0, true, false, false),
			new PropertyInfo('tryCount', 'integer', 0, false, false, false),
			new PropertyInfo('type', 'integer', 0, false, false, false),
        );
    }
}

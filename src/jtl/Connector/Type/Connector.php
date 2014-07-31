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
class Product extends DataType
{
    protected function loadProperties()
    {
        return array(
			new PropertyInfo('companyId', 'integer', 0, false, false, false),
			new PropertyInfo('currencies', '\jtl\Connector\Model\ConnectorCurrency', null, false, false, true),
			new PropertyInfo('customerGroups', '\jtl\Connector\Model\ConnectorCustomerGroup', null, false, false, true),
			new PropertyInfo('id', 'integer', 0, true, false, false),
			new PropertyInfo('isActive', 'boolean', false, false, false, false),
			new PropertyInfo('languages', '\jtl\Connector\Model\ConnectorLanguage', null, false, false, true),
			new PropertyInfo('links', '\jtl\Connector\Model\ConnectorLink', null, false, false, true),
			new PropertyInfo('logMessages', '\jtl\Connector\Model\ConnectorLog', null, false, false, true),
			new PropertyInfo('name', 'string', '', false, false, false),
			new PropertyInfo('syncQueues', '\jtl\Connector\Model\ConnectorSyncQueue', null, false, false, true),
			new PropertyInfo('token', 'string', '', false, false, false),
			new PropertyInfo('url', 'string', '', false, false, false),
        );
    }
}

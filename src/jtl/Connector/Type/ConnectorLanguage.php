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
			new PropertyInfo('connectorId', 'integer', 0, true, false, false),
			new PropertyInfo('isDefault', 'boolean', false, false, false, false),
			new PropertyInfo('languageId', 'integer', 0, true, false, false),
        );
    }
}

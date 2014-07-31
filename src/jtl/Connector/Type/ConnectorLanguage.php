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
class ConnectorLanguage extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'569E932A' => new PropertyInfo('connectorId', 'integer', 0, true, true, true),
			'B0DDC840' => new PropertyInfo('isDefault', 'boolean', false, false, false, false),
			'5FB1F040' => new PropertyInfo('languageId', 'integer', 0, true, true, true),
        );
    }
}



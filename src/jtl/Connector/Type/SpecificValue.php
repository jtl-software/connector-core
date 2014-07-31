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
			new PropertyInfo('id', '\jtl\Connector\Model\IdentityKeyPair', null, true, true, false),
			new PropertyInfo('specificId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('i18ns', '\jtl\Connector\Model\SpecificValueI18n', null, false, false, true),
			new PropertyInfo('sort', 'integer', 0, false, false, false),
        );
    }
}

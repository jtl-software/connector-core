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
class ProductVariationI18n extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'81B11883' => new PropertyInfo('productVariationId', '\jtl\Connector\Model\Identity', null, true, true, true),
			'3BDDE85B' => new PropertyInfo('localeName', 'string', '', true, true, true),
			'03BD1C7B' => new PropertyInfo('name', 'string', '', false, false, false),
        );
    }
}



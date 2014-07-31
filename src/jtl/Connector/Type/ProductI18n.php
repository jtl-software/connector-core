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
class ProductI18n extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'46FFEF34' => new PropertyInfo('productId', '\jtl\Connector\Model\Identity', null, true, true, true),
			'A8E50D9E' => new PropertyInfo('description', 'string', '', false, false, false),
			'3BDDE85B' => new PropertyInfo('localeName', 'string', '', true, true, true),
			'87461909' => new PropertyInfo('metaDescription', 'string', '', false, false, false),
			'0C348454' => new PropertyInfo('metaKeywords', 'string', '', false, false, false),
			'03BD1C7B' => new PropertyInfo('name', 'string', '', false, false, false),
			'80EE9B58' => new PropertyInfo('shortDescription', 'string', '', false, false, false),
			'5E6DD4B4' => new PropertyInfo('titleTag', 'string', '', false, false, false),
			'CF8EFB36' => new PropertyInfo('urlPath', 'string', '', false, false, false),
        );
    }
}



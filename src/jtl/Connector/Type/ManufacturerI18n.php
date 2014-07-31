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
class ManufacturerI18n extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'56841AD1' => new PropertyInfo('manufacturerId', '\jtl\Connector\Model\Identity', null, true, true, true),
			'A8E50D9E' => new PropertyInfo('description', 'string', '', false, false, false),
			'3BDDE85B' => new PropertyInfo('localeName', 'string', '', true, true, true),
			'87461909' => new PropertyInfo('metaDescription', 'string', '', false, false, false),
			'0C348454' => new PropertyInfo('metaKeywords', 'string', '', false, false, false),
			'82BA2D35' => new PropertyInfo('metaTitle', 'string', '', false, false, false),
        );
    }
}



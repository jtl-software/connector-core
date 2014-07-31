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
class Language extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'CDE6B7C7' => new PropertyInfo('id', '\jtl\Connector\Model\Identity', null, true, true, true),
			'B0DDC840' => new PropertyInfo('isDefault', 'boolean', false, false, false, false),
			'3BDDE85B' => new PropertyInfo('localeName', 'string', '', false, false, false),
			'1FBA393A' => new PropertyInfo('nameEnglish', 'string', '', false, false, false),
			'D40B1FBE' => new PropertyInfo('nameGerman', 'string', '', false, false, false),
        );
    }
}



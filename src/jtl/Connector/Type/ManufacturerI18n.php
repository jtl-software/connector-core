<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Type;

use \jtl\Connector\Type\PropertyInfo;

/**
 * @access public
 * @package jtl\Connector\Type
 */
class ManufacturerI18n extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('manufacturerId', 'Identity', null, True, false, false),
            new PropertyInfo('description', 'string', null, False, false, false),
            new PropertyInfo('localeName', 'string', null, True, false, false),
            new PropertyInfo('metaDescription', 'string', null, False, false, false),
            new PropertyInfo('metaKeywords', 'string', null, False, false, false),
            new PropertyInfo('titleTag', 'string', null, False, false, false),
        );
    }
}

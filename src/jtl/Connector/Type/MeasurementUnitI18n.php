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
class MeasurementUnitI18n extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('measurementUnitId', 'Identity', null, True, false, false),
            new PropertyInfo('localeName', 'string', null, True, false, false),
            new PropertyInfo('name', 'string', null, False, false, false),
        );
    }
}

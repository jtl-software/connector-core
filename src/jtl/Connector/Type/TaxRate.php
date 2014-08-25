<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Type
 */

namespace jtl\Connector\Type;

use \jtl\Connector\Type\PropertyInfo;

/**
 * @access public
 * @package jtl\Connector\Type
 */
class TaxRate extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('id', 'int', null, true, true, false),
            new PropertyInfo('priority', 'int', null, false, false, false),
            new PropertyInfo('rate', 'double', null, false, false, false),
            new PropertyInfo('taxClassId', 'int', null, false, true, false),
            new PropertyInfo('taxZoneId', 'int', null, false, true, false),
        );
    }
}

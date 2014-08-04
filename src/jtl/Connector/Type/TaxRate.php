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
class TaxRate extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('id', 'Identity', null, True, false, false),
            new PropertyInfo('taxClassId', 'Identity', null, False, false, false),
            new PropertyInfo('taxZoneId', 'Identity', null, False, false, false),
            new PropertyInfo('priority', 'int', null, False, false, false),
            new PropertyInfo('rate', 'double', null, False, false, false),
        );
    }
}

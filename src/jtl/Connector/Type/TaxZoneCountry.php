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
class TaxZoneCountry extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('id', 'Identity', null, False, false, false),
            new PropertyInfo('taxZoneId', 'Identity', null, True, false, false),
            new PropertyInfo('countryIso', 'string', null, False, false, false),
        );
    }
}

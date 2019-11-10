<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package Jtl\Connector\Core\Type
 */

namespace Jtl\Connector\Core\Type;

use Jtl\Connector\Core\Type\PropertyInfo;

/**
 * @access public
 * @package Jtl\Connector\Core\Type
 */
class TaxZone extends AbstractDataType
{
    protected function loadProperties()
    {
        return [
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('name', 'string', '', false, false, false),
            new PropertyInfo('countries', 'Jtl\Connector\Core\Model\TaxZoneCountry', null, false, false, true),
        ];
    }

    public function isMain()
    {
        return false;
    }
}

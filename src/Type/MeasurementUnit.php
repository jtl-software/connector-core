<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package Jtl\Connector\Core\Type
 */

namespace Jtl\Connector\Core\Type;

use \Jtl\Connector\Core\Type\PropertyInfo;

/**
 * @access public
 * @package Jtl\Connector\Core\Type
 */
class MeasurementUnit extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('code', 'string', '', false, false, false),
            new PropertyInfo('displayCode', 'string', '', false, false, false),
            new PropertyInfo('i18ns', 'Jtl\Connector\Core\Model\MeasurementUnitI18n', null, false, false, true),
        );
    }

    public function isMain()
    {
        return false;
    }
}

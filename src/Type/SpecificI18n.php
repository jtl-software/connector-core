<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package Jtl\Connector\Core\Type
 */

namespace Jtl\Connector\Core\Type;

/**
 * @access public
 * @package Jtl\Connector\Core\Type
 */
class SpecificI18n extends DataType
{
    protected function loadProperties()
    {
        return [
            new PropertyInfo('name', 'string', '', false, false, false),
            new PropertyInfo('languageISO', 'string', '', false, false, false)
        ];
    }

    public function isMain()
    {
        return false;
    }
}
